<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class CurrenciesController extends Controller
{
    public function index(Request $request)
    {
        $result='';
        if ($request['date'] && $request['currency']) {
            $cacheKeyResults = $request['date'] . $request['currency'];
            $requestDate=$request['date'];
            $requestCurrency=$request['currency'];
            $result = Cache::remember($cacheKeyResults,86400,function () use ($requestDate,$requestCurrency){
                return Currency::where('Date', $requestDate)
                    ->where('Cur_ID', $requestCurrency)
                    ->get();
            });
            }
        $day=Carbon::today();
        $cacheKey=$day->format('Y-m-d');
        $currencies=Cache::remember($cacheKey,86400,function () use ($day) {
                return Currency::where('Date', $day)
                    ->get();
            });
        return view('currencies', ['currencies' => $currencies, 'day' => $day, 'result' => $result, 'request' => $request]);
         }


    public function export()
    {
        $day=Carbon::today();
        $cacheKey=$day->format('Y-m-d');
        return Cache::remember($cacheKey,86400,function () use ($day) {
            return Currency::where('Date', '>', $day->subDays(7))
                ->get();
        });
    }
}
