<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateQueryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_query', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('query_category_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'query_category_id']);
            $table->foreign('query_category_id')->references('id')->on('tbl_query_category')->onUpdate('cascade')->onDelete('cascade');
        });

        //Add default data
        DB::table('tbl_query')->insert(
            [
                [
                    "name" => "startedOnART",
                    "description" => "select sub.patient_id 
                                        from ( 
                                        select e.patient_id,e.date_started, 
                                        e.gender,
                                        e.dob,
                                        d.visit_date as dis_date, 
                                        if(d.visit_date is not null, 1, 0) as TOut,
                                        e.regimen, e.regimen_line, e.alternative_regimen, 
                                        mid(max(concat(fup.visit_date,fup.next_appointment_date)),11) as latest_tca, 
                                        max(if(enr.date_started_art_at_transferring_facility is not null and enr.facility_transferred_from is not null, 1, 0)) as TI_on_art,
                                        max(if(enr.transfer_in_date is not null, 1, 0)) as TIn, 
                                        max(fup.visit_date) as latest_vis_date
                                        from (select e.patient_id,p.dob,p.Gender,min(e.date_started) as date_started, 
                                        mid(min(concat(e.date_started,e.regimen_name)),11) as regimen, 
                                        mid(min(concat(e.date_started,e.regimen_line)),11) as regimen_line, 
                                        max(if(discontinued,1,0))as alternative_regimen 
                                        from etl_drug_event e 
                                        join etl_patient_demographics p on p.patient_id=e.patient_id 
                                        where e.program='HIV' 
                                        group by e.patient_id) e 
                                        left outer join etl_patient_program_discontinuation d on d.patient_id=e.patient_id and d.program_uuid='2bdada65-4c72-4a48-8730-859890e25cee'
                                        left outer join etl_hiv_enrollment enr on enr.patient_id=e.patient_id 
                                        left outer join etl_patient_hiv_followup fup on fup.patient_id=e.patient_id 
                                        where  date(e.date_started) between date_sub(:to , interval 90 DAY) and :to 
                                        group by e.patient_id 
                                        having TI_on_art=0
                                        )sub;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "startedOnARTAndPregnant",
                    "description" => "select sub.patient_id 
                                        from ( 
                                        select e.patient_id,e.date_started, 
                                        e.gender,
                                        e.dob,
                                        d.visit_date as dis_date, 
                                        if(d.visit_date is not null, 1, 0) as TOut,
                                        e.regimen, e.regimen_line, e.alternative_regimen, 
                                        fup.visit_date, fup.pregnancy_status,
                                        mid(max(concat(fup.visit_date,fup.next_appointment_date)),11) as latest_tca, 
                                        max(if(enr.date_started_art_at_transferring_facility is not null and enr.facility_transferred_from is not null, 1, 0)) as TI_on_art,
                                        max(if(enr.transfer_in_date is not null, 1, 0)) as TIn, 
                                        max(fup.visit_date) as latest_vis_date
                                        from (select e.patient_id,p.dob,p.Gender,min(e.date_started) as date_started, 
                                        mid(min(concat(e.date_started,e.regimen_name)),11) as regimen, 
                                        mid(min(concat(e.date_started,e.regimen_line)),11) as regimen_line, 
                                        max(if(discontinued,1,0))as alternative_regimen 
                                        from etl_drug_event e 
                                        join etl_patient_demographics p on p.patient_id=e.patient_id 
                                        where e.program='HIV'
                                        group by e.patient_id) e 
                                        left outer join etl_patient_program_discontinuation d on d.patient_id=e.patient_id and d.program_uuid='2bdada65-4c72-4a48-8730-859890e25cee' 
                                        left outer join etl_hiv_enrollment enr on enr.patient_id=e.patient_id 
                                        left outer join etl_patient_hiv_followup fup on fup.patient_id=e.patient_id 
                                        where  date(e.date_started) between date_sub(date(:to) , interval 90 DAY) and date(:to) 
                                        and fup.pregnancy_status =1065 and fup.visit_date between date_sub(date(:to) , interval 90 DAY) and date(:to)
                                        group by e.patient_id 
                                        having TI_on_art=0
                                        )sub;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "startedOnARTAndTBCoinfected",
                    "description" => "select sub.patient_id 
                                    from ( 
                                    select e.patient_id,e.date_started, 
                                    e.gender,
                                    e.dob,
                                    d.visit_date as dis_date, 
                                    if(d.visit_date is not null, 1, 0) as TOut,
                                    e.regimen, e.regimen_line, e.alternative_regimen, 
                                    fup.visit_date, fup.tb_status,
                                    mid(max(concat(fup.visit_date,fup.next_appointment_date)),11) as latest_tca, 
                                    max(if(enr.date_started_art_at_transferring_facility is not null and enr.facility_transferred_from is not null, 1, 0)) as TI_on_art,
                                    max(if(enr.transfer_in_date is not null, 1, 0)) as TIn, 
                                    max(fup.visit_date) as latest_vis_date
                                    from (select e.patient_id,p.dob,p.Gender,min(e.date_started) as date_started, 
                                    mid(min(concat(e.date_started,e.regimen_name)),11) as regimen, 
                                    mid(min(concat(e.date_started,e.regimen_line)),11) as regimen_line, 
                                    max(if(discontinued,1,0))as alternative_regimen 
                                    from etl_drug_event e 
                                    join etl_patient_demographics p on p.patient_id=e.patient_id 
                                    where e.program='HIV'  
                                    group by e.patient_id) e 
                                    left outer join etl_patient_program_discontinuation d on d.patient_id=e.patient_id and d.program_uuid='2bdada65-4c72-4a48-8730-859890e25cee'
                                    left outer join etl_hiv_enrollment enr on enr.patient_id=e.patient_id 
                                    left outer join etl_patient_hiv_followup fup on fup.patient_id=e.patient_id 
                                    left outer join etl_tb_enrollment tbenr on tbenr.patient_id = e.patient_id
                                    where  date(e.date_started) between date_sub(date(:to) , interval 90 DAY) and date(:to) 
                                    and ((fup.pregnancy_status =1662 and fup.visit_date between date_sub(date(:to) , interval 90 DAY) and date(:to)) or 
                                    tbenr.visit_date between date_sub(date(:to) , interval 90 DAY) and date(:to) )
                                    group by e.patient_id 
                                    having TI_on_art=0
                                    )sub;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "currentlyOnArt",
                    "description" => "select e.patient_id
                                    from (
                                    select fup.visit_date,fup.patient_id, min(e.visit_date) as enroll_date,
                                        max(fup.visit_date) as latest_vis_date,
                                        mid(max(concat(fup.visit_date,fup.next_appointment_date)),11) as latest_tca,
                                        max(d.visit_date) as date_discontinued,
                                        d.patient_id as disc_patient,
                                    de.patient_id as started_on_drugs
                                    from etl_patient_hiv_followup fup
                                    join etl_patient_demographics p on p.patient_id=fup.patient_id
                                    join etl_hiv_enrollment e on fup.patient_id=e.patient_id
                                    left outer join etl_drug_event de on e.patient_id = de.patient_id and date(date_started) <= date(:to)
                                    left outer JOIN
                                    (select patient_id, visit_date from etl_patient_program_discontinuation
                                    where date(visit_date) <= date(:to) and program_name='HIV'
                                    group by patient_id
                                    ) d on d.patient_id = fup.patient_id
                                    where fup.visit_date <= date(:to)
                                    group by patient_id
                                    having (started_on_drugs is not null and started_on_drugs <> '') and (
                                    (date(latest_tca) > date(:to) and (date(latest_tca) > date(date_discontinued) or disc_patient is null )) or
                                    (((date(latest_tca) between date_sub(date(:to) , interval 90 DAY) and date(:to)) and (date(latest_vis_date) >= date(latest_tca))) ) and (date(latest_tca) > date(date_discontinued) or disc_patient is null ))
                                    ) e;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "art12MonthCohort",
                    "description" => "select sub.patient_id  
                                        from (  
                                        select e.patient_id,e.date_started, e.gender,e.dob,d.visit_date as dis_date, if(d.visit_date is not null, 1, 0) as TOut, 
                                        e.regimen, e.regimen_line, e.alternative_regimen, mid(max(concat(fup.visit_date,fup.next_appointment_date)),11) as latest_tca, 
                                        if(enr.transfer_in_date is not null, 1, 0) as TIn, max(fup.visit_date) as latest_vis_date 
                                        from (select e.patient_id,p.dob,p.Gender,min(e.date_started) as date_started,  
                                        mid(min(concat(e.date_started,e.regimen_name)),11) as regimen,  
                                        mid(min(concat(e.date_started,e.regimen_line)),11) as regimen_line,  
                                        max(if(discontinued,1,0))as alternative_regimen  
                                        from etl_drug_event e  
                                        join etl_patient_demographics p on p.patient_id=e.patient_id  
                                        where e.program='HIV'  
                                        group by e.patient_id) e  
                                        left outer join etl_patient_program_discontinuation d on d.patient_id=e.patient_id and d.program_uuid='2bdada65-4c72-4a48-8730-859890e25cee'  
                                        left outer join etl_hiv_enrollment enr on enr.patient_id=e.patient_id  
                                        left outer join etl_patient_hiv_followup fup on fup.patient_id=e.patient_id  
                                        where  date(e.date_started) between date_sub(:from , interval 365 DAY) and date_sub(:to , interval 365 DAY)  
                                        group by e.patient_id  
                                        )sub;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "onTherapyAt12Months",
                    "description" => "select sub.patient_id  
                                        from ( 
                                        select e.patient_id,e.date_started, p.gender,p.dob,d.visit_date as dis_date, if(d.visit_date is not null, 1, 0) as TOut, 
                                        if(enr.transfer_in_date is not null, 1, 0) as TIn, max(fup.visit_date) as latest_vis_date, max(fup.next_appointment_date) as latest_tca 
                                        from etl_drug_event e  
                                        join etl_patient_demographics p on p.patient_id=e.patient_id  
                                        left outer join etl_patient_program_discontinuation d on d.patient_id=e.patient_id and d.program_uuid='2bdada65-4c72-4a48-8730-859890e25cee'  
                                        left outer join etl_hiv_enrollment enr on enr.patient_id=e.patient_id  
                                        left outer join etl_patient_hiv_followup fup on fup.patient_id=e.patient_id  
                                        where e.program='HIV' and  date(e.date_started) between date_sub(:from , interval 365 DAY) and date_sub(:to , interval 365 DAY)  
                                        group by e.patient_id  
                                        having   (dis_date>:to or dis_date is null) and (datediff(latest_tca,:to)<=90))sub;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "viralLoadResultsInLast12Months",
                    "description" => "select patient_id 
                                        from etl_laboratory_extract 
                                        where (visit_date BETWEEN date_sub(:to , interval 365 DAY) and :to) 
                                        and (lab_test in (856, 1305));",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "viralSuppressionInLast12Months",
                    "description" => "select patient_id 
                                        from etl_laboratory_extract 
                                        where (visit_date BETWEEN date_sub(:to , interval 365 DAY) and :to) 
                                        and ((lab_test=856 and test_result < 1000) or (lab_test=1305 and test_result=1302));",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "startingARTPregnant",
                    "description" => "select fup.patient_id  
                                        from etl_patient_hiv_followup fup  
                                        join (select patient_id from etl_drug_event e  
                                        where e.program='HIV' and date_started between date(:from) and date(:to)) started_art on   
                                        started_art.patient_id = fup.patient_id  
                                        where fup.pregnancy_status =1065  
                                        and fup.visit_date between date(:from) and date(:to);",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "startingARTWhileTbPatient",
                    "description" => "select fup.patient_id 
                                        from etl_patient_hiv_followup fup 
                                        join (select patient_id from etl_drug_event e 
                                        where e.program='HIV' and date_started between date(:from) and date(:to)) started_art on  
                                        started_art.patient_id = fup.patient_id 
                                        join etl_tb_enrollment tb on tb.patient_id=fup.patient_id
                                        where fup.visit_date between date(:from) and date(:to);",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "patientHIVPositiveResultsAtANC",
                    "description" => "select v.patient_id 
                                        from etl_mch_antenatal_visit v 
                                        where v.final_test_result ='Positive';",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "patientHIVNegativeResultsATANC",
                    "description" => "select v.patient_id
                                        from etl_mch_antenatal_visit v 
                                        where v.final_test_result ='Negative';",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "knownStatusAtANC",
                    "description" => "select distinct e.patient_id
                                        from etl_mch_enrollment e
                                            left join etl_mch_antenatal_visit v on e.patient_id = v.patient_id
                                        where (e.hiv_status = 703 or e.hiv_status =664)
                                        or (v.anc_visit_number = 1 and v.final_test_result in ('Negative','Positive'));",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "knownHIVPositive",
                    "description" => "select e.patient_id
                                        from etl_mch_enrollment e 
                                        where e.hiv_status = 703;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "newANCClients",
                    "description" => "select distinct v.patient_id
                                        from etl_mch_antenatal_visit v 
                                        where v.anc_visit_number =1;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "infantVirologyNegativeResults",
                    "description" => "select distinct hv.patient_id 
                                        from etl_hei_follow_up_visit hv
                                        inner join etl_patient_demographics de on de.patient_id = hv.patient_id and hv.dna_pcr_sample_date is not null and hv.dna_pcr_result=664 and timestampdiff(month,de.DOB,:to);",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "infantVirologyNoResults",
                    "description" => "select distinct hv.patient_id 
                                        from etl_hei_follow_up_visit hv
                                        inner join etl_patient_demographics de on de.patient_id = hv.patient_id and hv.dna_pcr_sample_date is not null and hv.dna_pcr_result in (1138,1304) and timestampdiff(month,de.DOB,:to);",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "alreadyOnARTAtBeginningOfPregnancy",
                    "description" => "select distinct e.patient_id
                                        from etl_mch_enrollment e
                                        inner join etl_drug_event d on d.patient_id=e.patient_id
                                        where d.date_started < e.visit_date;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
                [
                    "name" => "newOnARTDuringPregnancy",
                    "description" => "select distinct e.patient_id
                                        from etl_mch_enrollment e
                                        inner join etl_drug_event d on d.patient_id= e.patient_id
                                        inner join etl_mchs_delivery ld on d.patient_id= ld.patient_id
                                        where d.date_started >= e.visit_date and d.date_started <=  ld.visit_date ;",
                    "query_category_id" => 1,
                    "created_at" => now()
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_query');
    }
}
