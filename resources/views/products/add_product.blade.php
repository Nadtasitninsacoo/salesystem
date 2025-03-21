@extends('navbar.navbar')

@section('title')

@section('content')

    <div class="container d-flex justify-content-center vh-100">
        <div class="col-md-6">
            <h2 class="text-center text-center py-4">เพิ่มข้อมูลสินค้า</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="my-3">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    {{-- เลือกหมวดหมู่ --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label">หมวดหมู่สินค้า</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">-- เลือกหมวดหมู่ --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">เพิ่มข้อมูลสินค้า</button>
                    <a href="{{ route('product') }}" class="btn btn-dark btn-sm">กลับ</a>
                </form>
            </div>
        </div>
    </div>
@endsection
