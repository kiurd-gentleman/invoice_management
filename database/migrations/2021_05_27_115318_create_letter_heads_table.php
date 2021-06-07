<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLetterHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_heads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid')->unique();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->date('letter_head_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('letter_head_number')->nullable();
            $table->string('reference_number')->nullable();
            $table->longText('header_image')->nullable();
            $table->longText('text')->nullable();
            $table->longText('footer_image')->nullable();
            $table->string('status')->nullable();
            $table->boolean('sent')->default(false);
            $table->boolean('viewed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_heads');
    }
}
