<?PHP
	
	$this->db->order_by("question_id desc");
	$this->db->limit(1);
	$this->db->where("language_id",$this->session->userdata("languageid"));
	$q = $this->db->get("tbl_questions");
	
	$row = $q->row();
	
	if(isset($row->question) && $row->question!=""){
?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;"><h3> <?php foreach($dictionary as $d){echo $d->cast_vote; }?></h3><hr></div>
<div class="large-1 columns">&nbsp;</div>
 <div class="row"> 
 <div class="large-1 medium-1 small-1 columns">&nbsp;</div>
 <div class="large-10 medium-1 small-1 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
         
            <?PHP										
							echo form_open(base_url()."Votes/post_vote/".$row->question_id);
						?>              
                        <?PHP
                        echo "<br /><h4>".$row->question."</h4><br />";
                        
                        
                        
						$q = $this->db->query("SELECT o.option_id as option_id,o.option AS options, COUNT( v.vote_id ) AS votes
							FROM tbl_options o
							LEFT JOIN tbl_votes v ON v.option_id = o.option_id
							WHERE o.question_id =  '".$row->question_id."'
							GROUP BY o.option_id");
						$records = $q->result();
                        
						$total_votes = 0;
						foreach($records as $rw){
							$total_votes = $total_votes + $rw->votes;
						}
						$total_votes	=	$total_votes==0?1:$total_votes;
						?>
						
						<?PHP
                        foreach($records as $rw)
                        {
                        ?>
                               
                              		<label><input type="radio" name="vote" id="vote<?=$rw->option_id?>" value="<?=$rw->option_id?>" onclick="voteFunction('<?=$rw->option_id?>')" /> <?=$rw->options?></label>
                              	
                            <!--  	<span class="vote-txt"><PHP echo round($rw->votes * 100/$total_votes) ?>%</span> -->
                              		 
                        <?PHP
                        }
                        ?>
                       
                        
                        <input class="success button" type="submit" value="<?php foreach($dictionary as $d){echo $d->cast_vote; }?>" onclick="return validVote()" /> <br />
                       
                        <font color="#FF0000"><?PHP echo $this->session->flashdata('votemsg');?></font>
    					<input type="hidden" name="votehf" id="votehf" value="0" />
                        <?php echo form_close(); ?>
   
</div>


<div class="large-1 medium-1 small-1 columns">&nbsp;</div>
   </div>                     
            
            <script type="text/javascript">
				var voteFunction = function(id)
				{
					$("#votehf").val(id);
				}
				var validVote = function()
				{
					if($("#votehf").val() == 0)
					{
						return false;
					}
					else
					{
						return true;
					}
				}
			</script>
            <?PHP } ?>