<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            ['id' => 1, 'name' => 'PNC', 'address' => 'Sen Sok, Phnom Penh', 'link' => 'https://www.passerellesnumeriques.org/en/our-actions/cambodia/', 'logo' => 'school_logo.jpg'],
            ['id' => 2, 'name' => 'RUPP', 'address' => 'Toul Kork, Phnom Penh', 'link' => NULL, 'logo' => 'school_logo.jpg'],
            ['id' => 3, 'name' => 'Toul Prasat Sen Sok', 'address' => 'Sen sok, Phnom Penh', 'link' => NULL, 'logo' => 'school_logo.jpg'],
            ['id' => 4, 'name' => 'Bak Tuk', 'address' => 'Sen sok, Phnom Penh', 'link' => NULL, 'logo' => 'school_logo.jpg'],
        ];
        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
