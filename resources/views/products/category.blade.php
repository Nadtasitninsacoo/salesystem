@extends('navbar.navbar')

@section('title')

@section('content')
    <div class="container d-flex justify-content-center vh-100">
       <div class="col-md-6">
        <h2 class="text-center py-4">รายการหมวดหมู่สินค้า</h2>
        <div class="mb-4">
            <a href="{{ route('add_category') }}" class="btn btn-primary btn-sm">เพิ่มหมวดหมู่สินค้า</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped text-center">
            <thead class="text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">หมวดหมู่</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <!-- คุณสามารถเพิ่มปุ่มสำหรับการแก้ไขหรือการลบหมวดหมู่ได้ -->
                            <a href="{{route('edit_category',$item->id)}}" class="btn btn-warning btn-sm">แก้ไข</a>
                        </td>
                            <td>
                                <form action="{{ route('destroy_category', $item->id) }}" method="POST"
                                    onsubmit="return confirm('คุณต้องการลบข้อมูล {{ $item->name }} หรือไม่?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                                </form>
                            </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </div>
    </div>
@endsection
