<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CommunityLink;
use App\Exceptions\CommunityLinkAlreadySubmitted;
use App\Http\Requests\CommunityLinkForm;
use Illuminate\Support\Facades\Auth;

class CommunityLinksController extends Controller
{
    /**
     * Show all community links.
     * 
     * @param Category $category
     * @return \Illuminate\View\View
     */
    public function index(Category $category = null)
    {
        $links      = CommunityLink::with('votes')->forCategory($category)->where('approved', 1)->latest('updated_at')->paginate(3);
        $categories = Category::orderBy('title', 'asc')->get();
        
        return view('community.index', compact('links', 'categories', 'category'));
    }

    /**
     * Publish a new community link.
     * 
     * @param  CommunityLinkForm $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommunityLinkForm $form)
    {
        try {
            $form->persist();

            if (Auth::user()->isTrusted()) {
                flash('Thanks for the contribution!')->important();
            } else {
                flash()->overlay('This contribution will be approved shortly', 'Thanks!');
            }
        } catch (CommunityLinkAlreadySubmitted $e) {
            flash()->overlay(
                "We'll instead bump the timestamps and bring that link back to the top.  Thanks!", 
                'That Link Has Already Been Submitted'
            );
        }

        return back();
    }
}
