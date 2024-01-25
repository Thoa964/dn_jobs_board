<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;

class CompanyController extends Controller
{
    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function registerRequest()
    {
        $users = $this->companyService->getUnverifiedCompanies();
        return view('admin.company.register', compact('users'));
    }

    public function approveRequest($taiKhoan)
    {
        $this->companyService->approveRequest($taiKhoan);
        return redirect()->back()->with('success', 'Duyệt đăng ký thành công');
    }

    public function index()
    {
        $users = $this->companyService->getCompanies();
        return view('admin.company.index', compact('users'));
    }

    public function show($id)
    {
        $company = $this->companyService->getCompany($id);
        return view('company.show', compact('company'));
    }
}
