<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function show($slug){
        $website = Website::where('id', $slug)
            ->orWhere('slug', $slug)
            ->firstOrFail();

        return view('frontend.show', compact('website'));
    }
}
