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
            $table->integer('kontokorent_limit')->default(0)->after('password');
            $table->boolean('aktivni_kontokorent')->default(false)->after('kontokorent_limit');
            $table->integer('sporitelsky_uver')->default(0)->after('aktivni_kontokorent');
            $table->integer('dohromady')->default(0)->after('sporitelsky_uver');
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
            $table->dropColumn('kontokorent_limit');
            $table->dropColumn('aktivni_kontokorent');
            $table->dropColumn('sporitelsky_uver');
            $table->dropColumn('dohromady');
        });
    }
};
