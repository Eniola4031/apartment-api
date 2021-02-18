<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::with('user:id,fullname')
        ->withCount('reviews')
        ->latest()
        ->paginate(20);
    return response()->json(['apartments' => $apartments]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $apartment = new Apartment;
        $apartment->name = $request->name;
        $apartment->description = $request->description;
        $apartment->price = $request->price;

        auth()->user()->products()->save($product);
        return response()->json(['message' => 'House purchase Added', 'apartment' => $apartment]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */

    public function show(Apartment $apartment)
    {
        $apartment->load(['reviews' => function ($query) {
            $query->latest();
        }, 'user']);
        return response()->json(['apartment' => $apartment]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apartment $apartment)
    {
        if (auth()->user()->id !== $apartment->user_id) {
            return response()->json(['message' => 'Action Forbidden']);
        }
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $apartment->name = $request->name;
        $apartment->description = $request->description;
        $apartment->price = $request->price;
        $apartment->save();

        return response()->json(['message' => 'Product Purchase Updated', 'apartment' => $apartment]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(apartment $apartment)
    {
        if (auth()->user()->id !== $apartment->user_id) {
            return response()->json(['message' => 'Action Forbidden']);
        }
        $apartment->delete();
        return response()->json(null, 204);
    }

}
