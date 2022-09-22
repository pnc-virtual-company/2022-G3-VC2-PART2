<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'first_name' => 'Seng', 'last_name' => 'Som', 'email' => 'somphors.sen@passerellesnumeriques.org', 'password' => Hash::make('somphors.sen@passerellesnumeriques.org'), 'role' => 'alumni', 'profile' => 'IMG_PROFILE_avatar.png', 'cover' => 'IMG_COVER_cover.png'],
            ['id' => 2, 'first_name' => 'Kanha', 'last_name' => 'Kun', 'email' => 'kanha.kun@passerellesnumeriques.org', 'password' => Hash::make('kanha.kun@passerellesnumeriques.org'), 'role' => 'alumni', 'profile' => 'IMG_PROFILE_avatar.png', 'cover' => 'IMG_COVER_cover.png'],
            ['id' => 3, 'first_name' => 'Romdoul', 'last_name' => 'Thea', 'email' => 'romdoul.thea@passerellesnumeriques.org', 'password' =>  Hash::make('romdoul.thea@passerellesnumeriques.org'), 'role' => 'ero', 'profile' => 'IMG_PROFILE_avatar.png', 'cover' => 'IMG_COVER_cover.png'],
            ['id' => 4, 'first_name' => 'Samnang', 'last_name' => 'Sok', 'email' => 'somnang.sok@passerellesnumeriques.org', 'password' => Hash::make('somnang.sok@passerellesnumeriques.org'), 'role' => 'ero', 'profile' => 'IMG_PROFILE_avatar.png', 'cover' => 'IMG_COVER_cover.png'],
            ['id' => 5, 'first_name' => 'PNC', 'last_name' => 'Manager', 'email' => 'pnc.manager@passerellesnumeriques.org', 'password' => Hash::make('pnc.manager@passerellesnumeriques.org'), 'role' => 'admin', 'profile' => 'IMG_PROFILE_avatar.png', 'cover' => 'IMG_COVER_cover.png'],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
