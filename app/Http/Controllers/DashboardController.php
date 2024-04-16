<?php

namespace App\Http\Controllers;

use App\Models\AlbumModel;
use App\Models\FotoModel;
use App\Models\LikeModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $photos = FotoModel::where('userId', auth()->id())->get();
        $albums = AlbumModel::where('userId', auth()->id())->get();
        $likesCounts = [];
        foreach ($photos as $photo) {
            $likesCounts[$photo->id] = LikeModel::where('foto_id', $photo->id)->count();
        }
        return view('dashboard.dashboard', ['photos' => $photos, 'likesCounts' => $likesCounts, 'albums' => $albums]);
    }

    public function sortPhotosByAlbum($albumId)
    {
        $photos = FotoModel::where('userId', auth()->id())
            ->where('albumId', $albumId)
            ->get();

        $albums = AlbumModel::where('userId', auth()->id())->get();
        $likesCounts = [];
        foreach ($photos as $photo) {
            $likesCounts[$photo->id] = LikeModel::where('foto_id', $photo->id)->count();
        }

        return view('dashboard.dashboard', ['photos' => $photos, 'likesCounts' => $likesCounts, 'albums' => $albums]);
    }

}
