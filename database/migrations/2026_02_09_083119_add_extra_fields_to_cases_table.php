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
        Schema::table('cases', function (Blueprint $table) {
            $table->string('p1_urdu')->nullable();
            $table->string('p2_urdu')->nullable();
            $table->string('district')->nullable();
            $table->string('tehsil')->nullable();
            $table->string('direction_from')->nullable();
            $table->boolean('is_juvenile')->default(false);
            $table->boolean('is_overseas')->default(false);
            $table->boolean('is_women_petitioner')->default(false);
            $table->boolean('is_women_respondent')->default(false);
            $table->decimal('suit_valuation', 15, 2)->nullable();
            $table->string('civil_jurisdiction')->nullable();
            $table->string('case_status')->default('Pending');
            $table->date('next_date')->nullable();
            $table->string('case_stage')->nullable();
            $table->string('adjournment_reason')->nullable();
            $table->text('short_order')->nullable();
            $table->text('cp_remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn([
                'p1_urdu',
                'p2_urdu',
                'district',
                'tehsil',
                'direction_from',
                'is_juvenile',
                'is_overseas',
                'is_women_petitioner',
                'is_women_respondent',
                'suit_valuation',
                'civil_jurisdiction',
                'case_status',
                'next_date',
                'case_stage',
                'adjournment_reason',
                'short_order',
                'cp_remarks'
            ]);
        });
    }
};
