<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //add this line
use App\Models\UserBio;
use App\Models\PersonalityType;
use Illuminate\Support\Facades\Auth; //add this line
use Illuminate\Support\Facades\Storage; //add this line
class UserController extends Controller
{
    public function showBio()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user
        $bio = $user->bio; // Access the related bio for the user
        return view('profile.show-bio', compact('user', 'bio'));
    }

    public function updateBio(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();
        // Retrieve the user's bio
        $bio = $user->bio;

        // Validate the request input
        $request->validate([
            'bio' => 'required|string',
        ]);

        // Update or create the user's bio
        if ($bio) {
            $bio->update([
                'bio' => $request->input('bio'),
            ]);
        } else {
            $user->bio()->create([
                'bio' => $request->input('bio'),
            ]);
        }

        return redirect()->route('profile.show-bio')
                        ->with('status', 'Bio updated successfully!');
    }


    public function updateProfilePhoto(Request $request)
    {
        // Validate the request input
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Check if a file was uploaded
        if ($request->file('profile_photo')) {
            // Delete the old photo if it exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Store the new photo
            $fileName = time() . '_' . $request->file('profile_photo')->getClientOriginalName();
            $filePath = $request->file('profile_photo')->storeAs('uploads/profile_photos', $fileName, 'public');

            // Update the user's profile photo path
            $user->profile_photo = $filePath;
            $user->save();
        }

        // Redirect with a success message
        return redirect()->route('profile.edit')
                        ->with('status', 'Profile photo updated successfully!');
    }

}
