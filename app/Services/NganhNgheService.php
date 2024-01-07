<?php

namespace App\Services;

use App\Repositories\NganhNgheRepository;

class NganhNgheService
{
    private NganhNgheRepository $nganhNgheRepository;

    public function __construct(NganhNgheRepository $nganhNgheRepository)
    {
        $this->nganhNgheRepository = $nganhNgheRepository;
    }

    public function fetchAll() {
        return $this->nganhNgheRepository->fetchAll();
    }

    public function store(mixed $data)
    {
        $data['is_crawl_data'] = false;

        return $this->nganhNgheRepository->create($data);
    }
}
