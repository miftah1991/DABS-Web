<?php
Class Jobs_m  extends CI_Model {
    
    function GetAll(){
            $today=date('Y-m-d');
            $q = $this->db->query("
								SELECT jid,position_title, number_position, vacancy_num, p.prname as province,  expire_date FROM tbl_jobs tj
								left join zprovince p on p.prid = tj.prid
								where expire_date >='$today' order by publish_date desc");
            return $q->result();   
            
        }
    function GetJobDictionary(){
            $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT * FROM jobsdictionary where language_id=$languageid");
            return $q->result();
    }
    function GetExJobs(){
            $today=date('Y-m-d');
            $q = $this->db->query("SELECT jid,position_title, number_position, vacancy_num, province,  expire_date FROM tbl_jobs where expire_date <'$today' order by publish_date desc");
            return $q->result();   
            
        }
    function GetJob($jid){
            $q = $this->db->query("
			SELECT 
j.jid,j.vacancy_num,j.position_title,j.job_type,j.number_position,fa.FunctionalAreaName,j.travel_province,j.publish_date,j.expire_date,
j.contract_type,j.work_type,concat(j.probition_period,' Months') as probition_period,j.duration,j.nationality,j.gender,
concat(j.experience, 'Years') as experience,j.education_field,j.skills_required,j.language_required,j.duties,j.qualification,
q.QualificationName ,pr.PRName,s.Name AS salname,j.Code
 FROM tbl_jobs j
left join zfunctionalarea fa on fa.FunctionalAreaID =  j.functional_area
left join zQualification q on q.QualificationID	 = j.QualificationID	
left join zprovince pr on pr.prid = j.prid
left join zSalary s on s.salaryid = j.salaryid where jid=$jid");
            return $q->result();   
            
        }
   function JobSearch($search){
            //$q = $this->db->query("SELECT * FROM tbl_jobs where position_title like '%$search%'");
           // return $q->result();  

              $this->db->select('*');
              $this->db->from('tbl_jobs');
              $this->db->like('position_title', $search);
              $q = $this->db->get();
			  return $q->result();			
            
        }
    
}

?>