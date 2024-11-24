<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $orders = Order::all();

        return view('dashboard.index', compact('menus', 'categories', 'orders'));
    }
}
