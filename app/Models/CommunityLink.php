<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    protected $fillable = [
        'category', 'title', 'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function from(User $user)
    {
        $link = new static;

        $link->user_id = $user->id;
        $link->category_id = 1;
        
        return $link;
    }

    public function contribute($attributes)
    {
        return $this->fill($attributes)->save();
    }
}
