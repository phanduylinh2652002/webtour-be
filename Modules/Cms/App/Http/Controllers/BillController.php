<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;

class BillController extends Controller
{
    //
    public function index(){
        $bill = Bill::
        with('order')->leftjoin('customers', 'customers.id', 'bills.customer_id')
        ->select(
            'bills.id',
            'customers.name',
            'bills.date',
            'bills.total'
        )->get();
        return view('Cms::admin.bill.index', compact('bill'));
    }
    public function detail($id){
        $bills = Bill::findOrFail($id);
        $billDetails = BillDetail::leftjoin('customers', 'customers.id', 'bill_detail.customer_id')
        ->leftJoin('tours', 'tours.id', 'bill_detail.tour_id')
        ->where('bill_detail.bill_id', $id)
        ->select(
            'tours.name',
            'tours.image',
            'customers.name',
            'customers.phone',
            'customers.email',
            'bill_detail.quantity_OldPerson',
            'bill_detail.quantity_YoungPerson',
            'bill_detail.quantity_Children',
            'bill_detail.quantity_Infant',
            'bill_detail.note',
            )->firstOrFail();
        return view('Cms::admin.bill.detail', compact('bills', 'billDetails'));
    }
}
