<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startTime = microtime(true); // start timer
        // $quotes = Quote::all(); // run query
        $quotes = Cache::remember('allQuotes', 3600, function() {
            return Quote::all();
        });
        $totalTime = microtime(true) - $startTime; // end timer


        return response()->json([
            'totalTime' => $totalTime,
            'quotes' => $quotes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $startTime = microtime(true); // start timer
        $quote=new Quote();
        $quote->fill($request->all());
        $result=$quote->save();
        $totalTime = microtime(true) - $startTime; // end timer
        return response()->json([
            'totalTime' => $totalTime,
            'quotes' => $result
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotes $quotes)
    {
        //
    }
}
