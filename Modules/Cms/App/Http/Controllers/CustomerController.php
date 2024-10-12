<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function index(){
        $customer = Customer::all();
        return view('Cms::admin.customer.index', compact('customer'));
    }
    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
