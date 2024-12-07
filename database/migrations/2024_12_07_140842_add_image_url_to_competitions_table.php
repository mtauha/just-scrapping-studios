<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageUrlToCompetitionsTable extends Migration
{
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('price');
        });
    }

    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
}