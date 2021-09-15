## Dashboards and Charts

### Care and Treatment
#### Charts
- Current on ART vs Current In Care
- New on ART vs New In Care
- Current in ART vs Current on Care by Finer Age & Gender
- New in ART vs New on Care By Finer Age & Gender
#### Tables
- etl_art_master_list
- etl_current_in_care
- etl_patient_hiv_followup
#### Models
- Patient
  
### Screening and Testing
#### Charts
- Overall HIV Testing & Linkage By Different Age Groups (Children 0-9 Years)
- Overall HIV Testing & Linkage By Different Age Groups (Adolescents 10-19 Years)
- Overall HIV Testing & Linkage By Different Age Groups (Youths 15-24 Years)
- Overall HIV Testing & Linkage By Different Age Groups (Adults 20+ Years)
- Overall HIV Testing & Linkage By Different Age Groups (Totals)
- Overall HIV Testing By Gender
- Overall HIV+ Testing By Gender
- Total Tested for HIV vs Total Tested HIV+
- Total Tested HIV+ vs Total Tested HIV+ Linked
- Males Tested for HIV vs Males Tested HIV+
- Males Tested HIV+ vs Males Tested HIV+ Linked
- Females Tested for HIV vs Females Tested HIV+
- Females Tested HIV+ vs Females Tested HIV+ Linked
- HIV Testing & Positivity By Different Testing Modalities (Expanded Testing Points)
- HIV+ Contribution By Different Testing Modalities (Expanded Testing Points)
- HIV Testing & Positivity By Different Testing Modalities (DATIM Modalities)
- HIV+ Contribution By Different Testing Modalities (DATIM Modalities)
#### Tables
- etl_hts_linkage_tracing
- etl_hts_referral
- etl_hts_referral_and_linkage
- etl_hts_test
#### Models
- Hts

### Multi-Month Dispensing
#### Charts
- Multi Month Dispensing (MMD) Uptake Cascades By Finer Age & Gender
- MMD Uptake vs Overall MMD Uptake By Finer Age & Gender
- TX_CURR Disaggregated By Age, Gender & ARV Dispensing Quantity
#### Tables
- etl_current_in_care
- etl_patient_hiv_followup
#### Models
- Visit

### CD4 Enrollment Testing
#### Charts
- CD4 Enrollment Testing (Children 0-9 Years)
- CD4 Enrollment Testing (Adolescents 10-19 Years) 
- CD4 Enrollment Testing (Adults 20+ Years) 
- CD4 Enrollment Testing (Total)
#### Tables
- etl_laboratory_extract etl_laboratory_extract (lab_test = 5497, cd4_percentage = 730)
- etl_client_enrollment (not sure which enrollment table to use!)
- etl_hiv_enrollment
#### Models
- Hts

### Viral Load Testing
#### Charts
- Targeted vs Routine Viral Load Cascades (Children 0-9 Years) 
- Targeted vs Routine Viral Load Cascades (Adolescents 10-19 Years)
#### Tables
- etl_laboratory_extract (lab_test = 856 or lab_test = 1305,  lab_reason = 161236 "Routine")
- etl_viral_load -- not sure it works
#### Models
- Hts

### ART Cohort Retention
#### Charts
- 12 Months ART Cohort Retention Cascades (Children 0-9 Years)
- 12 Months ART Cohort Retention Cascades (Adolescents 10-19 Years)
- 12 Months ART Cohort Retention Cascades (Adults 20+ Years)
- 12 Months ART Cohort Retention Cascades (Totals)
#### Tables
- etl_client_enrollment
- etl_current_in_care
#### Models
- Cohort

### HIV/Cervical Cancer
#### Charts
- HIV/Cervical Cancer Cascade
- Cervical Cancer Screening Visit Type
#### Tables
- etl_cervical_cancer_screening
#### Models
- CervicalScreening

### PMTCT & EID & HEI POS & HCA
#### Charts
- PMTCT Cascades (10-14 Years)
- PMTCT Cascades (15-19 Years)
- PMTCT Cascades (20-24 Years)
- PMTCT Cascades (Youths 15-24 Years)
- PMTCT Cascades (25+ Years)
- PMTCT Cascades (Totals)
- PMTCT EID & PMTCT By 12 Months of Age
- PMTCT EID & PMTCT By Age at Sample Collection
- HCA (12 Months)
- HCA (24 Months)
- HCA (Dead Outcomes)
#### Tables
- etl_mch_postnatal_visit
- etl_mch_enrollment
- etl_mchs_discharge
- etl_mchs_delivery
- etl_mch_antenatal_visit
- etl_hei_enrollment
- etl_hei_follow_up_visit
- etl_hei_immunization
#### Models
- Mch
- Hei
  
### IPT Outcomes
#### Charts
- New on IPT (Children < 15 Years)
- New on IPT (Adults 15+ Years)
- New on IPT (Totals)
- Current on ART vs Current Ever on IPT (Children < 15 Years) 
- Current on ART vs Current Ever on IPT (Adults 15+ Years)
- Current on ART vs Current Ever on IPT (Totals)
- IPT Outcomes (Totals)
- Reasons for Not Completing IPT (Totals)
- IPT Outcomes (Adults 15+ Years)
- Reasons for Not Completing IPT (Adults 15+ Years)
- IPT Outcomes (Children < 15 Years)
- Reasons for Not Completing IPT (Children < 15 Years)
#### Tables
- etl_ipt_follow_up
- etl_ipt_initiation
- etl_ipt_outcome
- etl_ipt_screening
#### Models
- Ipt
  
### TB Prevention and Treatment
#### Charts
- TB/HIV Cascades By Overall (Totals)
- TB/HIV Cascades By Overall (Tb Testing Point)
- TB/HIV Cascades By Age (Children < 15 Years)
- TB/HIV Cascades By Age (Adults 15+ Years)
- TB/HIV Cascades By Gender (Children < 15 Years)
- TB/HIV Cascades By Gender (Adults 15+ Years)
- TB Treatment Outcomes for HIV+ TB Cases Starting Treatment 1 Year Ealier By Overall
- TB Treatment Outcomes for HIV+ TB Cases Starting Treatment 1 Year Ealier By Age
- TB Treatment Outcomes for HIV+ TB Cases Starting Treatment 1 Year Ealier By Gender
- TB Prevention (Children < 15 Years)
- TB Prevention (Adults 15+ Years)
- TB Prevention (Totals)
- TB Treatment (Children < 15 Years)
- TB Treatment (Adults 15+ Years)
- TB Treatment (Totals)
- Bacteriologic Diagnosis (Children < 15 Years)
- Bacteriologic Diagnosis (Adults 15+ Years)
- Bacteriologic Diagnosis (Totals)
#### Tables
- etl_tb_enrollment
- etl_tb_follow_up_visit
- etl_tb_screening
#### Models
- Tb

### Index Testing
#### Charts
- Index Testing (Children < 15 Years)
- Index Testing (Adults 15+ Years)
- Index Testing (Totals)
- Reported Under FT Testing Points
- Reported Under PNS Testing Points
#### Tables
- etl_hts_linkage_tracing
- etl_hts_referral
- etl_hts_referral_and_linkage
- etl_hts_test
#### Models
- Hts