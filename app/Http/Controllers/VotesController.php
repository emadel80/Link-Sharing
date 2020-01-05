<?php

namespace App\Http\Controllers;

use App\Models\CommunityLinkVote;
use App\Models\CommunityLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommunityLink $link)
    {
        Auth::user()->toggleVoteFor($link);

        return back();
    }
}
