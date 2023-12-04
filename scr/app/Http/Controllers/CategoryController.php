<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(Request $req)
    {
        $categories = Category::where('category_name', 'like', '%' . $req['q'] . '%')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('admin.category.index', [
            'title'      => 'Thể loại',
            'categories' => $categories,
            'keyword'    => $req['q'],
        ]);
    }

    public function create()
    {
        return view('admin.category.add', [
            'title' => 'Thêm thể loại',
        ]);
    }

    public function store(Request $req)
    {
        if (Category::where('category_name', $req['category_name'])->count()) {
            Alert::warning('Thể loại', 'Tên thể loại này đã dùng rồi. Vui lòng chọn tên khác');
            return redirect()->back();
        }
        Category::create($req->input());
        Alert::success('Thể loại', 'Thêm thành công');
        return redirect('/admin/category');
    }

    public function show(Category $category)
    {
        return view('admin.category.edit', [
            'title'    => 'Chỉnh sửa thể loại',
            'category' => $category,
        ]);
    }

    public function update(Category $category, Request $req)
    {
        if (Category::where('category_name', $req['category_name'])->count()) {
            Alert::warning('Thể loại', 'Tên thể loại này đã dùng rồi. Vui lòng chọn tên khác');
            return redirect()->back();
        }
        $category->update($req->input());
        Alert::success('Thể loại', 'Thêm thành công');
        return redirect('/admin/category');
    }

    public function destroy(Request $req)
    {
        Category::where('category_id', $req['id'])->delete();
        Alert::success('Thể loại', 'Xoá thành công');
        return redirect()->back();
    }
}
