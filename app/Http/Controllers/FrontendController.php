<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function show(Request $request){
        $subdomain = $request->route('domain') ?? $request->route('subdomain');
        $website = Website::where('id', $subdomain)
            ->orWhere('slug', $subdomain)
            ->orWhere('domain', $subdomain)
            ->firstOrFail();

        return view('frontend.show', compact('website'));
    }
}
