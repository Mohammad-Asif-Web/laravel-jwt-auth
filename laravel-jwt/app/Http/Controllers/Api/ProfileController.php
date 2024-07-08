<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Helper\Helper;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    use ApiResponseTrait;

    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function userProfile($id):JsonResponse
    {

        $authUser = auth()->user();

        // Check if authenticated user is parent, coach or player
        if (!$authUser || !in_array($authUser->role, ['parent', 'coach', 'player'])) {
            return $this->errorResponse('Unauthorized access', null, 403);
        }

        $user = User::find($id);

        // If user is not found, return error
        if (!$user) {
            return $this->errorResponse('User not found', null, 404);
        }

        // Determine role of user being requested
        switch ($user->role) {
            case 'parent':

                // $parentdata = User::where('id', auth()->user()->id)->get();
                // // dd($parentdata);
                // $childData = User::where('parent_id', auth()->user()->id)->get();


                $parentData = $user;
                $childData = User::where('parent_id', $parentData->id)->get();
                return response()->json([
                    'status' => true,
                    'message' => 'Parent and child data retrieved successfully',
                    'parentData' => $parentData,
                    'childData' => $childData,
                    'code' => '200',
                ], 200);

            case 'coach':
                return $this->successResponse('Coach found successfully', $user, 200);

            case 'player':
                $dob = $user->dob;
                $age = now()->diffInYears(Carbon::parse($dob));
                $responseMessage = $age < 18 ? 'Child player found successfully' : 'Player found successfully';
                return $this->successResponse($responseMessage, $user, 200);

            default:
                return $this->errorResponse('Unauthorized access', null, 403);
        }


    }

    // Update Profile
    public function updateUserProfile(Request $request, $id)
    {
        $authUser = auth()->user();

        // Check if authenticated user has valid role
        if (!$authUser || !in_array($authUser->role, ['parent', 'coach', 'player'])) {
            return $this->errorResponse('Unauthorized access', null, 403);
        }

        if($authUser->id != $id){
            return $this->errorResponse('Access denied. You don\'t have permission to do something here', null, 403);
        }

        $user = User::find($id);

        // If user is not found, return error
        if (!$user) {
            return $this->errorResponse('User not found', null, 404);
        }

        // Validation rules based on role
        $validate = $request->validate([
            'name' => 'nullable|string|max:150',
            'phone' => 'nullable|string|max:15',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dob' => 'nullable|date',
            'graduation_year' => 'nullable|date',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'positions' => 'nullable|json',
            'handed' => 'nullable|in:left,right',
        ]);


        // Update the user based on provided data
        $user->update($request->except(['profile_img', 'cover_img']));

        // Handle profile image update
        if($request->hasFile('profile_img')){
            $newImgName = $request->file('profile_img');

            // delete old image
            if($user->profile_img){
                $oldImgName = $user->profile_img;
                $profileImgPath = public_path($oldImgName);
                if(file_exists($profileImgPath) && is_file($profileImgPath)){
                    @unlink($profileImgPath);
                }
            }

            // upload new image
            $profileImgName = Helper::fileUpload($newImgName, 'user/', Str::random(10));
            $user->profile_img = $profileImgName;
        }

        // Handle cover image update
        if($request->hasFile('cover_img')){
            $newImgName = $request->file('cover_img');

            // delete old image
            if($user->cover_img){
                $oldImgName = $user->cover_img;
                $coverimgPath = public_path($oldImgName);
                if(file_exists($coverimgPath) && is_file($coverimgPath)){
                    @unlink($coverimgPath);
                }
            }

            // upload new image
            $coverImgName = Helper::fileUpload($newImgName, 'user/', Str::random(10));
            $user->cover_img = $coverImgName;
        }

        // Save the updated user data
        $user->save();

        return $this->successResponse('User profile updated successfully', $user, 200);
    }

}

