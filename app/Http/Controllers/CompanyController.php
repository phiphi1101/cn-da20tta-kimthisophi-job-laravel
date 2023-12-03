<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    public function index(Request $req)
    {
        $companies = Company::where('company_name', 'like', '%' . $req['q'] . '%')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('admin.company.index', [
            'title'     => 'Công ty',
            'companies' => $companies,
            'keyword'   => $req['q'],
        ]);
    }

    public function create()
    {
        return view('admin.company.add', [
            'title' => 'Thêm công ty',
        ]);
    }

    public function store(Request $req)
    {
        if (Company::where('company_name', $req['company_name'])->count()) {
            Alert::warning('Công ty', 'Tên công ty này đã dùng rồi. Vui lòng chọn tên khác');
            return redirect()->back();
        }

        // Add image
        if ($req->file('logo')) {
            $req['logo'] = str_replace('public', '/storage', $req->file('logo')->store('public/company'));
        }

        Company::create($req->input());
        Alert::success('Công ty', 'Thêm thành công');
        return redirect('/admin/company');
    }

    public function show(Company $company)
    {
        return view('admin.company.edit', [
            'title'   => 'Chỉnh sửa công ty',
            'company' => $company,
        ]);
    }

    public function update(Company $company, Request $req)
    {
        // Add image
        if ($req->file('logo')) {
            $req['logo'] = str_replace('public', '/storage', $req->file('logo')->store('public/company'));
        }

        $company->update($req->input());
        Alert::success('Công ty', 'Chỉnh sửa thành công');
        return redirect('/admin/company');
    }

    public function destroy(Request $req)
    {
        Company::where('company_id', $req['id'])->delete();
        Alert::success('Công ty', 'Xoá thành công');
        return redirect()->back();
    }
}
