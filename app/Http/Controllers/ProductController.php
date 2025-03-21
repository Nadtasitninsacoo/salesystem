<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function product()
    {
        $products = Product::all();
        return view('products.product', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.add_product', compact('categories'));
    }
    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลจากฟอร์ม
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'nullable|exists:categories,id',  // ใช้ category_id ที่เชื่อมโยงกับ categories table
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // สร้างสินค้ารายใหม่
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category = $request->category;  // บันทึก category_id แทน category

        // ถ้ามีการอัปโหลดรูปภาพ
        if ($request->hasFile('image')) {
            // อัปโหลดรูปภาพใหม่
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // บันทึกข้อมูลสินค้า
        $product->save();

        return redirect()->route('product')->with('success', 'เพิ่มข้อมูลสินค้าสำเร็จ');
    }

    public function add_category()
    {
        $category = Category::all();
        return view('products.add_category', compact('category'));
    }
    public function category()
    {
        $category = Category::all();
        return view('products.category', compact('category'));
    }
    public function destroy_category($id)
    {
        // ค้นหาหมวดหมู่ตาม ID และลบมัน
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('category')->with('success', 'ลบหมวดหมู่สินค้าสำเร็จ!');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);  // ดึงข้อมูลจากฐานข้อมูล
        return view('products.edit_category', compact('category'));
    }
    public function create_category(Request $request)
    {
        // Validation
        $request->validate([
            'category' => 'required|string|max:255', // ตรวจสอบข้อมูลหมวดหมู่
        ]);

        // สร้างหมวดหมู่ใหม่และบันทึกลงฐานข้อมูล
        $category = new Category();
        $category->name = $request->category; // รับค่าหมวดหมู่จากฟอร์ม
        $category->save(); // บันทึกลงฐานข้อมูล

        // รีไดเรกต์ไปที่หน้าหมวดหมู่พร้อมกับข้อความสำเร็จ
        return redirect()->route('category')->with('success', 'หมวดหมู่สินค้าถูกเพิ่มเรียบร้อยแล้ว');
    }
    public function update(Request $request, $id)
    {
        // ตรวจสอบให้แน่ใจว่าใช้ method ที่เหมาะสม
        $category = Category::findOrFail($id);
        $category->name = $request->category;
        $category->save();

        return redirect()->route('category')->with('success', 'Category updated successfully');
    }
    public function edit_product($id)
    {
        // ค้นหาสินค้าจาก ID
        $product = Product::findOrFail($id);

        // ค้นหาหมวดหมู่ทั้งหมด
        $categories = Category::all();

        // ส่งข้อมูลไปยังหน้าแก้ไข
        return view('products.edit_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id)
    {
        // ตรวจสอบข้อมูลจากฟอร์ม
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id', // ตรวจสอบว่าหมวดหมู่มีอยู่จริง
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // ค้นหาสินค้า
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;  // เปลี่ยนเป็น category_id แทน category
    
        // ถ้ามีการอัปโหลดรูปภาพ
        if ($request->hasFile('image')) {
            // ลบรูปภาพเดิมถ้ามี
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }
    
            // อัปโหลดรูปภาพใหม่
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
    
        // บันทึกข้อมูลสินค้า
        $product->save();
    
        return redirect()->route('product')->with('success', 'แก้ไขข้อมูลสินค้าเรียบร้อยแล้ว');
    }    

    public function destroy_product($id)
    {
        $product = Product::findOrFail($id);

        // ลบรูปภาพจาก storage ถ้ามี
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        // ลบสินค้า
        $product->delete();

        return redirect()->route('product')->with('success', 'ลบสินค้าสำเร็จ');
    }
}
