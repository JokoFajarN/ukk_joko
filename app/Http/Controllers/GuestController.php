<?php

namespace App\Http\Controllers;

use App\Models\FotoModel;
use App\Models\LikeModel;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $photos = FotoModel::all();
        $likesCounts = [];
        foreach ($photos as $photo) {
            $likesCounts[$photo->id] = LikeModel::where('foto_id', $photo->id)->count();
        }
        return view('guest', ['photos' => $photos, 'likesCounts' => $likesCounts]);
    }

    public function back(Request $request)
    {
        return redirect()->back();
    }
}
