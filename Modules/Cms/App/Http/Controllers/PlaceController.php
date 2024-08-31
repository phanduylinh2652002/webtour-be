<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Cms\App\Http\Requests\PlaceRequest;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Place::query()->get();

        return view('Cms::admin.place.index', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cms::admin.place.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaceRequest $request): RedirectResponse
    {
        Place::query()->create($request->validated());

        return redirect()->route('place.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('cms::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $place = Place::query()->findOrFail($id);

        return view('Cms::admin.place.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlaceRequest $request, $id): RedirectResponse
    {
        $place = Place::query()->findOrFail($id);

        $place->update($request->validated());

        return redirect()->route('place.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $place = Place::query()->findOrFail($id);
        $place->delete();

        return redirect()->route('place.index');
    }
}
