<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdatePasswordRequest;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show user profile.
     */
    public function profile(): View
    {
        $user = auth()->user();

        return view('backend.pages-profile-user', compact('user'));
    }

    /**
     * Update user profile information.
     */
    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        /** @var UserModel $user */
        $user = auth()->user();

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                @unlink(public_path($user->profile_image));
            }

            $file = $request->file('profile_image');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile_images'), $filename);

            $data['profile_image'] = 'uploads/profile_images/'.$filename;
        }

        $user->update($data);

        return redirect()->route('backend.profile')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Show change password form.
     */
    public function changePasswordView(): View
    {
        $user = auth()->user();

        return view('backend.change-password', compact('user'));
    }

    /**
     * Update user password.
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        /** @var UserModel $user */
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('backend.profile')
            ->with('success', 'Password changed successfully.');
    }
}
