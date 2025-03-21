@extends('navbar.navbar')

@section('title')

@section('content')
<div class="container py-4">
    <div class="col-md-8">
        <h2 class="text-center">แก้ไขออเดอร์ลูกค้า</h2>
        <div class="md-4">
            <form action="{{ route('update_order', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
            
                <div class="mb-3">
                    <label for="product_name" class="form-label">ชื่อสินค้า</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $order->product_name }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="quantity" class="form-label">จำนวน</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $order->quantity }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="price" class="form-label">ราคา</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $order->price }}" required>
                </div>
            
                <button type="submit" class="btn btn-primary">อัปเดตคำสั่งซื้อ</button>
            </form>
            
        </div>
    </div>
</div>
@endsection