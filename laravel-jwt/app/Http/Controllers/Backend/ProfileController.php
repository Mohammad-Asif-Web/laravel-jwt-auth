<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\User;
use App\Helper\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index()
    {
        $user = User::find(auth()->user()->id);
        // dd($user);
        return view('backend.layout.profile.profile', compact('user'));
    }

    // admin profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|min:2|max:100',
            'email'         => 'required|string|email|max:100|unique:users,email,' . $user->id,
            'country'       => 'required|string',
            'city'          => 'required|string',
            'state'         => 'required|string',
            'phone'         => 'required|string|unique:users,phone,' . $user->id,
            'dob'           => 'nullable|date',
            'profile_img'   => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'cover_img'     => 'nullable|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            if ($request->hasFile('profile_img')) {
                // Delete old profile image
                $old_image_path = public_path($user->profile_img);

                if (file_exists($old_image_path) && is_file($old_image_path)) {
                    @unlink($old_image_path);
                }

                $image = $request->file('profile_img');
                $image_name = Helper::fileUpload($image, 'user/', Str::random(10));
                $user->profile_img = $image_name;

            }

            if ($request->hasFile('cover_img')) {
                // Delete old profile image
                $old_image_path = public_path($user->cover_img);

                if (file_exists($old_image_path) && is_file($old_image_path)) {
                    @unlink($old_image_path);
                }

                $image = $request->file('cover_img');
                $image_name = Helper::fileUpload($image, 'user/', Str::random(10));
                $user->cover_img = $image_name;

            }


            $user->update($request->only('name', 'email', 'country', 'city', 'state', 'phone', 'dob'));

            return back()->with('success', 'Profile updated successfully.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'             => 'required|string|email|max:100|exists:users,email',
            'password'          => 'required|string|min:8|confirmed',
            // 'password_confirmation' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if ($user->email !== $request->email) {
            return back()->withErrors(['email' => 'The email does not match your current email.']);
        }

        try {
            $user->password = Hash::make($request->password);
            $user->save();

            return back()->with('success', 'Password updated successfully.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // get all users
    public function users()
    {
        $users = User::with(['posts'])->latest()->get();
        // $posts = Post::where('user_id')
        return view('backend.layout.users.users', compact('users'));
    }

    // get all images from posts
    public function gallery()
    {
        return view('backend.layout.gallery.gallery');
    }
}
