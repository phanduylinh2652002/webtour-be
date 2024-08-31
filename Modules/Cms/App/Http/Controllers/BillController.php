<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
class BillController extends Controller
{
    //
    public function index(){
        $bill = Bill::leftjoin('customers', 'customers.customer_id', 'bill.customer_id')
        ->select(
            'bill.bill_id',
            'customers.customer_name',
            'bill.bill_date',
            'bill.bill_total'
        )->get();
        return view('admin.bill.index', compact('bill'));
    }
    public function detail($id){
        $bills = Bill::findOrFail($id);
        $billDetails = BillDetail::leftjoin('customers', 'customers.customer_id', 'bill_detail.customer_id')
        ->leftJoin('tours', 'tours.tour_id', 'bill_detail.tour_id')
        ->where('bill_detail.bill_id', $id)
        ->select(
            'tours.tour_name',
            'tours.tour_image',
            'customers.customer_name',
            'customers.customer_phone',
            'customers.customer_email',
            'bill_detail.quantity_OldPerson',
            'bill_detail.quantity_YoungPerson',
            'bill_detail.quantity_Children',
            'bill_detail.quantity_Infant',
            'bill_detail.note'
            )->firstOrFail();
        return view('admin.bill.detail', compact('bills', 'billDetails'));
    }
}
