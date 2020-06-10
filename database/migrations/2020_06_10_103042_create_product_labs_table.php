<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_lab_name', 255);
            $table->integer('product_type_id');
            $table->string('product_lab_standard', 255);
            $table->string('product_lab_test_name', 255);
            $table->string('product_lab_test_process', 255);
            $table->string('product_lab_test', 255);
            $table->string('product_lab_test_method', 255);
            $table->string('product_lab_test_method_detail', 255);
            $table->string('product_lab_test_unit', 255);
            $table->integer('product_lab_test_duration');
            $table->integer('product_lab_test_fee');
            $table->string('product_lab_material_ref', 255);
            $table->string('product_lab_material_ref_from', 255);
            $table->string('product_lab_test_control', 255);
            $table->string('proficiency_testing', 255);
            $table->string('proficiency_testing_by', 255);
            $table->string('proficiency_testing_year', 255);
            $table->string('product_lab_certify', 255);
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
        Schema::dropIfExists('product_labs');
    }
}
