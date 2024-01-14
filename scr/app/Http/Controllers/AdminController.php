<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Job;
use App\Models\cv;
class AdminController extends Controller
{
    public function statistics()
{
    // Số lượng Nhà tuyển dụng
    $totalCompany =  Company::count();

    // Số lượng công việc được đăng tuyển
    $totalJob = Job::count();

    // Số lượng người tìm việc
    $totalJobSeekers = cv::count();

    return view('admin.statistics', compact('totalCompany', 'totalJob', 'totalJobSeekers'));
}
}
