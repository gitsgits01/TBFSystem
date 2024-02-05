<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Recommender\RecommenderSystem;
use Illuminate\Support\Facades\Auth;
// use App\Models\Destination;
// use App\Models\Schedule;
use Phpml\Classfication\KNearestNeighbors;
use Phpml\Math\Distance\Euclidean;
use Phpml\Math\Distance\Minkowski;
use Phpml\Math\Matrix;
use Carbon\Carbon;


class RecommendationController extends Controller
{
    public function recommendUsers(User $user)
    {
        $matchingSchedules=[];

        $userSchedules = $user->schedules;

        // if ($userSchedules->isNotEmpty()) {
            $currentSchedule = $userSchedules->last();

            if ($currentSchedule && isset($currentSchedule->destination) && isset($currentSchedule->date)) {
                $matchingSchedules = Schedule::where('destination', $currentSchedule->destination)
                ->where('date', '>=', $currentSchedule->date)
                ->get();
        
                 

            }
            // Calculate cosine similarity
            $similarUsers = [];
            foreach ($matchingSchedules as $schedule) {
            $similarity = $this->calculateCosineSimilarity(
            $currentSchedule->location,
            $schedule->location
            );

            $similarUsers[$schedule->user_id] = $similarity;
            }

            // Sort users by similarity
            arsort($similarUsers);

            // Get the top 3 similar users
            $topSimilarUsers = array_slice($similarUsers, 0, 3, true);
        //}

       

        return view('notification', compact('topSimilarUsers'));
    }

    private function calculateCosineSimilarity($vector1, $vector2)
    {
        $dotProduct = array_sum(array_map('intval', $vector1)) * array_sum(array_map('intval', $vector2));

        $magnitude1 = sqrt(array_sum(array_map(function ($val) {
            return intval($val) ** 2;
        }, $vector1)));

        $magnitude2 = sqrt(array_sum(array_map(function ($val) {
            return intval($val) ** 2;
        }, $vector2)));

        if ($magnitude1 == 0 || $magnitude2 == 0) {
            return 0;
        }

        return $dotProduct / ($magnitude1 * $magnitude2);
    }
    // public function index(){
    //     $this->set('users',$this->Destination::getUsers());
    // }

// public function attachDestinationToUser($userId, $destinationId)
// {
//     $user = User::find($userId);
//     $destination = Destination::find($destinationId);
// public function attachDestinationToUser($userId, $destinationId)
// {
//     $user = User::find($userId);
//     $destination = Destination::find($destinationId);

//     if ($user && $destination && !$user->destinations->contains($destinationId)) {
//         $user->destinations()->attach($destinationId);
//         return redirect()->route('dashboard')->with('success', 'Destination attached successfully!');
//     }else{
//         return redirect()->route('dashboard')->with('error','error');
//     }
// }
// public function showSuggestedUsers($id)
// {
//     $user = User::find($id);
//     if ($user && $destination && !$user->destinations->contains($destinationId)) {
//         $user->destinations()->attach($destinationId);
//         return redirect()->route('dashboard')->with('success', 'Destination attached successfully!');
//     }else{
//         return redirect()->route('dashboard')->with('error','error');
//     }
// }
// public function showSuggestedUsers($id)
// {
//     $user = User::find($id);

//     if (!$user) {
//         return response()->json(['error' => 'User not found'], 404);
//     }
//     if (!$user) {
//         return response()->json(['error' => 'User not found'], 404);
//     }

//     $recommender = new RecommenderSystem();
//     $suggestedUsers = $recommender->suggestUserFor($user);
//     $recommender = new RecommenderSystem();
//     $suggestedUsers = $recommender->suggestUserFor($user);

//     return view('notification', compact('suggestedUsers'));
// }
//     return view('notification', compact('suggestedUsers'));
// }

public function recommendSimilarTravels($userId, $location, $destination, $date, $days, $k = 3)
{
    // Get the user's scheduled travel details
    $userSchedule = Schedule::where('user_id', $userId)->first();

    // Prepare data for KNN
    $trainingData = [];
    $schedules = Schedule::where('destination', $destination)->get();

    foreach ($schedules as $schedule) {
        $trainingData[] = [
            strtotime($schedule->date),
            $schedule->location_latitude, // Assuming you have latitude and longitude columns
            $schedule->location_longitude,
        ];
    }

    // Convert input date to timestamp
    $inputTimestamp = strtotime($date);

    // Prepare input data for prediction
    $inputData = [
        $inputTimestamp,
        $userSchedule->location_latitude,
        $userSchedule->location_longitude,
    ];

    // Initialize KNN
    $knn = new KNearestNeighbors($k);
    $knn->train($trainingData);

    // Find the nearest schedules using KNN
    $nearestSchedules = $knn->predict([$inputData]);

    // Get recommended user_ids
    $recommendedUserIds = Schedule::whereIn('date', $nearestSchedules[0])->pluck('user_id');

    // Exclude the current user from recommendations
    $recommendedUserIds = $recommendedUserIds->reject(function ($id) use ($userId) {
        return $id == $userId;
    });

    // Return the recommended user_ids
    return response()->json(['recommended_user_ids' => $recommendedUserIds->toArray()]);
}
}



