<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use App\Models\TourGuide;
use Modules\Cms\App\Http\Requests\TourRequest;

class TourController extends Controller
{
    //
    public function index(){
        $tours = Tour::query()->with(['guide', 'category'])->orderByDesc('created_at')->paginate(10);

        return view('Cms::admin.tour.index', compact('tours'));
    }
    public function show($id){
        $tours = Tour::findOrFail($id);
        $category_id = $tours->category_id;
        $category = Category::findOrFail($category_id);
        $tourGuide_id = $tours->tour_guide_id;
        $tourGuide = TourGuide::findOrFail($tourGuide_id);
        return view('Cms::admin.tour.detail', compact('tours', 'category', 'tourGuide'));
    }
    public function create(){
        $categories = Category::all();
        $tourguides = TourGuide::all();
        return view('Cms::admin.tour.create', compact('categories', 'tourguides'));
    }
    public function store(TourRequest $request){
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        Tour::query()->create([
            'id' => $request->id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'image' => $new_name,
            'place' => $request->place,
            'vehicle' => $request->vehicle,
            'locationStart' => $request->locationStart,
            'locationEnd' => $request->locationEnd,
            'quantityDate' => $request->quantityDate,
            'dateStart' => $request->dateStart,
            'dateEnd' => $request->dateEnd,
            'description' => $request->description,
            'trip' => $request->trip,
            'tour_guide_id' => $request->tour_guide_id,
        ]);

        return redirect()->route('tour.index');
    }
    public function edit(Tour $tour){
        $categories = Category::all();
        $tourguide = TourGuide::all();
        return view('Cms::admin.tour.edit', compact('tourguide', 'categories', 'tour'));
    }
    public function update(Tour $tour, TourRequest $request){
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        $form_data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'image' => $image_name,
            'place' => $request->place,
            'vehicle' => $request->vehicle,
            'locationStart' => $request->locationStart,
            'locationEnd' => $request->locationEnd,
            'quantytiDate' => $request->quantytiDate,
            'dateStart' => $request->dateStart,
            'dateEnd' => $request->dateEnd,
            'description' => $request->description,
            'trip' => $request->trip,
            'tourGuide_id' => $request->tourGuide_id
        );

        $tour->update($form_data);
        return redirect()->route('tour.index');
    }
    public function destroy(Tour $tour) {
        $tour->delete();
        return redirect()->route('tour.index');
    }
}
