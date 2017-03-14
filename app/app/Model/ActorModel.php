<?php namespace App\Model;	

class ActorModel extends BaseModel {
	
	function __construct(){
		$this->dbInit = $this->initializeDB();
	}

	function getActors(){
	
		$data = $this->dbInit->select('actor11',
			[
				"[>]audition11" => ["actor_uid"  => "audition_uid"],
				"[>]rec11" 		=> ["actor_uid"  => "actor_ID"],
				"[>]physical11" => ["audition11.audition_uid" => "phys_uid"],				
				"[>]skills11" 	=> ["physical11.phys_uid" => "skills_uid"],
				"[>]roles11" 	=> ["skills11.skills_uid" => "roles_uid"]
			],
			[
				"actor11.actor_uid",
				"actor11.firstname",
				"actor11.lastname",
				"actor11.pix_link",
				"actor11.resume_link",
				"audition" => [
					"audition11.audition_2yr",
					"audition11.stock_lyr",
					"audition11.apprentice",
					"audition11.intern",
					"audition11.availfor",	
					"audition11.availto",
					"audition11.standby",
					"audition11.mononly"	
				],
				"ethnicity" => [
					"physical11.nativeam",
					"physical11.asian",
					"physical11.white",
					"physical11.black",
					"physical11.hispanic",
					"physical11.eeurope",
					"physical11.mideast",
					"physical11.indian"
				],
				"skills" => [
					"skills11.vocal",
					"skills11.ballet",
					"skills11.ballroom",
					"skills11.tap",
					"skills11.swing",
					"skills11.jazz",
					"skills11.perc",
					"skills11.sax",
					"skills11.banjo",
					"skills11.piano",
					"skills11.drums",
					"skills11.cello",
					"skills11.clarinet",
					"skills11.trombone",
					"skills11.trumpet",
					"skills11.flute",
					"skills11.violin",
					"skills11.guitar"
				],
				"techSkills" => [
					"skills11.set_design",
					"skills11.lights",
					"skills11.costume",
					"skills11.box_office",
					"skills11.props",
				],
				"miscSkills" => [
					"skills11.shakes",
					"skills11.cabaret",
					"skills11.improv",
					"skills11.mime",
					"skills11.standup",
					"skills11.acrobatics",
					"skills11.juggling",
					"skills11.puppetry",
					"skills11.asl",
					"skills11.painting",
					"skills11.combat",
				],
				"physical" => [
					"physical11.gender",
					"physical11.ht",
					"physical11.wt",
					"physical11.age_range",
				]
			],
			[
				"AND"   => [
					"rec11.item" => "AR"
					//"actor11.app_type" => "AC",	
				],
				"ORDER" => [
					"actor11.lastname" => "ASC",
				],
				"LIMIT" => 2000
			]
		);
		return $data;
	}

	function getByID($id){
	
		$data = $this->dbInit->get('actor11',
			[
				"[>]audition11" => ["actor_uid"  => "audition_uid"],
				"[>]rec11" 		=> ["actor_uid"  => "actor_ID"],
				"[>]physical11" => ["audition11.audition_uid" => "phys_uid"],				
				"[>]skills11" 	=> ["physical11.phys_uid" => "skills_uid"],
				"[>]roles11" 	=> ["skills11.skills_uid" => "roles_uid"]
			],
			[
				"actor11.actor_uid",
				"actor11.firstname",
				"actor11.lastname",
				"actor11.phone",
				"actor11.email",
				"actor11.pix_link",
				"actor11.resume_link",
				"actor11.url1",
				"actor11.url2",
				"audition" => [
					"audition11.audition_2yr",
					"audition11.stock_lyr",
					"audition11.apprentice",
					"audition11.intern",
					"audition11.availfor",	
					"audition11.availto",
					"audition11.standby",
					"audition11.mononly"	
				],
				"ethnicity" => [
					"physical11.nativeam",
					"physical11.asian",
					"physical11.white",
					"physical11.black",
					"physical11.hispanic",
					"physical11.eeurope",
					"physical11.mideast",
					"physical11.indian"
				],
				"roles" => [
					"roles11.prof",
					"roles11.profemail",
					"roles11.proftel",
					"roles11.school",
					"roles11.show1",
					"roles11.role1",
					"roles11.thea1",
					"roles11.dir1",
					"roles11.show2",
					"roles11.role2",
					"roles11.thea2",
					"roles11.dir2",
					"roles11.show3",
					"roles11.role3",
					"roles11.thea3",
					"roles11.dir3",
					"roles11.show4",
					"roles11.role4",
					"roles11.thea4",
					"roles11.dir4",
					"roles11.show5",
					"roles11.role5",
					"roles11.thea5",
					"roles11.dir5",
					"roles11.show6",
					"roles11.role6",
					"roles11.thea6",
					"roles11.dir6",
					"roles11.show7",
					"roles11.role7",
					"roles11.thea7",
					"roles11.dir7",
					"roles11.show8",
					"roles11.role8",
					"roles11.thea8",
					"roles11.dir8",
					"roles11.show9",
					"roles11.role9",
					"roles11.thea9",
					"roles11.dir9",
					"roles11.show10",
					"roles11.role10",
					"roles11.thea10",
					"roles11.dir10"
				],
				"skills" => [
					"skills11.vocal",
					"skills11.ballet",
					"skills11.ballroom",
					"skills11.tap",
					"skills11.swing",
					"skills11.jazz",
					"skills11.perc",
					"skills11.sax",
					"skills11.banjo",
					"skills11.piano",
					"skills11.drums",
					"skills11.cello",
					"skills11.clarinet",
					"skills11.trombone",
					"skills11.trumpet",
					"skills11.flute",
					"skills11.violin",
					"skills11.guitar"
				],
				"techSkills" => [
					"skills11.set_design",
					"skills11.lights",
					"skills11.costume",
					"skills11.box_office",
					"skills11.props",
				],
				"miscSkills" => [
					"skills11.shakes",
					"skills11.cabaret",
					"skills11.improv",
					"skills11.mime",
					"skills11.standup",
					"skills11.acrobatics",
					"skills11.juggling",
					"skills11.puppetry",
					"skills11.asl",
					"skills11.painting",
					"skills11.combat",
				],
				"physical" => [
					"physical11.gender",
					"physical11.ht",
					"physical11.wt",
					"physical11.eye",
					"physical11.hair",
					"physical11.age_range",
					"physical11.suitdress",
					"physical11.chestbust",
					"physical11.waist"

				],
				"union" => [
					"audition11.u_emc",
					"audition11.u_sag",	
					"audition11.u_aftra",	
					"audition11.u_agva",
					"audition11.u_agma",
				]
			],
			[
				"AND"   => [
					"actor_uid"   => $id,
				]
			]
		);
		
		return $data;
	}
}