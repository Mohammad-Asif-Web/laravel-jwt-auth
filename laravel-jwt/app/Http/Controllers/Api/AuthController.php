<?php

namespace App\Http\Controllers;

use App\Jobs\UserVerifyMail;
use App\Mail\UserVerifyOtpMail;
use App\Models\Post;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Exception;
use App\Traits\ApiResponseTrait;


class AuthController extends Controller
{
    use ApiResponseTrait;
    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function register(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'parent_id'       => 'nullable|exists:users,id',
            'name'            => 'required|string|min:2|max:100',
            'email'           => 'required|string|email|max:100|unique:users',
            'password'        => 'required|string|min:6|confirmed',
            'profile_img'     => 'nullable|string',
            'cover_img'       => 'nullable|string',
            'phone'           => 'required|string|unique:users',
            'role'            => 'required|in:admin,player,coach,parent',
            'sport_id'        => 'required|exists:sports,id',
            'dob'             => 'required',
            'graduation_year' => 'required',
            'city'            => 'required|string',
            'state'           => 'required|string',
            'country'         => 'required|string',
            'offense'         => 'required|string',
            'defense'         => 'required|string',
            'handed'          => 'required|string',
            'skill'           => 'nullable'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), null, 422);
        }

        DB::beginTransaction();
        try {
            $sport = Sport::findOrFail($request->sport_id);

            if (!$sport) {
                return $this->errorResponse('Invallid Sports', null, 404);
            }

            // Generate a random 5-digit OTP
            $otp = rand(10000, 99999);

            $user = User::create([
                'name'            => $request->input('name'),
                'email'           => $request->input('email'),
                'password'        => Hash::make($request->password),
                'phone'           => $request->input('phone'),
                'role'            => $request->input('role'),
                'sport_id'        => $sport->id,
                'dob'             => $request->input('dob'),
                'graduation_year' => $request->input('graduation_year'),
                'city'            => $request->input('city'),
                'state'           => $request->input('state'),
                'country'         => $request->input('country'),
                'offense'         => $request->input('offense'),
                'defense'         => $request->input('defense'),
                'handed'          => $request->input('handed'),
                'otp'             => $otp,
            ]);

            // handling users email data by UserVerifyMail Jobs
            UserVerifyMail::dispatch($user->toArray(), $otp);

            DB::commit();

            return $this->successResponse('User registerd successfully. An OTP sent to your email for Account verification', $user->toArray(), 200);

        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), null, 500);
        }

    }

    // login with otp verified
    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function login(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), null, 403);
        }

        // Auth Token By JWT
        $token = auth()->attempt($validator->validated());

        if (!$token) {
            return $this->errorResponse('incorrect credentials, please try again.', null, 403);
        }

        $user = auth()->user();

        // $otp = 0;
        // Check if the user is verified
        if (is_null($user->otp_verified_at)) {
            // Generate a random 5-digit OTP
            $otp = rand(10000, 99999);

            // Update the user with the new OTP
            $user->otp = $otp;
            $user->save();

            // handling users email data by UserVerifyMail Jobs
            UserVerifyMail::dispatch($user, $otp);

            return $this->errorResponse('Please verify your email first. An OTP sent to your email address.', $user, 403);
        }

        if ($user->status == '0') {
            $user->status = '1';
            $user->save();
        }

        return response()->json([
            'status'     => true,
            'message'    => 'User logged in successfully.',
            'token'      => $token,
            'userData'   => auth()->user(),
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'code'       => '200',
        ], 200);
    }


    /**=================================================
    * =========== Verify User Account OTP ============
    ===================================================*/

     public function verifyUserOTP(Request $request):JsonResponse
     {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric|digits:5',
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors(), null, 422);
        }

        $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

        if(!$user){
            return $this->errorResponse('Invalid OTP or email', null, 401);
        }

        $user->otp_verified_at = now();
        $user->otp = 0;
        $user->save();

        return $this->successResponse('OTP verified successfully. You can now log in.', $user, 200);

     }


    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function logout():JsonResponse
    {
        try {
            auth()->logout();
            return $this->successResponse('Logout Successfull', null, 200);

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }

    }


}


// ========= Registration System for user with otp ============



// login with otp verified
// public function login(Request $request):JsonResponse
// {
//     $validator = Validator::make($request->all(), [
//         'email'    => 'required|string|email|',
//         'password' => 'required|string|min:6',
//     ]);

//     if ($validator->fails()) {
//         return $this->errorResponse($validator->errors(), null, 403);
//     }

//     // Auth Token By JWT
//     $token = auth()->attempt($validator->validated());

