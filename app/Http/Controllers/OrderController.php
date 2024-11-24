<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($id)
{
    // Temukan pesanan berdasarkan ID
    $order = Order::findOrFail($id);

    // Ambil item pesanan terkait
    $orderItems = $order->orderItems;

    // Tampilkan tampilan dengan data pesanan
    return view('orders.show', compact('order', 'orderItems'));
}
    public function index()
    {
        $orders = Order::with('orderItems.menu')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'menu_items' => 'required|array',
    ]);

    // Hitung total harga
    $totalPrice = 0;
    foreach ($request->menu_items as $item) {
        $menu = Menu::find($item['id']);
        $totalPrice += $menu->price * $item['quantity'];
    }

    // Buat pesanan
    $order = Order::create([
        'customer_name' => $request->customer_name,
        'total_price' => $totalPrice, // Simpan total harga
        'order_date' => now(), // Simpan tanggal pesanan
    ]);

    // Simpan item pesanan
    foreach ($request->menu_items as $item) {
        $menu = Menu::find($item['id']);
        $order->orderItems()->create([
            'menu_id' => $menu->id,
            'quantity' => $item['quantity'],
            'price' => $menu->price,
            'subtotal' => $menu->price * $item['quantity'], // Hitung subtotal
        ]);
    }

    return redirect()->route('orders.index')->with('success', 'Order created successfully.');
}

public function update(Request $request, Order $order)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'menu_items' => 'required|array',
    ]);

    // Hitung total harga
    $totalPrice = 0;
    foreach ($request->menu_items as $item) {
        $menu = Menu::find($item['id']);
        $totalPrice += $menu->price * $item['quantity'];
    }

    // Update pesanan
    $order->update([
        'customer_name' => $request->customer_name,
        'total_price' => $totalPrice, // Simpan total harga
        'order_date' => now(), // Simpan tanggal pemesanan
    ]);

    // Hapus item pesanan lama dan simpan yang baru
    $order->orderItems()->delete(); // Hapus semua item pesanan lama

    // Simpan item pesanan baru
    foreach ($request->menu_items as $item) {
        $menu = Menu::find($item['id']);
        $order->orderItems()->create([
            'menu_id' => $menu->id,
            'quantity' => $item['quantity'],
            'price' => $menu->price,
            'subtotal' => $menu->price * $item['quantity'], // Hitung subtotal
        ]);
    }

    return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
}
public function destroy(Order $order)
{
    // Hapus item pesanan terkait
    $order->orderItems()->delete();

    // Hapus pesanan
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
}
}
