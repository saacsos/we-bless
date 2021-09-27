<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::get();
        return $apartments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Apartment
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'num_floor' => ['required', 'integer', 'min:1'],
            'num_room' => ['required', 'integer', 'min:1']
        ], [
            'name.required' => 'ต้องการชื่อของอพาร์ตเมนต์'
        ]);

        $apartment = new Apartment();
        $apartment->name = $request->input('name');
        $apartment->num_floor = $request->input('num_floor');
        $apartment->num_room = $request->input('num_room');
        $apartment->user_id = $request->input('user_id');
        $apartment->save();
        return $apartment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return Apartment
     */
    public function show(Apartment $apartment)
    {
        return $apartment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return Apartment
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'name' => ['required'],
            'num_floor' => ['required', 'integer', 'min:1'],
            'num_room' => ['required', 'integer', 'min:1']
        ], [
            'name.required' => 'ต้องการชื่อของอพาร์ตเมนต์'
        ]);
        $apartment->name = $request->input('name');
        $apartment->num_floor = $request->input('num_floor');
        $apartment->num_room = $request->input('num_room');
        $apartment->user_id = $request->input('user_id');
        $apartment->save();
        return $apartment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return response()->json(['success' => true, 'message' => 'Apartment has been deleted']);
    }
}
