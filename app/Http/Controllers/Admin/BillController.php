<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillModel;

class BillController extends Controller
{
    //
    public function bill(request $request){
        $tab = $request->input('tab', '1'); // Get the current tab, default to '1'
        $bills = BillModel::where('status', 1)->paginate(5);
        $bill_received = BillModel::where('status', 2)->paginate(5);
        $bill_deliver = BillModel::where('status', 3)->paginate(5);
        $close = BillModel::where('status', 4)->paginate(5);
    return view('admin.bill.bill', [
        'bills' => $bills,
        'bill_received'=>$bill_received,
        'bill_deliver'=>$bill_deliver,
        'close'=>$close,
        'currentTab' => $tab,
    ]);
}
    //duyệt
    public function approve($id)
        {
            $bill = BillModel::find($id);
            if ($bill) {
                $bill->status += 1;
                $bill->save();
                return redirect()->back()->with('success', 'Đơn hàng đã được duyệt!');
            }

            return redirect()->back()->with('error', 'Đơn hàng không tìm thấy!');
        }
        //hủy đơn
    public function cancel($id)
        {
            $bill = BillModel::find($id);
        
            if ($bill) {
                $bill->status = 4;
                $bill->save();
                
                return redirect()->back()->with('status', 'Đơn hàng đã được huỷ!');
            }
        
            return redirect()->back()->with('error', 'Đơn hàng không tìm thấy!');
        }
        //xoá đơn
        public function destroy($id)
        {
            $bill = BillModel::find($id);

            if ($bill) {
                $bill->delete();
                return redirect()->back()->with('status', 'Đơn hàng đã được xoá!');
            }

            return redirect()->back()->with('error', 'Đơn hàng không tìm thấy!');
        }
}
