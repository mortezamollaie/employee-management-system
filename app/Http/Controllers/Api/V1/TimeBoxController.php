<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TimeBox;
use App\Models\User;
use Illuminate\Http\Request;

class TimeBoxController extends Controller
{
    public function startTimeBox(Request $request, $user_id)
    {
        try{
            $user = User::query()->findOrFail($user_id);
        }catch (\Exception $exception){
            return response()->json("user not found");
        }
        if($user->checkOpenTimeBox($user)){
            $timeBox = TimeBox::createTimeBox($request, $user);
            return response()->json("time box started");
        }else{
            return response()->json("time box has open");
        }
    }

    public function endTimeBox(Request $request, $user_id)
    {

    }

}
