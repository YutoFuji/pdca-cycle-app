<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_d_c_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('pdca_elem');
            $table->text('content');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('goal_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('p_d_c_a_s');
    }
};
