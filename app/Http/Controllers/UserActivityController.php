<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserActivityRequest;
use App\Models\User;
use App\Models\UserActivity;

class UserActivityController extends Controller
{
    public function getConversations(UserActivityRequest $request) {
        $user = User::find($request->uid);
        $response = [
            'code'      => 500,
            'payload'   => []
        ];
        if ($user) {
            $userActivities = UserActivity::select('id', 'message_from as messageType', 'message_text as value', 'created_at as timestamp')
                ->where('uid', $user->id)
                ->get();
            if (count($userActivities) > 0) {
                $response = [
                    'code'      =>200,
                    'payload'   => $userActivities
                ];
            }
        }
        return response()->json($response, $response['code']);
    }
}
