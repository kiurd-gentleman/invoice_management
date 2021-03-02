<?php

use App\Models\Currency;
use Illuminate\Database\Migrations\Migration;

class FixCurrencyIssues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Currency::where('code', 'CZK')->update(['thousand_separator' => '.']);
        Currency::where('code', 'AWG')->update(['thousand_separator' => ',']);
        Currency::where('code', 'BGN')->update(['thousand_separator' => ',']);
        Currency::where('code', 'CHF')->update(['thousand_separator' => ',']);
        Currency::where('code', 'PLN')->update(['thousand_separator' => '.']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
