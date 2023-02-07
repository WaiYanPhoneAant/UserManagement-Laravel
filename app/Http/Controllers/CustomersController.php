<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function customerList()
    {
        # code...
        $customers=customers::paginate('4');
        return view('App.customers.customersList',compact('customers'));
    }

}
