<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    /**
     * Fillable fields for the table.
     * 
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'url'
    ];

    /**
     * Create a new instance and associate it with the given user.
     * 
     * @param User $user
     * @return static
     */
    public static function from(User $user)
    {
        $link = new static;

        $link->user_id = $user->id;

        if ($user->isTrusted()) {
            $link->approve();
        }
        
        return $link;
    }

    /**
     * Contribute the given community link.
     * 
     * @param array $attributes
     * @return bool
     */
    public function contribute($attributes)
    {
        return $this->fill($attributes)->save();
    }

    /**
     * Mark the community link as approved.
     * 
     * @return $this
     */
    public function approve()
    {
        $this->approved = true;

        return $this;
    }

    /**
     * A community link has a user.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A community link is assigned a category.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
