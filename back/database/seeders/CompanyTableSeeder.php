<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            ['id' => 1, 'name' => 'Z1 Flexible Solution', 'address' => 'Boeng Kork, Phnom Penh', 'link' => 'https://z1flexiblesolution.com/', 'logo' => 'company_logo.jpg'],
            ['id' => 2, 'name' => 'Renet HR', 'address' => 'Sen Sok, Phnom Penh', 'link' => NULL, 'logo' => 'company_logo.jpg'],
            ['id' => 3, 'name' => 'Ecam Solution', 'address' => 'Boeng Kork, Phnom Penh', 'link' => NULL, 'logo' => 'company_logo.jpg'],
            ['id' => 4, 'name' => 'Proseth Solution', 'address' => 'Boeng Kork, Phnom Penh', 'link' => NULL, 'logo' => 'company_logo.jpg'],
            ['id' => 5, 'name' => 'CamSolution', 'address' => 'Boeng Kork, Phnom Penh', 'link' => NULL, 'logo' => 'company_logo.jpg'],
        ];
        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
