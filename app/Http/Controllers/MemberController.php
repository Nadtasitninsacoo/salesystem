<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function member()
    {
        $members = Member::all();
        return view('members.member', compact('members'));
    }
    public function index()
    {
        $user = Auth::user();
        return view('navbar.navbar', compact(['user' => $user]));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'profile_picture' => 'nullable|image|mimes:png,jpeg,jpg,gif,svg|max:2048',
            'phone_number' => 'required|string|max:15',
        ]);
        if ($request->hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->profile_picture = $profile_picture;
        $member->phone_number = $request->phone_number;
        $member->role = 'admin';  // กำหนดเป็น admin
        $member->save();

        return redirect()->route('member')->with('success', 'ผู้ใช้ถูกเพิ่มสำเร็จ');
    }
    public function member_create()
    {
        return view('members.create_member');
    }
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit_member', compact('member'));
    }
    public function update(Request $request, $id)
    {
        // ค้นหาผู้ใช้งานที่ต้องการอัปเดต
        $member = Member::findOrFail($id);

        // Validate ข้อมูลที่ได้รับจากฟอร์ม
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id, // ให้ข้ามการตรวจสอบอีเมลสำหรับผู้ใช้งานที่มี ID เดียวกัน
            'profile_picture' => 'nullable|image|mimes:png,jpeg,jpg,gif,svg|max:2048',
            'phone_number' => 'required|string|max:15',
        ]);

        // ถ้ามีการอัปโหลดรูปโปรไฟล์ใหม่
        if ($request->hasFile('profile_picture')) {
            // ลบรูปเก่า (ถ้ามี)
            if ($member->profile_picture) {
                unlink(storage_path('app/public/' . $member->profile_picture));
            }

            // อัปโหลดรูปใหม่
            $profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
            $member->profile_picture = $profile_picture;
        }

        // อัปเดตข้อมูลผู้ใช้งาน
        $member->name = $request->name;
        $member->email = $request->email;

        // ถ้าผู้ใช้กรอกรหัสผ่านใหม่
        if ($request->filled('password')) {
            $member->password = Hash::make($request->password);
        }

        $member->phone_number = $request->phone_number;

        // บันทึกการอัปเดต
        $member->save();

        // คืนค่าผลลัพธ์ (redirect ไปยังหน้าอื่น หรือแจ้งเตือน)
        return redirect()->route('member')->with('success', 'ข้อมูลผู้ใช้งานได้รับการอัปเดตสำเร็จ');
    }
    public function destroy($id){
        $member = Member::findOrFail($id);
        
        // ลบรูปภาพจาก storage ถ้ามี
        if($member->profile_picture){
            Storage::disk('public')->delete('profile_pictures/' . $member->profile_picture);
        }
    
        // ลบข้อมูลผู้ใช้
        $member->delete();
    
        return redirect()->route('member')->with('success','ผู้ใช้ถูกลบเรียบร้อยแล้ว');
    }    
}
