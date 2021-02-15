<?php

use App\Models\PI;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_i_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('precision');
            $table->longText('value');
            $table->timestamps();
        });

        PI::create(
            [
                'precision' => 1,
                'value' => '3',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_i_s');
    }
}
