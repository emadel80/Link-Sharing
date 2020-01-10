<?php

namespace App\Queries;

use App\Models\CommunityLink;

    class CommunityLinksQuery 
    {
        public function get($sortByPopular, $category)
        {
            $orderBy = $sortByPopular ? 'votes_count' : 'updated_at';

            return CommunityLink::with('user', 'category')
                ->withCount('votes')
                ->forCategory($category)
                ->where('approved', 1)
                ->orderBy($orderBy, 'desc')
                ->paginate(3);
        }
    }
