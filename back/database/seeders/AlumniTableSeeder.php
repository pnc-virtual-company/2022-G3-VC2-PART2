<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumni;

class AlumniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumnis = [
            ['id' => 1, 'user_id' => 1, 'major' => 'WEB', 'batch' => 2022, 'address' => 'Tuol Kork, Phnom Penh', 'telegram' => '097979797', 'phone' => '097979797', 'gender' => 'male', 'birth_date' => '2022-08-09'],
            ['id' => 2, 'user_id' => 2, 'major' => 'SNA', 'batch' => 2023, 'address' => 'Sen Sok, Phnom Penh', 'telegram' => '088989796', 'phone' => '088989796', 'gender' => 'male', 'birth_date' => '2022-02-23'],
        ];
        foreach ($alumnis as $alumni) {
            Alumni::create($alumni);
        }
    }
}
