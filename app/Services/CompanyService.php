<?php

namespace App\Services;

use App\Enums\Common;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $this->companyRepository->approveRequest($taiKhoan);
    }

    public function getCompanies()
    {
        return $this->companyRepository->getCompanies();
    }
}
