<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Room;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::get();
        return view('apartments.index', [
            'apartments' => $apartments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $apartment = new Apartment();
        $apartment->name = $request->input('name');
        $apartment->num_floor = $request->input('num_floor');
        $apartment->num_room = $request->input('num_room');
        $apartment->save();
        return redirect()->route('apartments.index');
    }

    /**
     * Show form to create room for this apartment
     *
     * @param $apartment_id
     */
    public function createRoom($apartment_id)
    {
        $apartment = Apartment::findOrFail($apartment_id);
        return view('apartments.create-room', [
            'apartment' => $apartment,
            'room_types' => Room::$room_types
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('apartments.show', [
            'apartment' => $apartment
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('apartments.edit', [
            'apartment' => $apartment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->name = $request->input('name');
        $apartment->num_floor = $request->input('num_floor');
        $apartment->num_room = $request->input('num_room');
        $apartment->save();
        return redirect()->route('apartments.show', ['apartment' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $apartment = Apartment::findOrFail($id);
        if ($apartment->name === $request->input('name')) {
            $apartment->delete();
            return redirect()->route('apartments.index');
        }
        return redirect()->back();

    }
}
