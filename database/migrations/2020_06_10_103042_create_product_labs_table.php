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
            $table->string('product_lab_name', 255);//4.1
            $table->integer('product_type_id');//4.2
            $table->string('product_lab_standard', 255);//4.3
            $table->string('product_lab_test_name', 255);//4.4
            $table->string('product_lab_test_process', 255);//4.5 no table now
            $table->integer('testing_calibrating_type_id');//4.6
            $table->string('product_lab_test_method', 255);//4.7
            $table->string('product_lab_test_method_detail', 255);//4.7.1
            $table->string('product_lab_test_unit', 255);//4.8
            $table->integer('product_lab_test_duration');//4.9
            $table->integer('product_lab_test_fee');//4.10
            $table->string('product_lab_material_ref', 255);//4.11
            $table->string('product_lab_material_ref_from', 255);//4.12
            $table->string('product_lab_test_control', 255);//4.13 no table now
            $table->string('proficiency_testing', 255);//4.14.1
            $table->string('proficiency_testing_by', 255);//4.14.2
            $table->string('proficiency_testing_year', 255);//4.14.3
            $table->integer('certify_laboratory_id');//4.15
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
