@extends('navbar.navbar')

@section('title')

@section('content')

    <div class="container d-flex justify-content-center vh-100">
        <div class="col-md-9">
            <h2 class="text-center py-4">รายการข้อมูลสินค้า</h2>
            <div class="container mt-4">
                <div class="mb-4">
                    <a href="{{ route('add_product') }}" class="btn btn-primary btn-sm">เพิ่มข้อมูลสินค้า</a>
                </div>
                <table class="table table-bordered border-secondary py-3 text-center text-secondary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">No products available</td>
                            </tr>
                        @else
                            @foreach ($products as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ optional($item->category)->name ?? 'ไม่มีหมวดหมู่' }}</td>
                                    <td>{{ Str::limit($item->description, 20) }}</td>
                                    <td><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                            width="100"></td>
                                    <td><a href="{{ route('edit_product', $item->id) }}"
                                            class="btn btn-warning btn-sm">แก้ไข</a></td>
                                    <td>
                                        <form action="{{ route('destroy', $item->id) }}" method="POST" 
                                            onsubmit="return confirm('คุณต้องการลบข้อมูล {{ $item->name }} หรือไม่?');">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                                      </form>                                      
                                    </td>
                                </tr>
                            @endforeach

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
