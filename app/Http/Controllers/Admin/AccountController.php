<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function admin_index_account()
    {
        $account = User::where('id', '!=', auth()->user()->id)->where('role', '0')->paginate(5);
        return view('admin.account.admin.index', [
            'accounts' => $account
        ]);
    }

    public function pengelola_index_account()
    {
        $account = User::where('id', '!=', auth()->user()->id)->where('role', '1')->paginate(5);
        return view('admin.account.kelola.index', [
            'accounts' => $account
        ]);
    }

    public function user_index_account()
    {
        $account = User::where('id', '!=', auth()->user()->id)->where('role', '2')->paginate(5);
        return view('admin.account.user.index', [
            'accounts' => $account
        ]);
    }

    public function enduser_index_account()
    {
        $account = User::where('id', '!=', auth()->user()->id)->where('role', '3')->where('email_verified_at', null)->paginate(5);
        return view('admin.account.user.index', [
            'accounts' => $account
        ]);
    }

    public function store()
    {
        $attr = $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users,username'],
            'password' => ['required', 'min:3'],
            'role' => ['required'],
            'avatar' => ['mimes:png,jpg,jpeg,svg', 'max:2048']
        ]);
        $attr['password'] = bcrypt(request('password'));
        $thumb = request()->file('avatar') ? request()->file('avatar')->store("images/avatar") : null;
        $attr['avatar'] = $thumb;
        User::create($attr);
        return back()->with('success', 'Berhasil Menambahkan User');
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
        return redirect()->route('admin.account.admin')->with('success','Data User Berhasil Di tambahkan');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->avatar)
        {
            \Storage::delete($user->avatar);
        }
        $user->delete();
        return back()->with('success', 'Berhasil Menghapus Data');
    }
    public function search($data)
    {
        echo $data[0];
    }
    public function verifikasi()
    {
        $account = User::where('id', '!=', auth()->user()->id)->where('role', '2')->paginate(5);

        return view('admin.account.verifikasi.index',[
            'accounts' => $account
        ]);
    }
}
