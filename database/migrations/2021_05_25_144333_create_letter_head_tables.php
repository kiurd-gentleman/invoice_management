<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterHead extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('letter_head', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid')->unique();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->date('letter_head_date');
            $table->date('due_date');
            $table->string('letter_head_number');
            $table->string('reference_number')->nullable();
            $table->longText('header_image')->nullable();
            $table->longText('text')->nullable();
            $table->longText('footer_image')->nullable();
            $table->string('status');
            $table->boolean('sent')->default(false);
            $table->boolean('viewed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::connection(config('activitylog.database_connection'))->dropIfExists(config('activitylog.table_name'));
    }
}
