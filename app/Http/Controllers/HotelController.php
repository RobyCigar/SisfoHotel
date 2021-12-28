<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Pagination\Paginator;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $customers = Customer::paginate(5);

        return view('hotel.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $hotel = new Customer;
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->save();

        return redirect()->route('hotel.index')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $hotel)
    {
        return view('hotel.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $hotel)
    {
        return view('hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $hotel)
    {
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->save();

        return redirect()->route('hotel.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $hotel)
    {
        $hotel->delete();

        return redirect()->route('hotel.index')->with('success', 'Customer deleted successfully');
    }
}
