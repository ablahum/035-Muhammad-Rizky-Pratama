<?php

namespace App\Http\Controllers;
use App\Models\Room;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index(Request $request) {
        $category = Room::find(1)->category;
        
        return $category;
        // return view('dashboard', [
        //     "title" => "Dashboard",
        //     "rooms" => Room::all(),
        // ]);
    }
}
