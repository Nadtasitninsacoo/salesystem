@extends('navbar.navbar')

@section('title')

@section('content')
    <div class="container d-flex justify-content-center vh-100">
        <div class="col-md-6">
            <h2 class="text-center text-center py-4">แก้ไขหมวดหมู่สินค้า</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="my-3">
                <form action="{{ route('update_category', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- ใช้ PUT method สำหรับการอัปเดต -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category"
                            value="{{ $category->name }}">
                    </div>
                    <button type="submit" class="btn btn-warning">บันทึกการเปลี่ยนแปลง</button>
                    <a href="{{ route('category') }}" class="btn btn-dark bttn-sm">กลับ</a>
                </form>
            </div>
        </div>
    </div>
@endsection
