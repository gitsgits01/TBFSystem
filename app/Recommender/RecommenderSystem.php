<?php

namespace App\Recommender;
use App\Models\User;
use App\Models\Destination;

class RecommenderSystem {

    public function suggestUserFor(User $user){
        $selectedUser = $user->id;
        $userScores = [];

    
        $destinations = $user->getDestinations();
        $this->calculateDestinationScores($destinations, $userScores);

        // Other similar functions for other features

        // Total scores
        arsort($userScores);
        unset($userScores[$selectedUser]);

        $suggestedUsers = array_slice($userScores, 0, 10, true);

        return $suggestedUsers;
    }
    private function calculateDestinationScores($destinations, &$userScores) {
        foreach ($destinations as $destination) {
            foreach ($destination->getUsers() as $user) {
                if (isset($userScores[$user->id])) {
                    $userScores[$user->id] += 1;
                } else {
                    $userScores[$user->id] = 1;
                }
            }
        }
    }
}

