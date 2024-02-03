<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Recommender\RecommenderSystem;

class RecommendationController extends Controller
{
    // public function recommendUsers(User $user)
    // {
    //     $currentSchedule = $user->schedules->last();

    //     $matchingSchedules = Schedule::where('destination', $currentSchedule->destination)
    //         ->where('departure_date', '>=', $currentSchedule->departure_date)
    //         ->get();

    //     // Calculate cosine similarity
    //     $similarUsers = [];
    //     foreach ($matchingSchedules as $schedule) {
    //         $similarity = $this->calculateCosineSimilarity(
    //             $currentSchedule->location,
    //             $schedule->location
    //         );

    //         $similarUsers[$schedule->user_id] = $similarity;
    //     }

    //     // Sort users by similarity
    //     arsort($similarUsers);

    //     // Get the top 5 similar users
    //     $topSimilarUsers = array_slice($similarUsers, 0, 5, true);

    //     $recommendedUsers = User::whereIn('id', array_keys($topSimilarUsers))->get();

    //     return view('recommendations', compact('recommendedUsers'));
    // }

    // private function calculateCosineSimilarity($vector1, $vector2)
    // {
    //     $dotProduct = array_sum(array_map('intval', $vector1)) * array_sum(array_map('intval', $vector2));

    //     $magnitude1 = sqrt(array_sum(array_map(function ($val) {
    //         return intval($val) ** 2;
    //     }, $vector1)));

    //     $magnitude2 = sqrt(array_sum(array_map(function ($val) {
    //         return intval($val) ** 2;
    //     }, $vector2)));

    //     if ($magnitude1 == 0 || $magnitude2 == 0) {
    //         return 0;
    //     }

    //     return $dotProduct / ($magnitude1 * $magnitude2);
    // }


    //new
    // public function recommendUsers($user_id){
    //     $user= User::find($user_id);
    //     if(!$user){
    //         return response()->json(['error'=>'user not found'],404);
    //     }
    //     $recommender= new RecommenderSystem();
    //     $recommendations=$recommender->suggestUserFor($user);
    //     return response()->json(['recommendations'=>$recommendations]);

    // }

    public function showSuggestedUsers($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $recommender = new RecommenderSystem();
        $suggestedUsers = $recommender->suggestUserFor($user);

        return view('notification', compact('suggestedUsers'));
    }
    
}
