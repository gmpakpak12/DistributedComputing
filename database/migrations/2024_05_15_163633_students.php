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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 25)->unique(); // Adjust max length if needed
            $table->string('name');
            $table->string('year_section', 10); // Adjust max length if needed
            $table->string('course');
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable()->after('student_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_user_id_foreign');
            $table->dropColumn('user_id');
        });;
    }
};
