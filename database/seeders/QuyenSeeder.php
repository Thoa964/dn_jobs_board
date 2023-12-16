<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quyen;

class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quyen = ['Admin', 'Sinh viên', 'Nhà tuyển dụng'];

        foreach ($quyen as $item) {
            Quyen::create([
                'ten_quyen' => $item
            ]);
        }
    }
}
