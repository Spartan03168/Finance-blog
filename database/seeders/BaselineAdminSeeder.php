<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BaselineAdminSeeder extends Seeder {
    public function run(): void {
        User::create ([
            "name" => "Angel of death",
            "email" => "angel_of_death@gmail.com",
            "password" => Hash::make("angel_of_death"),
            "is_admin" => true
            ]);
        }
    }
