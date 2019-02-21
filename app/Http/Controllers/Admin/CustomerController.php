<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.customer.index',
            [
                'customers' => Customer::all()
            ]);
    }

    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customer');
    }
}
