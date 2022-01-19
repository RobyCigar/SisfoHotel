<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\RoomRequest;
use Illuminate\Pagination\Paginator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        if ($request->has('search')) {
            $query = $request->search;
            $rooms = Room::query()
                ->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->paginate(5);
        } else {
            $rooms = Room::paginate(5);
        }

        return view('room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        try {
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName, 's3');
            }
            Room::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'capacity' => $request->capacity,
                'total_room' => $request->total_room,
                'available_room' => $request->available_room,
                'image' => $imageName ?? null,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route('room.index')->with('success', 'Room created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index')->with('success', 'Room deleted successfully');
    }
}
