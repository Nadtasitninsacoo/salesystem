@extends('navbar.navbar')

@section('title', 'แก้ไขข้อมูลลูกค้า')

@section('content')
<div class="container py-4">
    <h2 class="text-center">แก้ไขข้อมูลลูกค้า</h2>

    <form action="{{ route('update_customer', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">ชื่อ</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">อีเมล</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">เบอร์โทร</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $customer->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">ที่อยู่การจัดส่ง</label>
            <textarea name="address" id="address" class="form-control" required>{{ $customer->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning btn-sm">บันทึกการเปลี่ยนแปลง</button>
    </form>
</div>
@endsection