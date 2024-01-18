<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\cv;
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
                return redirect('/admin/job');
            }
        }
        Alert::warning('Đăng nhập', 'Tên đăng nhập hoặc mật khẩu không hợp lệ');
        return redirect()->back();
    }
            protected function redirectTo()
            {
                // Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng về trang dashboard hoặc trang chính
                if (Auth::check()) {
                    return redirect('/contact'); // Chuyển hướng về trang thống kê admin hoặc trang dashboard của bạn
                }

                // Lấy đường dẫn trang mà người dùng đã truy cập trước khi đăng nhập
                $previousUrl = url()->previous();

                // Kiểm tra xem nếu đường dẫn trước đó là đường dẫn đăng ký hoặc đăng nhập, thì chuyển hướng về trang mặc định
                if (in_array($previousUrl, [redirect('/auth/registry'), redirect('/auth')])) {
                    return $previousUrl; // Chuyển hướng về trang chính của bạn
                }

                // Ngược lại, chuyển hướng về đường dẫn trước đó
                return $previousUrl;
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
        $newUser = User::create($req->input());
        $newUserId = $newUser->user_id;

// lưu vào cv
    try {
        $validateData = $req->validate([
            'fullname' => 'required',
            'gender' => 'required',
            'birthday' => 'required|date',
            'avatar' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'academic_level' => 'required',
            'current_job_description' => 'required',
            'current_job_skills' => 'required',
            'current_job_potision' => 'required',
            'salary' => 'required',
            'english_level' => 'required',
            'it_level' => 'required',
            'degree_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $cvre = new Cv;

        // Gán dữ liệu đã được kiểm tra vào đối tượng Cv
        $cvre->fullname = $validateData['fullname'];
        $cvre->gender = $validateData['gender'];
        $cvre->birthday = $validateData['birthday'];
        //$cvre->avatar = $validateData['avatar'];
        // if ($req->hasFile('avatar')) {
        //     $image = $req->file('avatar');

        //     // Tạo tên mới để tránh trùng lặp
        //     $imageName = time() . '_' . $image->getClientOriginalName();

        //     // Lưu hình ảnh vào thư mục public/images (hoặc bạn có thể chọn thư mục khác)
        //     $image->storeAs('public/storage/user', $imageName);

        //     // Lưu tên tệp vào cơ sở dữ liệu
        //     $cvre->avatar = $imageName;
        // }
       // Lưu avatar
    if ($req->hasFile('avatar')) {
        $avatarImage = $req->file('avatar');
        $avatarImagePath = $avatarImage->store('public/user');
        $cvre->avatar = str_replace('public', '/storage', $avatarImagePath);
    }
        $cvre->email = $validateData['email'];
        $cvre->phone = $validateData['phone'];
        $cvre->academic_level = $validateData['academic_level'];
        $cvre->current_job_description = $validateData['current_job_description'];
        $cvre->current_job_skills = $validateData['current_job_skills'];
        $cvre->current_job_potision = $validateData['current_job_potision'];
        $cvre->salary = $validateData['salary'];
        $cvre->english_level = $validateData['english_level'];
        $cvre->it_level = $validateData['it_level'];

         // Lưu degree_path
    if ($req->hasFile('degree_path')) {
        $degreeImage = $req->file('degree_path');
        $degreeImagePath = $degreeImage->store('public/user');
        $cvre->degree_path = str_replace('public', '/storage', $degreeImagePath);
    }

        $cvre->user_id = $newUserId;
        //dd($cvre);
        // Lưu đối tượng Cv vào cơ sở dữ liệu
        $cvre->save();
       // dd("This should be printed.");
    } catch (\Exception $e) {
            dd($e->getMessage());
    }


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
        return redirect('/');
    }
}
