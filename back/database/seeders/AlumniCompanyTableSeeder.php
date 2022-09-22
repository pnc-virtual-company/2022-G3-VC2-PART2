<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlumniCompany;

class AlumniCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumniCompanies = [
            ['id' => 1, 'user_id' => 1, 'company_id' => 1, 'is_working' => TRUE, 'start_date' => '2022-09-20', 'end_date' => NULL, 'position' => 'WEB Developer'],
            ['id' => 2, 'user_id' => 1, 'company_id' => 2, 'is_working' => FALSE, 'start_date' => '2018-11-14', 'end_date' => '2019-10-21', 'position' => 'Junior Developer'],
            ['id' => 3, 'user_id' => 1, 'company_id' => 3, 'is_working' => FALSE, 'start_date' => '2019-12-23', 'end_date' => '2020-11-21', 'position' => 'Developer'],
            ['id' => 4, 'user_id' => 1, 'company_id' => 4, 'is_working' => FALSE, 'start_date' => '2020-06-16', 'end_date' => '2021-07-21', 'position' => 'Back-end Developer'],
            ['id' => 5, 'user_id' => 1, 'company_id' => 5, 'is_working' => FALSE, 'start_date' => '2021-02-10', 'end_date' => '2022-01-21', 'position' => 'Senior Developer'],
            ['id' => 6, 'user_id' => 2, 'company_id' => 1, 'is_working' => FALSE, 'start_date' => '2002-01-20', 'end_date' => '2003-09-23', 'position' => 'WEB Developer'],
            ['id' => 7, 'user_id' => 2, 'company_id' => 2, 'is_working' => FALSE, 'start_date' => '2018-11-19', 'end_date' => '2019-11-21', 'position' => 'API Developer'],
            ['id' => 8, 'user_id' => 2, 'company_id' => 3, 'is_working' => FALSE, 'start_date' => '2019-08-12', 'end_date' => '2020-12-21', 'position' => 'Front-end Developer'],
            ['id' => 9, 'user_id' => 2, 'company_id' => 4, 'is_working' => FALSE, 'start_date' => '2020-03-10', 'end_date' => '2021-06-21', 'position' => 'Junior Developer'],
            ['id' => 10, 'user_id' => 2, 'company_id' => 5, 'is_working' => TRUE, 'start_date' => '2022-01-16', 'end_date' => NULL, 'position' => 'Senior Developer'],
        ];
        foreach ($alumniCompanies as $alumniCompany) {
            AlumniCompany::create($alumniCompany);
        }
    }
}
