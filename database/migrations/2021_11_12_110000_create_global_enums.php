<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGlobalEnums extends Migration {

    public function up() {
        DB::statement("CREATE TYPE PAYMENT_E AS ENUM ('ONLINE', 'BANK_TRANSFER', 'GOOGLE_PAY', 'CASH_ON_DELIVERY')");
        DB::statement("CREATE TYPE FLAVOUR_E AS ENUM ('CHOCOLATE', 'VANILLA', 'STRAWBERRY')");
        DB::statement("CREATE TYPE BRAND_E AS ENUM ('AMIX', 'BIOTECH_USA', 'BEST_NUTRITION', 'MUTANT')");
    }

    public function down() {
        DB::statement('DROP TYPE IF EXISTS PAYMENT_E');
        DB::statement('DROP TYPE IF EXISTS FLAVOUR_E');
        DB::statement('DROP TYPE IF EXISTS BRAND_E');
    }
}
