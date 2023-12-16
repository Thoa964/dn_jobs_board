<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'ten' => 'Quản trị viên',
            'tai_khoan' => 'admin',
            'mat_khau' => bcrypt('thoa2503'),
            'ma_quyen' => '1',
            'trang_thai' => true
        ]);
    }
}
