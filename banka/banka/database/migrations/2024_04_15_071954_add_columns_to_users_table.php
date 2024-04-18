<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('aktivniUcet')->default(false)->after('password');
            $table->integer('penizeNaUcet')->default(0)->after('aktivniUcet');
            $table->boolean('aktivniKontokorent')->default(false)->after('penizeNaUcet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('aktivniUcet');
            $table->dropColumn('penizeNaUcet');
            $table->dropColumn('aktivniKontokorent');
        });
    }
};
