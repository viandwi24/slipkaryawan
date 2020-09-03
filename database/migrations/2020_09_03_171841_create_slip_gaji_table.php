<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slip_gaji', function (Blueprint $table) {
            $table->id();
            
            // general
            $table->string('nama', 255);
            $table->string('bagian', 255);
            $table->string('outsourcing', 255);

            // hari
            $table->integer('hari_gaji_pokok');
            $table->integer('hari_diliburkan');
            $table->integer('hari_borongan');
            $table->integer('hari_gp7');

            // lembur
            $table->integer('lembur_1');
            $table->integer('lembur_2');
            $table->integer('lembur_3');

            // total
            $table->decimal('sub_kerja');
            $table->decimal('sub_lembur');
            $table->decimal('bpjs');
            $table->decimal('total');

            // lain
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
        Schema::dropIfExists('slip_gaji');
    }
}
