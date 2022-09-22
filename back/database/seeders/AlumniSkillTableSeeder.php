<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlumniSkill;

class AlumniSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumniSkills = [
            ['id' => 1, 'user_id' => 1, 'skill_id' => 1],
            ['id' => 2, 'user_id' => 1, 'skill_id' => 2],
            ['id' => 3, 'user_id' => 1, 'skill_id' => 3],
            ['id' => 4, 'user_id' => 1, 'skill_id' => 4],
            ['id' => 5, 'user_id' => 2, 'skill_id' => 1],
            ['id' => 6, 'user_id' => 2, 'skill_id' => 2],
        ];
        foreach ($alumniSkills as $alumniSkill) {
            AlumniSkill::create($alumniSkill);
        }
    }
}
