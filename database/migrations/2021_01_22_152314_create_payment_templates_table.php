<?php

use App\Models\PaymentTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('view');
            $table->string('path');
            $table->timestamps();
        });

        PaymentTemplate::create([
            'name' => 'Template 1',
            'view' => 'template_1',
            'path' => '/assets/images/templates/payment/template_1.png'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_templates');
    }
}
