<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder {

    public function run() {
        DB::table('users')->where('role', 'admin')->delete();

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'John',
            'email' => 'admin@eshop.sk',
            'role' => 'admin',
            'password' => '$2y$10$TrcSo6W1et1pyQjlhU0V2un0b1GIwmmHVWtMTD65C6Zt0OSZjK73i' // admin
        ]);
    }
}
