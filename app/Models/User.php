<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Determine if the user is trusted.
     * 
     * @return bool
     */
    public function isTrusted()
    {
        return !! $this->trusted;
    }

    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_links_votes')->withTimestamps();
    }
    
    public function toggleVoteFor(CommunityLink $link)
    {
        CommunityLinkVote::firstOrNew([
            'user_id' => Auth::id(),
            'community_link_id' => $link->id
        ])->toggle();
    }

    public function votedFor(CommunityLink $link)
    {
        return $link->votes->contains('user_id', $this->id);
    }
}
