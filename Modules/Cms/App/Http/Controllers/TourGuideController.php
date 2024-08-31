<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TourGuide;
use Modules\Cms\App\Http\Requests\TourGuideRequest;

class TourGuideController extends Controller
{
    //
    public function index(){
        $query = TourGuide::query()->get();

        return view('Cms::admin.tourguide.index', compact('query'));
    }
    public function create(){
        return view('Cms::admin.tourguide.create');
    }
    public function store(TourGuideRequest $request){
        $image = $request->file('avatar');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        TourGuide::query()->create([
            'name' => $request->get('name'),
            'birthday' => $request->get('birthday'),
            'avatar' => $new_name,
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'gender' => $request->get('gender'),
        ]);

        return redirect()->route('tourguide.index');
    }
    public function show($id) {
        $tourguide = TourGuide::findOrFail($id);
        return view('Cms::admin.tourguide.detail', compact('tourguide'));
    }
    public function edit(TourGuide $tourguide) {
        return view('Cms::admin.tourguide.edit', compact('tourguide'));
    }
    public function update($id, TourGuideRequest $request){
        $image_name = $request->hidden_image;
        $image = $request->file('tour_image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }

        $tourguide = TourGuide::query()->findOrFail($id);

        $tourguide->update([
            'name' => $request->get('name'),
            'birthday' => $request->get('birthday'),
            'avatar' => $image_name,
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'gender' => $request->get('gender'),
        ]);
        return redirect()->route('tourguide.index');
    }
    public function destroy(TourGuide $tourguide) {
        $tourguide->delete();
        return redirect()->route('tourguide.index');
    }
}
