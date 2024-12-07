<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToGeneralRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('general_requests', function (Blueprint $table) {
            $table->string('booking_type')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('general_requests', function (Blueprint $table) {
            $table->dropColumn('booking_type');
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('date');
            $table->dropColumn('time');
        });
    }
}