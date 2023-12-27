<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(Request $req)
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        $companies = Company::orderBy('updated_at', 'desc')->get();
        $jobs = Job::where('active', true)->orderBy('updated_at', 'desc')->get();

        return view('home.index', [
            'title'      => 'Trang chủ',
            'categories' => $categories,
            'companies'  => $companies,
            'jobs'       => $jobs,
        ]);
    }

    public function findJob(Request $req)
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        $jobs = Job::where('active', true)
            ->when($req['name'] !== null, function ($q) use ($req) {
                $q->where('job_name', 'like', '%' . $req['name'] . '%');
            })
            ->when($req['category'] !== null, function ($q) use ($req) {
                $q->where('category_id', $req['cat']);
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('home.search', [
            'title'      => 'Tìm việc',
            'categories' => $categories,
            'jobs'       => $jobs,
            'key'        => [
                'name'     => $req['name'],
                'cat'      => $req['cat'],
            ],
        ]);
    }

    public function contact()
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('home.contact', [
            'title'      => 'Liên hệ',
            'categories' => $categories,
        ]);
    }

    public function recruitment(Job $job, Request $req)
    {
        $model = Recruitment::firstOrCreate(['job_id' => $job->job_id, 'user_id' => Auth::user()->user_id], [
            'job_id'  => $job->job_id,
            'user_id' => Auth::user()->user_id,
        ]);
        Alert::success('Thông báo', 'Cảm ơn bạn đã ứng tuyển công việc này');
        return redirect()->back();
    }

    public function detail(Job $job)
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();

        return view('home.detail', [
            'title'      => 'Công việc: ' . $job->job_name,
            'categories' => $categories,
            'job'        => $job,
        ]);
    }
}