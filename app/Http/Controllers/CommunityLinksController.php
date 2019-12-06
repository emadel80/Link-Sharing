<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommunityLinksController extends Controller
{
    public function index()
    {
        $links = CommunityLink::paginate(25);
                  
        return view('community.index', compact('links'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required|active_url'
        ]);

        CommunityLink::from(Auth::user())->contribute($request->all());

        return back();
    }
}
