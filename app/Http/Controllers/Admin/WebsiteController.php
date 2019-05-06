<?php

namespace App\Http\Controllers\Admin;

use App\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // Show the list of user's websites
    public function index(){
        $websites = auth()->user()->websites;
        return view('admin.website.index', compact('websites'));
    }

    // Show the form for creating a new website
    public function create()
    {
        $website = new Website();
        $website->user_id = auth()->user()->id;
        return $this->edit($website);
    }

    // Show the form for editing the specified website
    public function edit(Website $website){
        if($website->user_id != auth()->user()->id){
            return abort(401);
        }

        return view('admin.website.edit', compact('website'));
    }

    // Delete the specified website
    public function destroy(Website $website)
    {
        if($website->user_id != auth()->user()->id){
            return abort(401);
        }

        $website->delete();

        return redirect()
            ->route('website.index')->with('status', 'Website has been deleted successfully');
    }

    // Save a newly created website
    public function store(Request $request){

        $website = new Website();
        $website->user_id = auth()->user()->id;

        return $this->update($request, $website);
    }

    // Update the specified website
    public function update(Request $request, Website $website){

        if($website->user_id != auth()->user()->id){
            return abort(401);
        }

        $request->validate([
            'name' => 'required',
            'avatar' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
            'domain' => 'sometimes|nullable|unique:websites,domain,' . $website->id
        ]);

        $website->domain = $request->input('domain');
        $website->name = $request->input('name');
        $website->slug =  $website->slug ?: Str::slug($request->input('name'), '-') . '-' . uniqid();
        $website->about = $request->input('about');
        $website->email = $request->input('email');
        $website->facebook = $request->input('facebook');
        $website->twitter = $request->input('twitter');

        if($request->file('avatar')) {
            $avatar = $request->file('avatar')->store('uploads', 'public');
            $website->avatar = $avatar;
        }

        $message = $website->id ? 'Website has been updated successfully' : 'Website has been created successfully';
        $website->save();

        return redirect()
            ->route('website.index')
            ->with('status', $message);
    }
}
