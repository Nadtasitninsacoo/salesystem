<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;

    // ตั้งชื่อตารางให้ถูกต้อง
    protected $table = 'orders';  // แก้ไขจาก 'reports' เป็น 'orders'

    // กำหนดฟิลด์ที่สามารถกรอกข้อมูลได้
    protected $fillable = ['total_price', 'created_at', 'updated_at'];  // เปลี่ยนฟิลด์ให้ตรงกับตาราง orders
}