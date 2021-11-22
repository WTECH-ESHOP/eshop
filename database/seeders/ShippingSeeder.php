<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder {

    public function run() {
        DB::table('shippings')->delete();

        Shipping::insert([
            ['name' => 'delivery by GLS courier', 'time' => 3, 'price' => 1.9],
            ['name' => 'delivery by SPS courier', 'time' => 2, 'price' => 2.2],
            ['name' => 'delivery to post office', 'time' => 4, 'price' => 1.5],
            ['name' => 'in-store personal pickup', 'time' => 0, 'price' => 0],
        ]);
    }
}
