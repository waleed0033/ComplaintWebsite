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
        Schema::create('complaint_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained('complaints','id');
            $table->foreignId('issuer_id')->constrained('users','id');
            $table->string('description',1024);
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
        Schema::dropIfExists('complaint_records');
    }
};
