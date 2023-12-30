<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCompany;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function index(Request $req, $accountType)
    {
        $users = User::where('role', $accountType)->orderBy('updated_at', 'desc')->get();

        return view('admin.account.index', [
            'title'       => $accountType == 'employer' ? 'Nhà tuyển dụng' : 'Người tìm việc',
            'users'       => $users,
            'accountType' => $accountType,
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
        User::where('user_id', $req['id'])->delete();
        Alert::success('Tài khoản', 'Xoá thành công');
        return redirect()->back();
    }
}
