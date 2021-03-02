<?php

use App\Models\InvoiceTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('view');
            $table->string('path');
            $table->timestamps();
        });

        InvoiceTemplate::create([
            'name' => 'Template 1',
            'view' => 'template_1',
            'path' => '/assets/images/templates/invoice/template_1.png'
        ]);

        InvoiceTemplate::create([
            'name' => 'Template 2',
            'view' => 'template_2',
            'path' => '/assets/images/templates/invoice/template_2.png'
        ]);

        InvoiceTemplate::create([
            'name' => 'Template 3',
            'view' => 'template_3',
            'path' => '/assets/images/templates/invoice/template_3.png'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_templates');
    }
}
