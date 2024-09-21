<?php

namespace Modules\Api\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsControllerControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        $news->map(function ($news) {
            $news->image = url('images/' . $news->image);
            return $news;
        });

        return response()->json($news);
    }

    public function show($id) {
        $news = News::find($id);
        $news->image = url('images/' . $news->image);

        return response()->json([
            'data' => $news
        ], 200);
    }
}
