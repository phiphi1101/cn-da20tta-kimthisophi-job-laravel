<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
{
    public function index(Request $req)
    {
        $jobs = Job::where('job_name', 'like', '%' . $req['q'] . '%')
            ->when(Auth::user()->role == 'employer', function ($q) {
                $q->where('user_id', Auth::user()->user_id);
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('admin.job.index', [
            'title'   => 'Công việc',
            'jobs'    => $jobs,
            'keyword' => $req['q'],
        ]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.job.add', [
            'title'      => 'Thêm công việc',
            'categories' => $categories,
        ]);
    }

    public function store(Request $req)
    {
        foreach ($req['gender'] as $g) {
            if ($g == 'Nam') {
                $req['is_male'] = true;
            }
            if ($g == 'Nữ') {
                $req['is_female'] = true;
            }
        }

        $req['user_id'] = Auth::user()->user_id;
        $job = Job::create($req->input());
        $job->categories()->attach($req['categories']);
        Alert::success('Công việc', 'Thêm thành công');
        return redirect('/admin/job');
    }

    public function view(Job $job)
    {
        return view('admin.job.view', [
            'title' => 'Chi tiết công việc',
            'job'   => $job,
        ]);
    }

    public function show(Job $job)
    {
        $categories = Category::get();
        return view('admin.job.edit', [
            'title'      => 'Chỉnh sửa công việc',
            'categories' => $categories,
            'job'        => $job,
        ]);
    }

    public function update(Job $job, Request $req)
    {
        foreach ($req['gender'] as $g) {
            if ($g == 'Nam') {
                $req['is_male'] = true;
            }
            if ($g == 'Nữ') {
                $req['is_female'] = true;
            }
        }

        $req['active'] = false;
        $req['user_id'] = Auth::user()->user_id;
        $job->update($req->input());
        $job->categories()->sync($req['categories']);
        Alert::success('Công việc', 'Chỉnh sửa thành công');
        return redirect('/admin/job');
    }

    public function accept(Job $job)
    {
        $job->active = true;
        $job->save();
        Alert::success('Công việc', 'Đã duyệt ' . $job->job_name . ' thành công');
        return redirect('/admin/job');
    }

    public function destroy(Request $req)
    {
        Job::where('job_id', $req['id'])->delete();
        Alert::success('Công việc', 'Xoá thành công');
        return redirect()->back();
    }

    public function recruitment(Job $job)
    {
        return view('admin.job.recruitment', [
            'title' => 'Ứng viên: ' . $job->job_name,
            'job'   => $job,
        ]);
    }
}
