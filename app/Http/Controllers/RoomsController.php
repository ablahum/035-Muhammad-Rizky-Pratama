<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Category;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
            
        return view('rooms.rooms', [
            'title' => 'All Rooms',
            'name' => session()->get('user.name'),
            'data' => $rooms,
            'route_name' => 'rooms'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        
        return view('rooms.create', [
            'title' => 'New Room',
            'name' => session()->get('user.name'),
            'data' => $category,
            'route_name' => 'rooms'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['number'] = (int) $request['number'];
        $request['category_id'] = (int) $request['category_id'];
        $request['price'] = (int) $request['price'];
                
        $room_data = $request->validate([
            'number' => 'required|integer|min:1',
            'category_id' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|string'
        ]);

        // return $room_data;
        
        Room::create($room_data);

        return redirect('/rooms')->with('success_message', 'Create room successful.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);
        $categories = Category::all();

        return view('rooms.edit', [
            'title' => 'Edit Room',
            'name' => session()->get('user.name'),
            'room' => $room,
            'categories' => $categories,
            'route_name' => 'rooms'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request['number'] = (int) $request['number'];
        $request['category_id'] = (int) $request['category_id'];
        $request['price'] = (int) $request['price'];
        
        $data = $request->validate([
            'number' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|string',
            'category_id' => 'required|integer',
        ]);

        Room::find($id)->update($data);
        
        return redirect('/rooms')->with('success_message', 'Edit room successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::destroy($id);

        return redirect('/rooms')->with('success_message', 'Delete room successful.');
    }
}
