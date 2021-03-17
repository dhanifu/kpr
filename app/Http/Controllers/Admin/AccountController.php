<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;

class AccountController extends Controller
{
    public function index()
    {
        $account = User::where('id', '!=', auth()->user()->id)->latest()->paginate(5);
        return view('admin.account.index', [
            'accounts' => $account
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = bcrypt($request->password);
        $thumb = request()->file('avatar') ? request()->file('avatar')->store("images/avatar") : null;
        $attr['avatar'] = $thumb;
        User::create($attr);
        return back();
    }

    public function edit($id)
    {
       $user = User::findOrFail($id);
       return view('admin.account.edit', compact('user'));
    }

    public function update($id)
    {
        $attr = $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'username' => ['required', 'min:3', 'string', 'max:255', 'unique:users,username,'.$id],
            'role' => ['required'],
            'avatar' => ['mimes:png,jpg,jpeg,svg', 'max:2048']
        ]);
        $user = User::findOrFail($id);
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
        $attr['avatar'] = $thumbnail;
        $user->update($attr);
        return redirect()->route('admin.account.register.index');
    }
}
