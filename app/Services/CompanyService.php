<?php

namespace App\Services;

use App\Enums\Common;
use App\Mail\CompanyApproved;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CompanyService
{
    protected CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getUnverifiedCompanies()
    {
        return $this->companyRepository->getUnverifiedCompanies();
    }

    public function approveRequest($taiKhoan): void
    {
        $company = $this->companyRepository->findByTaiKhoan($taiKhoan);
        Mail::to($company->email)->send(new CompanyApproved($company->ten_cong_ty));
        $this->companyRepository->approveRequest($taiKhoan);
    }

    public function getCompanies()
    {
        return $this->companyRepository->getCompanies();
    }

    public function getCompany($id)
    {
        return $this->companyRepository->findById($id);
    }
}
