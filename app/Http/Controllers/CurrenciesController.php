<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CurrenciesController extends Controller
{
    public function index(Request $request)
    {
        $currencies = Currency::where('Date', '>', Carbon::now()->subDays(7))
            ->get();


        return view('currencies',['currencies' => $currencies]);
    }

    public function export()
    {
        return Currency::all();
    }
}
