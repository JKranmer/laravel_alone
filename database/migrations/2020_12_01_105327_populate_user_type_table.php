<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulateUserTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('user_type')->updateOrInsert(['id' => '1'], ['desc' => 'Administrador','level' => '99']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('user_type')->where('id' , 1);

        // para varios
        // DB::table('user_type')->whereIn('id', ['1', '2' ...])
    }
}
