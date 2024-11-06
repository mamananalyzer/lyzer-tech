<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('metering', function (Blueprint $table) {
            $table->id('id_metering');
            $table->string('project', 50); // Assuming a max length of 50 characters for text fields
            $table->string('section', 50);
            $table->string('device', 50);
            $table->string('sn', 50);
            $table->enum('status', ['active', 'inactive'])->default('active'); // Use an enum if possible
            // Use smaller numeric types for numeric fields
            $table->string('Freq_Hz', 50);
            $table->string('V1', 50);
            $table->string('V2', 50);
            $table->string('V3', 50);
            $table->string('Vnavg_V', 50);
            $table->string('V12', 50);
            $table->string('V23', 50);
            $table->string('V31', 50);
            $table->string('VIavg_V', 50);
            $table->string('I1', 50);
            $table->string('I2', 50);
            $table->string('I3', 50);
            $table->string('Iavg_A', 50);
            $table->string('P1', 50);
            $table->string('P2', 50);
            $table->string('P3', 50);
            $table->string('Psum_kW', 50);
            $table->string('Q1', 50);
            $table->string('Q2', 50);
            $table->string('Q3', 50);
            $table->string('Qsum_kvar', 50);
            $table->string('S1', 50);
            $table->string('S2', 50);
            $table->string('S3', 50);
            $table->string('Ssum_kVA', 50);
            $table->string('PF1', 50);
            $table->string('PF2', 50);
            $table->string('PF3', 50);
            $table->string('PF', 50);
            $table->string('Unbl_V', 50);
            $table->string('Unbl_I', 50);
            $table->string('LCavg', 50);
            $table->string('DMD_P_kW', 50);
            $table->string('DMD_Q_kvar', 50);
            $table->string('DMD_S_kVA', 50);
            $table->string('EP_IMP_kWh', 50);
            $table->string('EP_EXP_kWh', 50);
            $table->string('EQ_IMP_kvarh', 50);
            $table->string('EQ_EXP_kvarh', 50);
            $table->string('EP_TOTAL_kWh', 50);
            $table->string('EP_NET_kWh', 50);
            $table->string('EQ_TOTAL_kvarh', 50);
            $table->string('EQ_NET_kvarh', 50);
            $table->string('ES_kVAh', 50);
            $table->string('THD_Va', 50);
            $table->string('THD_Vb', 50);
            $table->string('THD_Vc', 50);
            $table->string('THD_Vavg', 50);
            $table->string('THD_Ia', 50);
            $table->string('THD_Ib', 50);
            $table->string('THD_Ic', 50);
            $table->string('THD_Iavg', 50);
            $table->string('Ang_Vb', 50);
            $table->string('Ang_Vc', 50);
            $table->string('Ang_Ia', 50);
            $table->string('Ang_Ib', 50);
            $table->string('Ang_Ic', 50);
            $table->string('DMD_I1_A', 50);
            $table->string('DMD_I2_A', 50);
            $table->string('DMD_I3_A', 50);
            $table->string('EPa_IMP_kWh', 50);
            $table->string('EPa_EXP_kWh', 50);
            $table->string('EPb_IMP_kWh', 50);
            $table->string('EPb_EXP_kWh', 50);
            $table->string('EPc_IMP_kWh', 50);
            $table->string('EPc_EXP_kWh', 50);
            $table->string('EQa_IMP_kvarh', 50);
            $table->string('EQa_EXP_kvarh', 50);
            $table->string('EQb_IMP_kvarh', 50);
            $table->string('EQb_EXP_kvarh', 50);
            $table->string('EQc_IMP_kvarh', 50);
            $table->string('EQc_EXP_kvarh', 50);
            $table->string('ESa_kVAh', 50);
            $table->string('ESb_kVAh', 50);
            $table->string('ESc_kVAh', 50);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metering');
    }
};
