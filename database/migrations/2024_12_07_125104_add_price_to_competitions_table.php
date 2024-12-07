<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToCompetitionsTable extends Migration
{
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->after('name');
        });
    }

    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}