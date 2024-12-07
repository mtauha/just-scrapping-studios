<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDurationToGeneralRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('general_requests', function (Blueprint $table) {
            $table->integer('duration')->nullable();
        });
    }

    public function down()
    {
        Schema::table('general_requests', function (Blueprint $table) {
            $table->dropColumn('duration');
        });
    }
}