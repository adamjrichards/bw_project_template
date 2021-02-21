<?php

namespace black_willow\bw_containers;

class BW_Head_Tag extends \black_willow\bw_system\BW_DOM_Node {

     private $my_script_groups;
     private $my_link_groups;
     private $my_meta_groups;

	function __construct( $the_params_map ) {
		$my_script_groups = $the_params_map[ "my_script_groups" ];
		$my_link_groups = $the_params_map[ "my_link_groups" ];
		$my_meta_groups = $the_params_map[ "my_meta_groups" ];
		$this->my_script_groups = new \Ds\Queue();
		$this->my_link_groups = new \Ds\Queue();
		$this->my_meta_groups = new \Ds\Queue();
		$this->my_node_content = new \Ds\Stack();
		if ( ! empty( $my_script_groups ) ) {
			$this->my_script_groups = $this->make_my_script_groups( $my_script_groups );
		}
		if ( ! empty( $my_link_groups ) ) {
			$this->my_link_groups = $this->make_my_link_groups( $my_link_groups );
		}
		if ( ! empty( $my_meta_groups ) ) {
			$this->my_meta_groups = $this->make_my_meta_groups( $my_meta_groups );
		}
		$the_node_content = "";
		while ( ! $this->my_node_content->isEmpty() ) {
			$the_node_content .= $this->my_node_content->pop();
		}
		parent::__construct( $the_params_map );

		$this->my_node_opener = "##!------------- Head tag '{$this->get_my_id()}' starts here. -------------->\n
		##head>";

		$this->my_node_closer = "##/head>
			##!------------- Head tag '{$this->get_my_id()}' ends here. -------------->\n";

		$this->my_innerHTML = \str_replace( "TAG_GROUPS_PLACEHOLDER", $the_node_content, $this->my_innerHTML );
	}
	public function make_my_script_groups( $my_script_groups ) {
		foreach ( $my_script_groups as $this_group ) {
			$this->my_node_content->push( \black_willow\bw_factories\bw_Tag_Groups::get_me_a_new_script_group( $this_group )->get_my_html() );
		}
	}
	public function make_my_link_groups( $my_link_groups ) {
		foreach ( $my_link_groups as $this_group ) {
			$this->my_node_content->push( \black_willow\bw_factories\bw_Tag_Groups::get_me_a_new_link_group( $this_group ) );
		}
	}
	public function make_my_meta_groups( $my_meta_groups ) {
		foreach ( $my_meta_groups as $this_group ) {
			$this->my_node_content->push( \black_willow\bw_factories\bw_Tag_Groups::get_me_a_new_meta_group( $this_group )->get_my_html() );
		}
	}
}