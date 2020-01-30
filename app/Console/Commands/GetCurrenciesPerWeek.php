<?php

namespace App\Console\Commands;

use App\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GetCurrenciesPerWeek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import currencies per week from The National Bank of the Republic of Belarus';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(isset(Currency::where('Date', Carbon::today())->get()[0])){
            $this->info('You have already uploaded currencies today! Try tomorrow!');
            return;
        }
        for ($i = 0, $today = Carbon::today(); $i < 7; $i++) {
            $day = $today->format('Y/m/d');
            $currenciesPerDay = json_decode(file_get_contents("http://www.nbrb.by/api/exrates/rates?ondate={$day}&periodicity=0"));
            foreach ($currenciesPerDay as $currency) {
                Currency::create([
                    'Cur_ID' => $currency->Cur_ID,
                    'Date' => $currency->Date,
                    'Cur_Abbreviation' => $currency->Cur_Abbreviation,
                    'Cur_Scale' => $currency->Cur_Scale,
                    'Cur_Name' => $currency->Cur_Name,
                    'Cur_OfficialRate' => $currency->Cur_OfficialRate,
                ]);
            }
            $today = $today->subDay();
        }
        $this->info('All is ok! Now the currencies are uploaded to your database!');
    }
}
