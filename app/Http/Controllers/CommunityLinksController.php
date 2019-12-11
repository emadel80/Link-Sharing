<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CommunityLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommunityLinksController extends Controller
{
    public function index()
    {
        $links = CommunityLink::paginate(25);
        $categories = Category::orderBy('title', 'asc')->get();
                  
        return view('community.index', compact('links', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'url' => 'required|active_url|unique:community_links'
        ]);

        CommunityLink::from(Auth::user())->contribute($request->all());

        return back();
    }
}
