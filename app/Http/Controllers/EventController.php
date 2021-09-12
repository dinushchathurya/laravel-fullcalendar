<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {   
        if($request->ajax()) {
       
            $data = Event::whereDate('start', '>=', $request->start)
                    ->whereDate('end',   '<=', $request->end)
                    ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }
        
        return view('welcome');
    }
}
