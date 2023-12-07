<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login', [
            'title' => 'Đăng nhập',
        ]);
    }

    public function login(Request $req)
    {
        $user = User::where('email', $req['email'])->first();
        if ($user) {
            if (Hash::check($req['password'], $user->password)) {
                Auth::login($user);
                Alert::success('Đăng nhập', 'Đăng nhập thành công');
                return redirect('/admin/category');
            }
        }
        Alert::warning('Đăng nhập', 'Tên đăng nhập hoặc mật khẩu không hợp lệ');
        return redirect()->back();
    }

    public function registry()
    {
        return view('admin.auth.registry', [
            'title' => 'Đăng ký',
        ]);
    }

    public function registrySave(Request $req)
    {
        if (User::where('phone', $req['phone'])->count()) {
            Alert::warning('Tài khoản', 'Số điện thoại này đã có người khác dùng rồi! Vui lòng chọn số điện thoại khác');
            return redirect()->back();
        } else if (User::where('email', $req['email'])->count()) {
            Alert::warning('Tài khoản', 'Email này đã có người khác dùng rồi! Vui lòng chọn email khác');
            return redirect()->back();
        } else if ($req['password'] !== $req['re-password']) {
            Alert::warning('Tài khoản', 'Mật khẩu không khớp');
            return redirect()->back();
        }

        // Add image
        if ($req->file('avatar')) {
            $req['avatar'] = str_replace('public', '/storage', $req->file('avatar')->store('public/user'));
        }
        User::create($req->input());
        Alert::success('Tài khoản', 'Đăng ký tài khoản thành công');
        return redirect('/auth');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
