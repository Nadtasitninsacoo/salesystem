@extends('navbar.navbar')

@section('title')

@section('content')
    <div class="container justify-content-center d-flex vh-100 py-4">
        <div class="col-md-7">
            <h2 class="text-center">แก้ไขผู้ใช้งาน</h2>
            <form action="{{ route('update_member', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="name" value="{{ $member->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $member->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="profile_picture" class="form-label">รูปภาพโปรไฟล์</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $member->phone_number }}">
                </div>
                <button type="submit" class="btn btn-warning btn-sm">บันทึกการเปลี่ยนแปลง</button>
                <a href="{{ route('member') }}" class="btn btn-dark btn-sm">กลับ</a>
            </form>
        </div>
    </div>
@endsection
