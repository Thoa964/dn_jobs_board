<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BaiDangService;
use Illuminate\Http\Request;

class BaiDangController extends Controller
{
    private BaiDangService $baiDangService;

    public function __construct(BaiDangService $baiDangService)
    {
        $this->baiDangService = $baiDangService;
    }

    public function approve($maBaiDang)
    {
        $this->baiDangService->approve($maBaiDang);
        return redirect()->back()->with('success', 'Duyệt bài đăng thành công');
    }

    public function reject($maBaiDang)
    {
        $this->baiDangService->reject($maBaiDang);
        return redirect()->back()->with('success', 'Từ chối bài đăng thành công');
    }

    public function destroy($maBaiDang)
    {
        if($this->baiDangService->destroy($maBaiDang)) {
            return redirect()->back()->with('success', 'Xoá bài đăng thành công');
        }

        return redirect()->back()->with('error', 'Không thể xóa bài đăng có ứng viên');
    }

    public function restore($maBaiDang)
    {
        $this->baiDangService->restore($maBaiDang);
        return redirect()->back()->with('success', 'Khôi phục bài đăng thành công');
    }

    public function index()
    {
        $danhSachBaiDang = $this->baiDangService->getList();
        return view('admin.bai-dang.index', compact('danhSachBaiDang'));
    }

    public function request()
    {
        $danhSachBaiDang = $this->baiDangService->getListRequest();
        return view('admin.bai-dang.request', compact('danhSachBaiDang'));
    }
}
