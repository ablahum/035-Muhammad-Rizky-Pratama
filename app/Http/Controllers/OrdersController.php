<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Room;
use App\Models\Guest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $orders = Order::all();
        
        return view('orders.orders', [
            'title' => 'All Orders',
            'name' => session()->get('user.name'),
            'orders' => $orders,
            'route_name' => 'orders'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        
        return view('orders.create', [
            'title' => 'New Order',
            'name' => session()->get('user.name'),
            'rooms' => $rooms,
            'route_name' => 'orders'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['room_id'] = (int) $request['room_id'];
        $request['total_price'] = (int) $request['total_price'];
        
        $guest_data = $request->validate([
            'name' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $order_data = $request->validate([
            'room_id' => 'required|integer',
            'start_date' => 'required|string|date_format:Y-m-d',
            'end_date' => 'required|string|date_format:Y-m-d|after_or_equal:start_date',
            'total_price' => 'required|integer'
        ]);

        $guest = Guest::create($guest_data);
        $order_data['guest_id'] = $guest->id;
        Order::create($order_data);

        return redirect('/orders')->with('success_message', 'Create order successful.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rooms = Room::all();
        $order = Order::find($id);

        return view('orders.edit', [
            'title' => 'Edit Order',
            'name' => session()->get('user.name'),
            'rooms' => $rooms,
            'order' => $order,
            'guest_name' => $order->guest->name,
            'route_name' => 'orders'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request['room_id'] = (int) $request['room_id'];
        $request['total_price'] = (int) $request['total_price'];
        
        $guest_data = $request->validate([
            'name' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $order_data = $request->validate([
            'room_id' => 'required|integer',
            'start_date' => 'required|string|date_format:Y-m-d',
            'end_date' => 'required|string|date_format:Y-m-d|after_or_equal:start_date',
            'total_price' => 'required|integer'
        ]);

        $order = Order::find($id);
        $guest = Guest::find($order->guest_id);
    
        $guest->update($guest_data);
        $order->update($order_data);
        
        return redirect('/orders')->with('success_message', 'Edit order successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $guest = Guest::find($order->guest_id);

        if ($guest) $guest->delete();

        $order->delete();

        return redirect('/orders')->with('success_message', 'Delete order successful.');
    }
}
