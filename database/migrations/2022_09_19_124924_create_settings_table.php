<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->char('name', 100);
            $table->text('value');
            $table->char('show_name', 150);
            $table->char('input_type', 100);
            $table->char('option_list', 100);
            $table->string('group_name');
            $table->integer('sort');
            $table->enum('is_visible', ['yes', 'no']); // yes is visible ; no in hidden
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
        Schema::dropIfExists('settings');
    }
}
