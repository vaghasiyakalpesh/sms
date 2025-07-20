<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('class_id')->nullable()->constrained()->onDelete('cascade')->after('email_verified_at');
            $table->foreignId('academic_year_id')->nullable()->constrained()->onDelete('cascade')->after('class_id');
            $table->string('mobile_no')->nullable()->after('academic_year_id');
            $table->date('dob')->nullable()->after('mobile_no');
            $table->date('admission_date')->nullable()->after('dob');
            $table->string('address')->nullable()->after('admission_date');
            $table->string('father_name')->nullable()->after('address');
            $table->string('mother_name')->nullable()->after('father_name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['academic_year_id']);

            $table->dropColumn([
                'class_id',
                'academic_year_id',
                'mobile_no',
                'dob',
                'admission_date',
                'address',
                'father_name',
                'mother_name',
            ]);
        });
    }
};
