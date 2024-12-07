<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Product;
use App\Models\Training;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Competition;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function courses()
    {
        $courses = Course::all();
        return view('shop.courses', compact('courses'));
    }

    public function products()
    {
        $products = Product::all();
        return view('shop.products', compact('products'));
    }

    public function trainings()
    {
        $trainings = Training::all();
        return view('shop.trainings', compact('trainings'));
    }

    public function bookings()
    {
        $bookings = Booking::all();
        return view('shop.bookings', compact('bookings'));
    }

    public function orders()
    {
        $orders = Order::all();
        return view('shop.orders', compact('orders'));
    }

    public function competitions()
    {
        $competitions = Competition::all();
        return view('shop.competitions', compact('competitions'));
    }
}