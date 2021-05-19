<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageProfileRequest;
use Gate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Message;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit', [
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        /* $photo = cloudinary()->upload($request->file('photo')->getRealPath(), [
            'folder' => 'inmodata/profile',
            'transformation' => [
                'width' => 510,
                'height' => 571,
            ]
        ])->getSecurePath(); */
        //dd($request->file('photo')->storeOnCloudinary()->getSecurePath());
        //$photo = $request->file('photo')->storeOnCloudinary()->getSecurePath();

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function updateProfileImage(ImageProfileRequest $request)
    {
        $photo = cloudinary()->upload($request->file('photo')->getRealPath(), [
            'folder' => 'inmodata/profile',
            'transformation' => [
                'width' => 510,
                'height' => 571,
                'crop' => 'fill'
            ]
        ])->getSecurePath();

        //dd(photo);
        auth()->user()->update(array('photo' => $photo));

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
