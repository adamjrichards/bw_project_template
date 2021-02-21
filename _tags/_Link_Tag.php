<?php

namespace black_willow\bw_tags;

class BW_Link_Tag extends \black_willow\bw_nodes\BW_Empty_DOM_Node {

     private $my_link = "\n##link";
	private $my_rel;
	private $my_href;
	private $my_MIMEType;
	private $my_as;
	private $my_crossorigin;
	private $my_disabled = "";
	private $my_media;
	private $my_sizes;

	function __construct( $the_params_map ) {
		$the_script_attributes = " ";
		parent::__construct( $the_params_map );

		if ( $the_params_map->hasKey( "my_rel" ) ) {
			$this->my_rel = $the_params_map->get( "my_rel" );
			$the_script_attributes .= " rel='{$this->my_rel}'";
		}
		if ( $the_params_map->hasKey( "my_href" ) ) {
			$this->my_href = $the_params_map->get( "my_href" );
			$the_script_attributes .= " href='{$this->my_href}'";
		}
		if ( $the_params_map->hasKey( "my_MIMEType" ) ) {
			$this->my_MIMEType = $the_params_map->get( "my_MIMEType" );
			$the_script_attributes .= " type='{$this->my_MIMEType}'";
		}
		if ( $the_params_map->hasKey( "my_as" ) ) {
			$this->my_as = $the_params_map->get( "my_as" );
			$the_script_attributes .= " as='{$this->my_as}'";
		}
		if ( $the_params_map->hasKey( "my_crossorigin" ) ) {
			$this->my_crossorigin = $the_params_map->get( "my_crossorigin" );
			$the_script_attributes .= " crossorigin='{$this->my_crossorigin}'";
		}
		if ( $the_params_map->hasKey( "my_disabled" ) ) {
			$this->my_disabled = $the_params_map->get( "my_disabled" );
			$the_script_attributes .= " {$this->my_disabled}";
		}
		if ( $the_params_map->hasKey( "my_media" ) ) {
			$this->my_media = $the_params_map->get( "my_media" );
			$the_script_attributes .= " media='{$this->my_media}'";
		}
		if ( $the_params_map->hasKey( "my_sizes" ) ) {
			$this->my_sizes = $the_params_map->get( "my_sizes" );
			$the_script_attributes .= " sizes='{$this->my_sizes}'";
		}
		$this->my_link .= " {$the_script_attributes}>\n";
     }
     public function get_my_link() {
          return $this->my_link;
     }
}