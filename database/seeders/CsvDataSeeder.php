<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CsvDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFilePath = base_path('/bot-crawler/' . env('CRAWLER_OUTPUT_FILE_NAME'));
        $csvData = array_map('str_getcsv', file($csvFilePath));
        $header = array_shift($csvData);
        foreach ($csvData as $row) {
            $data = array_combine($header, $row);
            dd($data['ten_cong_ty']);


            DB::table('your_table_name')->insert($data);
        }
    }
}
