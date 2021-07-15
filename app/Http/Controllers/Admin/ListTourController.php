<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryTour;
use App\Models\Image;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListTourController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authId = Auth::user()->name;
        $tours = Tour::orderBy('created_at', 'asc')->paginate(config('app.default_paginate_tour_admin'));

        return view('admin.listTour', [
            'tours' => $tours,
            'authId' => $authId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catTour = CategoryTour::all();

        return view('admin.createTour', [
            'cat_tour' => $catTour,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createTour = Tour::create($request->all());

        if ($request->has('thumbnailTour')) {
            $thumbnail = $request->file('thumbnailTour');
            $path = config('app.image_tour');
            $name = $thumbnail->getClientOriginalName();
            $storedPath = $thumbnail->move($path, $name);

            Image::create([
                'imageable_id' => $createTour->id,
                'imageable_type' => 'tours',
                'url' => $path . $name,
            ]);
        }

        return redirect()->route('admintours.index')->with('createSuccess', trans('messages.createSuccess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::find($id);
        $catTour = CategoryTour::all();

        return view('admin.editTour', [
            'tour' => $tour,
            'cat_tour' => $catTour,
        ]);
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
        $tour = Tour::find($id);
        $tour->name = $request->description;
        $tour->description =  $request->description;
        $tour->num_of_participants = $request->numOfParticipants;
        $tour->duration = $request->duration;
        $tour->cat_tour_id = $request->cat_tour_id;
        $tour->price = $request->price;
        $tour->save();

        return redirect()->route('admintours.index')->with('updateSuccess', trans('messages.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTour = Tour::find($id);
        if ($deleteTour) {
            $deleteTour->delete();
            return redirect()->route('admintours.index')->with('deleteSuccess', trans('messages.deleteSuccess'));
        } else {
            return redirect()->route('admintours.index')->with('deleteFail', trans('messages.deleteFail'));
        }
    }
}
