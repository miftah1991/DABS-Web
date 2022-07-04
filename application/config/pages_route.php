<?PHP //$route['pages/mission'] = 'pages/pdetail/mission'; ?>
<?php 






		//Pages Route
		require_once( BASEPATH .'database/DB.php' );
		$db =& DB();
		//$languageid=$this->session->userdata('languageid');
		$q = $db->query( "Select * FROM tbl_menu where d_page=0" );
		$rec=$q->result();
		foreach($rec as $r){
			$route[$r->custom_url] = 'page/pdetail/'.$r->custom_url;
			}
			
			
		//Right to Left Language Routes
		$route['dr'] = 'home/rtlindex/';
		
		/*
		//News Rout
		$db =& DB();
		$n = $db->query( 'Select * FROM tbl_news' );
		$nrec=$n->result();
		foreach($nrec as $nr){
			$route['news/'.$nr->nid] = 'news/ndetail/'.$nr->nid;
			}

		//Tenders Rout
		$db =& DB();
		$t = $db->query( 'Select * FROM tndr_tbl' );
		$nrec=$n->result();
		foreach($nrec as $nr){
			$route['news/'.$nr->nid] = 'news/ndetail/'.$nr->nid;
			}
		*/

?>
