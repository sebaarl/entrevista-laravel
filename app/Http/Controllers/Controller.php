<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $user = Auth::user();
        $colors = Color::where('user_id', $user->id)->pluck('name');

        $colorsArray = $colors->toArray();
        $colorRand = array_rand($colorsArray);
        $colorBackground = $colorsArray[$colorRand];

        return view('welcome', compact('colors', 'colorBackground'));
    }
}
