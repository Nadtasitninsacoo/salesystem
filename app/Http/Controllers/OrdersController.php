<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders; // ใช้ Model Order

class OrdersController extends Controller
{
    public function reports(Request $request)
    {
        // รับตัวกรองจาก request (เช่น วันที่)
        $filter = $request->input('filter'); 
    
        // ถ้ามีตัวกรอง ค้นหาข้อมูลตามตัวกรอง
        $reports = Orders::selectRaw('DATE(created_at) as date, SUM(total_price) as total_sales')
                        ->when($filter, function ($query, $filter) {
                            // ตัวอย่างกรองข้อมูลตามวันที่
                            return $query->whereDate('created_at', '>=', $filter);
                        })
                        ->groupBy('date')
                        ->orderBy('date', 'desc')
                        ->get();
    
        // ส่งข้อมูลไปที่ view พร้อมตัวแปร filter
        return view('reports.sale', compact('reports', 'filter'));
    }
    public function index()
    {
        $orders = Orders::all();
        return view('orders.order', compact('orders'));
    }
    public function edit_order($id) {
        $order = Orders::findOrFail($id);  // ดึงข้อมูลคำสั่งซื้อเพียงรายการเดียว
        return view('orders.edit_order', compact('order'));  // ส่งตัวแปร $order ไปยัง View
    }     
    public function update_order(Request $request, $id)
    {
        // ค้นหาคำสั่งซื้อจากฐานข้อมูล
        $order = Orders::findOrFail($id);
    
        // อัปเดตคำสั่งซื้อด้วยข้อมูลจากฟอร์ม
        $order->product_name = $request->input('product_name');
        $order->quantity = $request->input('quantity');
        $order->price = $request->input('price');
    
        // บันทึกการเปลี่ยนแปลง
        $order->save();
    
        // ส่งข้อความสำเร็จไปยัง View หรือกลับไปที่หน้ารายการคำสั่งซื้อ
        return redirect()->route('orders.index')->with('success', 'อัปเดตคำสั่งซื้อสำเร็จ');
    }
}