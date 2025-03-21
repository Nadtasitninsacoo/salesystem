@extends('navbar.navbar')

@section('title')

@section('content')
    <div class="container justify-content-center d-flex vh-100 py-4">
        <div class="col-md-7">
            <h2 class="text-center">เพิ่มผู้ใช้งาน</h2>
            <form action="{{ route('member_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="text" class="form-control" type="email" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" type="password" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="profile_picture" class="form-label">รูปภาพโปรไฟล์</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">เพิ่มผู้ใช้งาน</button>
                <a href="{{ route('member') }}" class="btn btn-dark btn-sm">กลับ</a>
            </form>
        </div>
    </div>
@endsection
