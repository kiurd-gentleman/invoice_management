<?php

use App\Models\EstimateTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('view');
            $table->string('path');
            $table->timestamps();
        });

        EstimateTemplate::create([
            'name' => 'Template 1',
            'view' => 'template_1',
            'path' => '/assets/images/templates/estimate/template_1.png'
        ]);

        EstimateTemplate::create([
            'name' => 'Template 2',
            'view' => 'template_2',
            'path' => '/assets/images/templates/estimate/template_2.png'
        ]);

        EstimateTemplate::create([
            'name' => 'Template 3',
            'view' => 'template_3',
            'path' => '/assets/images/templates/estimate/template_3.png'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimate_templates');
    }
}
