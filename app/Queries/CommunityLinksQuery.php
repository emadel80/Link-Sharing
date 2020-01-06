<?php

namespace App\Queries;

use App\Models\CommunityLink;

    class CommunityLinksQuery 
    {
        public function get($sortByPopular, $category)
        {
            $orderBy = $sortByPopular ? 'vote_count' : 'updated_at';

            return CommunityLink::with('votes', 'user', 'category')
                ->forCategory($category)
                ->where('approved', 1)
                ->leftJoin('community_links_votes', 'community_links_votes.community_link_id', '=', 'community_links.id')
                ->selectRaw(
                    'community_links.*, count(community_links_votes.id) as vote_count'
                )
                ->groupBy('community_links.id')
                ->orderBy($orderBy, 'desc')
                ->paginate(3);
        }
    }
