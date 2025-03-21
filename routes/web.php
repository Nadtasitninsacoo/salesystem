<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/',[ProductController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //จัดการ Products
    Route::get('/product',[ProductController::class,'product'])->name('product'); //ไปหน้า สินค้าทั้งหมด
    Route::get('/product/create',[ProductController::class,'create'])->name('add_product'); //ไปหน้า เพิ่มสินค้า
    Route::post('/product.store',[ProductController::class,'store'])->name('product.store'); //เพิ่มสินค้า ไป Controller
    Route::get('/category',[ProductController::class,'category'])->name('category'); //ไปหน้า หมวดหมู่สินค้า
    Route::get('/category/category',[ProductController::class,'add_category'])->name('add_category'); //ไปหน้า เพิ่มหมวดหมู่
    Route::post('/category',[ProductController::class,'create_category'])->name('create_category'); //เพิ่มหมวดหมู่ ไป Controller
    Route::get('/category/{id}/edit', [ProductController::class, 'edit'])->name('edit_category'); //ไปหน้า แก้ไขหมวดหมู่สินค้า
    Route::put('/category/update/{id}', [ProductController::class, 'update'])->name('update_category'); //อัปเดตหมวดหมู่สินค้า
    Route::delete('/destroy_category/{id}', [ProductController::class, 'destroy_category'])->name('destroy_category');//ลบหมวดหมู่
    Route::get('/edit/{id}/product',[ProductController::class,'edit_product'])->name('edit_product'); //ไปหน้า แก้ไขข้อมูลสินค้า
    Route::put('/product/{id}', [ProductController::class, 'update_product'])->name('update_product'); //อัปเดตข้อมูลสินค้า
    Route::delete('/destroy/{id}',[ProductController::class,'destroy_product'])->name('destroy_product'); //ลบข้อมูลสินค้า
    //Customer
    Route::get('/customer',[CustomerController::class,'customer'])->name('customer'); //ไปหน้า ข้อมูลลูกค้า
    Route::get('/edit/{id}',[CustomerController::class,'edit'])->name('edit_customer'); //ไปหน้า แก้ไขข้อมูลลูกค้า

    //ยอดขาย รายวัน รายเดือน รายปี
    Route::get('/reports',[OrdersController::class,'reports'])->name('reports'); //ไปหน้า ยอดขาย
    Route::get('/oorder_index', [OrdersController::class, 'index'])->name('orders.index'); //ไปหน้า จัดการสินค้า
    Route::put('/update/{id}',[CustomerController::class,'update'])->name('update_customer'); //อัปเดตข้อมูลลูกค้า
    Route::get('/edit/{id}',[OrdersController::class,'edit_order'])->name('edit_order'); //ไปหน้า แก้ไข Oder ลูกค้า
    Route::put('/update',[OrdersController::class,'update'])->name('update_order');

    //จัดการ Member
    Route::get('/member',[MemberController::class,'member'])->name('member'); //ไปหน้า แสดงชื่อผู้ใช้
    Route::post('/member_store',[MemberController::class,'store'])->name('member_store');  //เพิ่มผุ้ใช้ไป Controller
    Route::get('/member.create',[MemberController::class,'member_create'])->name('member.create');  //ไปหน้า เพิ่มผู้ใช้
    Route::get('/edit/{id}',[MemberController::class,'edit'])->name('edit_member'); //ไปหน้า แก้ไขข้อมูลผู้ใช้งาน
    Route::post('update/{id}/member',[MemberController::class,'update'])->name('update_member'); //ฮัปเดตข้อมูลผู้ใช้
    Route::delete('destroy/{id}', [MemberController::class, 'destroy'])->name('destroy'); //ลบข้อมูลผู้ใช้

    //Login
    Route::post('/login', [LoginController::class, 'login'])->name('login'); //สำหรับ Login

    //Frontend
    Route::get('/index',[HomeController::class,'index'])->name('index');


//});
require __DIR__.'/auth.php';