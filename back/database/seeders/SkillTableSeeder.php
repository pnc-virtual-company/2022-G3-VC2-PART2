<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            ['id' => 1, 'name' => 'HTML'],
            ['id' => 2, 'name' => 'CSS'],
            ['id' => 3, 'name' => 'Javascript'],
            ['id' => 4, 'name' => 'Laravel'],
            ['id' => 5, 'name' => 'PHP'],
            ['id' => 6, 'name' => 'NodeJs'],
            ['id' => 7, 'name' => 'VueJs'],
        ];
        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
