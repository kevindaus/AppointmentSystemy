<?php

namespace App\Http\Controllers;

use App\CreditApplication;
use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSales = Sale::orderBy("id","DESC")->get();

        return view('sales.index')->with(compact('allSales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $sale->total_amount = 'P ' . number_format($sale->total_amount, 2);
        $sale->tax = 'P ' . number_format($sale->tax, 2);
        $sale->tax_rate = number_format($sale->tax_rate, 2);
        $salesInfo = $sale->toArray();
        unset($salesInfo['id']);
        unset($salesInfo['credit_application']);
        unset($salesInfo['credit_application']);
        unset($salesInfo['credit_application']);
        return view('sales.show')->with(compact('salesInfo','sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
