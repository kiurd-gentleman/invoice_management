<?php

use App\Models\SystemSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class UpdateSystemVersion135 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Call composer dump-autoload
        Artisan::call('dump:autoload');

        SystemSetting::setSetting('version', '1.0.35');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        SystemSetting::setSetting('version', '1.0.34');
    }
}
