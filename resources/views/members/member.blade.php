@extends('navbar.navbar')

@section('title')

@section('content')
    <div class="container d-flex justify-content-center vh-100 py-4">
       <div class="col-md-8">
        <h2 class="text-center">รายชื่อผู้ใช้งาน</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('member.create') }}" class="btn btn-primary btn-sm mb-3">เพิ่มผู้ใช้ใหม่</a>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อ</th>
                    <th>อีเมล</th>
                    <th>เบอร์โทร</th>
                    <th>รูปโปรไฟล์</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone_number }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $member->profile_picture) }}" alt="Profile"
                                class="w-10 h-10 rounded-full">
                        </td>
                        <td>
                            <a href="{{route('edit_member',$member->id)}}" class="btn btn-warning btn-sm">แก้ไข</a>                                                                     
                        </td>
                        <td>
                            <form action="{{ route('destroy', $member->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                            </form>   
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </div>
    </div>
@endsection
