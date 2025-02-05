<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Devices;
use App\Models\Controls;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Foods::limit(10)->orderBy('updated_at')->get();
        $schedules = Controls::where('category', 'schedule')->orderBy('updated_at')->with('devices')->get();
        $devices = Devices::limit(10)->orderBy('updated_at')->with(['controls', 'food'])->get();
         return view('pages.monitoring', ['foods' => $foods, 'schedules' => $schedules, 'devices' => $devices]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Foods $foods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foods $foods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foods $foods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foods $foods)
    {
        //
    }
}
