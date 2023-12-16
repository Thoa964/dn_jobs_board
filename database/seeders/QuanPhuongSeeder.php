<?php

namespace Database\Seeders;

use App\Models\Phuong;
use App\Models\Quan;
use Illuminate\Database\Seeder;

class QuanPhuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daNangDistricts = [
            "Cẩm Lệ" => [
                "Hòa An",
                "Hòa Phát",
                "Hòa Thọ Đông",
                "Hòa Thọ Tây",
                "Hòa Xuân",
                "Khuê Trung"
            ],
            "Hải Châu" => [
                "Bình Hiên",
                "Bình Thuận",
                "Hải Châu I",
                "Hải Châu II",
                "Hòa Cường Bắc",
                "Hòa Cường Nam",
                "Hòa Thuận Đông",
                "Hòa Thuận Tây",
                "Nam Dương",
                "Phước Ninh",
                "Thạch Thang",
                "Thanh Bình",
                "Thuận Phước",
            ],
            "Liên Chiểu" => [
                "Hoà Minh",
                "Hòa Khánh Nam",
                "Hoà Khánh Bắc",
                "Hoà Hiệp Nam",
                "Hòa Hiệp Bắc"
            ],
            "Ngũ Hành Sơn" => [
                "Mỹ An",
                "Khuê Mỹ",
                "Hòa Hải",
                "Hòa Quý"
            ],
            "Sơn Trà" => [
                "An Hải Đông",
                "An Hải Tây",
                "Phước Mỹ",
                "An Hải Bắc",
                "Nại Hiên Đông",
                "Mân Thái",
                "Thọ Quang"
            ],
            "Thanh Khê" => [
                "An Khê",
                "Chính Gián",
                "Hòa Khê",
                "Tam Thuận",
                "Tân Chính",
                "Thạc Gián",
                "Thanh Khê Đông",
                "Thanh Khê Tây",
                "Vĩnh Trung",
                "Xuân Hà"
            ],
            "Hòa Vang" => [
                "Hòa Tiến",
                "Hòa Châu",
                "Hòa Phước",
                "Hòa Nhơn",
                "Hòa Khương",
                "Hòa Phong",
                "Hòa Phú",
                "Hòa Ninh",
                "Hòa Liên",
                "Hòa Sơn",
                "Hòa Bắc"
            ],
        ];

        foreach ($daNangDistricts as $ten_quan => $phuong) {
            $quan = Quan::create([
                'ten_quan' => $ten_quan
            ]);

            foreach ($phuong as $ten_phuong) {
                Phuong::create([
                    'ma_quan' => $quan->id,
                    'ten_phuong' => $ten_phuong
                ]);
            }
        }
    }
}
