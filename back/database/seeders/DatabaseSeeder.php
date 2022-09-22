<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ 
            UserTableSeeder::class,
            AlumniTableSeeder::class,
            CompanyTableSeeder::class,
            SchoolTableSeeder::class,
            SkillTableSeeder::class,
            AlumniCompanyTableSeeder::class,
            AlumniSchoolTableSeeder::class,
            AlumniSkillTableSeeder::class,
        ]);
    }
}
