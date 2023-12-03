<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\UserCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function index(Request $req)
    {
        $companyID = UserCompany::where('user_id', Auth::user()->user_id)->pluck('company_id')[0];
        $company = Company::where('company_id', $companyID)->first();

        return view('admin.account.index', [
            'title'   => 'Tài khoản thành viên',
            'company' => $company,
        ]);
    }

    public function store(Request $req)
    {
        $user = User::where('email', $req['email'])->first();
        if ($user) {
            $model = UserCompany::firstOrCreate(['company_id' => $req['company_id'], 'user_id' => $user->user_id], [
                'company_id' => $req['company_id'],
                'user_id'    => $user->user_id,
            ]);
            Alert::success('Tài khoản', 'Thêm thành công');
            return redirect()->back();
        }
        Alert::error('Tài khoản', 'Không tìm thấy tài khoản này');
        return redirect()->back();
    }

    public function destroy(Request $req)
    {
        $companyID = explode('-', $req['id'])[0];
        $userID = explode('-', $req['id'])[1];

        UserCompany::where('company_id', $companyID)->where('user_id', $userID)->delete();
        Alert::success('Tài khoản', 'Xoá thành công');
        return redirect()->back();
    }
}
