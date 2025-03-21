@extends('navbar.navbar')

@section('title')

@section('content')
    <div class="container py-4">
        <h2 class="text-center">ข้อมูลลูกค้า</h2>
        <table class="table table-bordered my-3">
            <thead class="text-center">
                <tr>
                    <th>ชื่อ</th>
                    <th>อีเมล</th>
                    <th>เบอร์โทร</th>
                    <th>ที่อยู่การจัดส่ง</th>
                    <th>วันที่สมัคร</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('edit_customer', $customer->id) }}"
                                class="btn btn-warning btn-sm">แก้ไขข้อมูลลูกค้า</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
