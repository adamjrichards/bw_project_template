<?php

namespace black_willow\bw_tags;

class BW_Object_Tag extends \black_willow\bw_nodes\BW_Object_Node {

	public $my_caption;
	public $my_title;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_caption = $the_params_map[ "the_caption" ];
		$this->my_title_attribute = $the_params_map[ "the_title_attribute" ];
		$this->my_css = $the_params_map[ "the_css" ];
	}
}