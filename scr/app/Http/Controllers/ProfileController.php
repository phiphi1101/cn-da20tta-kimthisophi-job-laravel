<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index', [
            'title' => 'Thông tin công ty',
        ]);
    }

    public function save(Request $req)
    {
        $user = User::where('user_id', Auth::user()->user_id)->first();
        $company = Company::where('company_id', $req['company_id'])->first();
        if ($req['password'] != null && $req['password'] == $req['re-password']) {
            $user->password = Hash::make($req['password']);
        }
        $user->fullname = $req['fullname'];
        $user->email = $req['email'];
        $user->phone = $req['phone'];
        if ($req->file('avatar')) {
            $user->avatar = str_replace('public', '/storage', $req->file('avatar')->store('public/user'));
        }
        $user->save();

        if ($req->file('logo')) {
            $company->logo = str_replace('public', '/storage', $req->file('logo')->store('public/company'));
        }
        $company->company_name = $req['company_name'];
        $company->tax_code = $req['tax_code'];
        $company->company_information = $req['company_information'];

        $company->save();
        Alert::success('Thành công', 'Cập nhật tài khoản nhà tuyển dụng thành công');
        return redirect()->back();
    }
}