//     if (!$token) {
//         return $this->errorResponse('incorrect credentials, please try again.', null, 403);
//     }

//     $user = auth()->user();

//     // $otp = 0;
//     // Check if the user is verified
//     if (is_null($user->otp_verified_at)) {
//         // Generate a random 5-digit OTP
//         $otp = rand(10000, 99999);

//         // Update the user with the new OTP
//         $user->otp = $otp;
//         $user->save();

//         // handling users email data by UserVerifyMail Jobs
//         UserVerifyMail::dispatch($user, $otp);

//         return $this->errorResponse('Please verify your email first. An OTP sent to your email address.', $user, 403);
//     }

//     if ($user->status == '0') {
//         $user->status = '1';
//         $user->save();
//     }

//     return response()->json([
//         'status'     => true,
//         'message'    => 'User logged in successfully.',
//         'token'      => $token,
//         'userData'   => auth()->user(),
//         'token_type' => 'Bearer',
//         'expires_in' => auth()->factory()->getTTL() * 60,
//         'code'       => '200',
//     ], 200);
// }




// register api second update
// public function register(Request $request):JsonResponse
// {
//     $validator = Validator::make($request->all(), [
//         'parent_id'       => 'nullable|exists:users,id',
//         'name'            => 'required|string|min:2|max:100',
//         'email'           => 'required|string|email|max:100|unique:users',
//         'password'        => 'required|string|min:6|confirmed',
//         'profile_img'     => 'nullable|string',
//         'cover_img'       => 'nullable|string',
//         'phone'           => 'required|string|unique:users',
//         'role'            => 'required|in:admin,player,coach,parent',
//         'sport_id'        => 'required|exists:sports,id',
//         'dob'             => 'required',
//         'graduation_year' => 'required',
//         'city'            => 'required|string',
//         'state'           => 'required|string',
//         'country'         => 'required|string',
//         'offense'         => 'required|string',
//         'defense'         => 'required|string',
//         'handed'          => 'required|string',
//         'skill'           => 'nullable'
//     ]);

//     if ($validator->fails()) {
//         return $this->errorResponse($validator->errors(), null, 422);
//     }

//     DB::beginTransaction();
//     try {
//         $sport = Sport::findOrFail($request->sport_id);

//         if (!$sport) {
//             return $this->errorResponse('Invallid Sports', null, 404);
//         }

//         $user = User::create([
//             'name'            => $request->input('name'),
//             'email'           => $request->input('email'),
//             'password'        => Hash::make($request->password),
//             'phone'           => $request->input('phone'),
//             'role'            => $request->input('role'),
//             'sport_id'        => $sport->id,
//             // 'positions'       => json_encode($request->positions),
//             'dob'             => $request->input('dob'),
//             'graduation_year' => $request->input('graduation_year'),
//             'city'            => $request->input('city'),
//             'state'           => $request->input('state'),
//             'country'         => $request->input('country'),
//             'offense'         => $request->input('offense'),
//             'defense'         => $request->input('defense'),
//             'handed'          => $request->input('handed'),
//         ]);

//         DB::commit();

//         $updatedData = User::with(['sport'])->find($user->id);

//         return $this->successResponse('User registered successfully', $updatedData, 200);

//     } catch (Exception $e) {
//         DB::rollBack();
//         return $this->errorResponse($e->getMessage(), null, 500);
//     }

// }


// login api second update
// public function login(Request $request):JsonResponse
// {
//     $validator = Validator::make($request->all(), [
//         'email'    => 'required|string|email|',
//         'password' => 'required|string|min:6',
//     ]);

//     if ($validator->fails()) {
//         return $this->errorResponse($validator->errors(), null, 403);
//     }

//     // Auth Token By JWT
//     $token = auth()->attempt($validator->validated());

//     if (!$token) {
//         return $this->errorResponse('incorrect credentials, please try again.', null, 403);
//     }

//     $user = auth()->user();

//     if ($user->status == '0') {
//         $user->status = '1';
//         $user->save();
//     }

//     $sport = Sport::find($user->sport_id);
//     // $posts = Post::where('user_id', $user->id)->latest()->get();
//     // $childs = User::with(['sport'])->where('parent_id', $user->id)->latest()->get();

//     return response()->json([
//         'status'        => true,
//         'message'       => 'User logged in successfully.',
//         'token'         => $token,
//         'userData'      => auth()->user(),
//         'sport'         => $sport,
//         'token_type'    => 'Bearer',
//         'expires_in'    => auth()->factory()->getTTL() * 60,
//         'code'          => '200',
//     ], 200);
// }

