@extends('navbar.navbar')

@section('title')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">รายการออเดอร์</h2>
    <!-- ฟอร์มค้นหาและกรอง -->
    <div class="d-flex justify-content-between align-items-center mb-3 w-75 mx-auto">
        <form method="GET" action="{{ route('orders.index') }}" class="d-flex gap-2">
            <input type="date" name="date" class="form-control" placeholder="เลือกวันที่" value="{{ request('date') }}">
            <input type="text" name="customer" class="form-control" placeholder="ชื่อลูกค้า" value="{{ request('customer') }}">
            <select name="status" class="form-control">
                <option value="">สถานะทั้งหมด</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>รอดำเนินการ</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>เสร็จสมบูรณ์</option>
            </select>
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </form>
    </div>

    <!-- ตารางข้อมูล -->
    <table class="table table-bordered w-75 mx-auto">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>ลูกค้า</th>
                <th>ยอดรวม</th>
                <th>สถานะ</th>
                <th>วันที่สร้าง</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ number_format($order->total_price, 2) }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'warning' }}">
                            {{ $order->status == 'completed' ? 'เสร็จสมบูรณ์' : 'รอดำเนินการ' }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการลบออเดอร์นี้หรือไม่?')">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection