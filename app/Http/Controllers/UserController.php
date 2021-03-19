<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected function messages()
    {
        return [
            'password.confirmed' => 'password konfirmasi tidak sama!'
        ];
    }

    public function changePassword()
    {
        return view('profile.changepassword');
    }

    public function updatePassword()
    {
        $this->validate(request(), [
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $this->messages());
        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
            return redirect()->route('home');
        } else {
            return back();
        }
    }

    public function edit()
    {
        return view('profile.setting');
    }

    public function update()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:50|string',
            'avatar' => 'mimes:png,jpg,jpeg,ico,svg|max:2048',
            'email' => 'required|string',
            'nrp' => 'required'
        ], $this->messages());

        $user = auth()->user();
        if ($user->avatar == null) {
            if (request()->file('avatar')) {
                $thumbnail = request()->file('avatar')->store("images/avatar");
            } else {
                $thumbnail = null;
            }
        } else {
            if (request()->file('avatar')) {
                \Storage::delete($user->avatar);
                $thumbnail = request()->file('avatar')->store("images/avatar");
            } else {
                $thumbnail = $user->avatar;
            }
        }

        $user->update([
            'name' => request('name'),
            'avatar' => $thumbnail,
            'email' => request('email'),
            'nrp' => request('nrp')
        ]);
        return back();
    }
    public function pinjaman()
    {
        return view('user.pinjaman.index');
    }
}

