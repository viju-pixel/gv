<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\api\CustomerPhoneRequest;
use App\Http\Resources\api\UserDetailResource;
use Validator;
use App\Http\Requests\api\LoginRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Twilio\Rest\Client;

class LoginController extends Controller
{
    
 public function getOtp(CustomerPhoneRequest $request)
    {
      

        $user = User::where('phone', $request->phone)->first();
        // $isAdmin = $request->query('isAdmin');
        if (!$user) {
            return response()->json(['data' => trans('app.phone_not_exist')], Response::HTTP_NOT_FOUND);
        }
        $otp = rand(1000, 9999); //Generating Random Otp

        $accountSid = env('TWILIO_ACCOUNT_SID');
        $authToken = env('TWILIO_A UTH_TOKEN');
        $twilioNumber = env('TWILIO_PHONE_NUMBER');
        // $accountSid ="AC66bbb54c546f7c4e0b824d405d3129eb";
        // $authToken = "2945d17bb0b49cdb4a372593a18ea06b";
        // $twilioNumber = "+16204079363";
        $client = new Client($accountSid, $authToken);
        $client->messages
            ->create($request->phone, [
                'from' =>$twilioNumber,
                'body' => "Your OTP is $otp"
            ]);

          $user->update(['otp' => $otp]);  // update OTP for the user

        return response()->json(['data' => trans('app.otp_sent')], Response::HTTP_OK);
        }  



        public function verifyOtp(LoginRequest $request)
         {
        
            $user = User::where('phone', $request->phone)->where('otp', $request->otp)->first();
            if ($user) {
                 $user->update(['otp' => null, 'verified_by'=>1]);
                $user->token = 'Bearer ' . $user->createToken($user->name . ' ' . $user->last_name, ['*'])->accessToken;
                $data = new UserDetailResource($user);
                $message = trans('app.login_success');
                return response()->json(compact('data', 'message'), Response::HTTP_OK);
            } else {
                return response()->json(['error' => trans('app.otp_invalid')], Response::HTTP_BAD_REQUEST);
            }
        }
}
