<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Pest\ArchPresets\Custom;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index(){
        return inertia::render('index',[
            'customers' => Customer::all()->map(function($customer){
                return [
                    'id' => $customer->id,
                    'name' => $customer->name,
                ];
            })
        ]);
    }
    public function create(){
        return inertia::render('create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers|max:14|min:10',
        ]);

        Customer::create($validated);
        return Redirect::route('customers.index')->with('message', 'Customer created successfully');
    }


    public function show(Customer $customer){
        return Inertia::render('show',[
            'customer' => $customer
        ]);
        
    }

    public function edit(Customer $customer){
        return Inertia::render('edit',[
            'customer' => $customer
        ]);
    }

    public function update(Request $request, Customer $customer){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:14|min:10',
        ]);

        $customer->update($validated);
        return Redirect::route('customers.index')->with('message', 'Customer updated successfully');
    }

    public function destroy(Customer $customer){
        //$customer = Customer::findorFail($id);
        $customer->delete();
        return Redirect::route('customers.index')->with('message', 'Customer deleted successfully');
    }
}
