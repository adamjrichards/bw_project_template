<?php

namespace black_willow\bw_tags;

class BW_Image_Tag extends \black_willow\bw_nodes\BW_Object_Node {

	// public $my_name; ...in _BW_NODE
	public $my_alt_attribute;
	public $my_meta;

	function __construct( $the_content, $the_params_map = "default" ) {
		$this->my_src = $the_content;
		if ( $the_params_map === "default" ) {
			$the_params_map = \black_willow\bw_init\bw_Init_Default::get_me_the_default_image_params_array();
			$the_params_map[ "the_alt_attribute" ] = "BW image $the_content";
			$the_params_map[ "the_meta" ] = "default";
			$the_params_map[ "the_mimetype" ] = "image/png";
			$the_params_map[ "the_trigger" ] = "onmouseenter='add_my_listeners( this )'";
		}
		parent::__construct( $the_params_map );
		$this->my_node_opening = " ##img type='{$this->get_my_mimetype()}' id='{$this->get_my_id()}' class='{$this->get_my_className()}' name='{$this->get_my_name()}' src='{$this->get_my_src()}' {$this->get_my_trigger()} {$this->get_my_other_attributes()}> ";
		$this->my_node_closer = "";
		$this->my_innerHTML = "";
	}
}