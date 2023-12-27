<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
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

    public function registryEmployer()
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();

        return view('home.registry-employer', [
            'title'      => 'Đăng ký nhà tuyển dụng',
            'categories' => $categories,
        ]);
    }

    public function registryEmployerSave(Request $req)
    {
        if ($req['password'] == $req['re-password']) {
            // Add image
            if ($req->file('avatar')) {
                $req['avatar_path'] = str_replace('public', '/storage', $req->file('avatar')->store('public/user'));
            }
            if ($req->file('logo')) {
                $req['logo_path'] = str_replace('public', '/storage', $req->file('logo')->store('public/company'));
            }

            $company = Company::create([
                'company_name'        => $req['company_name'],
                'logo'                => $req['logo_path'],
                'company_information' => $req['company_information'],
                'tax_code'            => $req['tax_code'],
            ]);

            User::create([
                'fullname'   => $req['fullname'],
                'password'   => Hash::make($req['password']),
                'avatar'     => $req['logo_path'],
                'email'      => $req['email'],
                'phone'      => $req['phone'],
                'role'       => 'employer',
                'company_id' => $company->company_id,
            ]);
            Alert::success('Thành công', 'Đăng ký tài khoản nhà tuyển dụng thành công');
        } else {
            Alert::warning('Thông báo', 'Mật khẩu không khớp');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth');
    }
}
