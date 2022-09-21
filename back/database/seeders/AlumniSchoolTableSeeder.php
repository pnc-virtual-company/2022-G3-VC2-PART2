<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlumniSchool;

class AlumniSchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumniSchools = [
            ['id' => 1, 'user_id' => 1, 'school_id' => 1, 'is_studying' => TRUE, 'start_date' => '2022-01-20', 'end_date' => NULL, 'major' => 'WEB', 'degree' => 'Master Degree'],
            ['id' => 2, 'user_id' => 1, 'school_id' => 2, 'is_studying' => FALSE, 'start_date' => '2018-11-14', 'end_date' => '2021-11-21', 'major' => 'Engineer', 'degree' => 'Associate Degree'],
            ['id' => 3, 'user_id' => 1, 'school_id' => 3, 'is_studying' => FALSE, 'start_date' => '2018-11-14', 'end_date' => '2021-11-21', 'major' => 'Engineer', 'degree' => 'Doctor Degree'],
            ['id' => 4, 'user_id' => 1, 'school_id' => 4, 'is_studying' => FALSE, 'start_date' => '2018-11-14', 'end_date' => '2021-11-21', 'major' => 'Engineer', 'degree' => 'Bachelor Degree'],
            ['id' => 5, 'user_id' => 2, 'school_id' => 1, 'is_studying' => TRUE, 'start_date' => '2022-01-20', 'end_date' => NULL, 'major' => 'WEB', 'degree' => 'Master Degree'],
            ['id' => 6, 'user_id' => 2, 'school_id' => 2, 'is_studying' => FALSE, 'start_date' => '2018-11-14', 'end_date' => '2021-11-21', 'major' => 'Engineer', 'degree' => 'Associate Degree'],
            ['id' => 7, 'user_id' => 2, 'school_id' => 3, 'is_studying' => FALSE, 'start_date' => '2018-11-14', 'end_date' => '2021-11-21', 'major' => 'Engineer', 'degree' => 'Doctor Degree'],
            ['id' => 8, 'user_id' => 2, 'school_id' => 4, 'is_studying' => FALSE, 'start_date' => '2018-11-14', 'end_date' => '2021-11-21', 'major' => 'Engineer', 'degree' => 'Bachelor Degree'],
        ];
        foreach ($alumniSchools as $alumniSchool) {
            AlumniSchool::create($alumniSchool);
        }
    }
}
