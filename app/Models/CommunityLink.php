<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    protected $fillable = [
        'category_id', 'title', 'url'
    ];

    public static function from(User $user)
    {
        $link = new static;

        $link->user_id = $user->id;

        return $link;
    }

    public function contribute($attributes)
    {
        return $this->fill($attributes)->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
