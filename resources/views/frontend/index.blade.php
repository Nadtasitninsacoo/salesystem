@extends('navbar.navbar_frontend')

@section('title')

@section('content')

<!-- 🔎 Search Bar -->
<div class="container mx-auto mt-6 py-6 pt-20">
    <div class="flex justify-center">
        <input type="text" id="searchInput" class="w-1/2 p-3 border rounded-lg" placeholder="ค้นหาสินค้า...">
        <button class="ml-2 bg-600 text-white px-5 py-3 rounded-lg" style="background-color:#29b6f6;">ค้นหา</button>
    </div>
    <a href="#" class="btn btn-sm" style="background-color:#ffee58;">เริ่มช็อปปิ้ง</a>
</div>

<!-- 🎡 Infinite Scrolling Product Slider -->
<div class="mt-8 overflow-hidden">
    <div class="whitespace-nowrap flex space-x-6 animate-scroll">
        @foreach($products as $product)
            <div class="w-60 flex-shrink-0">
                <img src="{{ asset('storage/' . $product->image) }}" class="rounded-lg shadow-md">
                <p class="text-center mt-2 font-semibold">{{ $product->name }}</p>
            </div>
        @endforeach
    </div>
</div>

<!-- 🆕 สินค้าที่เพิ่มล่าสุด -->
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">🆕 สินค้าใหม่</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white p-4 shadow-md rounded-lg">
                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-40 object-cover rounded-md">
                <h3 class="mt-2 font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600">{{ $product->price }} บาท</p>
                <button class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg w-full" style="background-color:#03a9f4;">ดูรายละเอียด</button>
            </div>
        @endforeach
    </div>
</div>

<!-- 🎥 Animation -->
<style>
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-100%); }
}
.animate-scroll {
    display: flex;
    animation: scroll 10s linear infinite;
}
</style>

@endsection