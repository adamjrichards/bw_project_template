<?php

namespace black_willow\bw_tags;

class BW_Audio_Tag extends \black_willow\bw_nodes\BW_Object_Node {

	// public $my_name; ...in _BW_NODE
	public $my_alt_attribute;
	public $my_title_attribute;
	public $my_css;
	public $my_meta;
	public $my_mimetype;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_alt = $the_params_map[ "the_alt_attribute" ];
		$this->my_title_attribute = $the_params_map[ "the_title_attribute" ];
		$this->my_css = $the_params_map[ "the_css" ];
		$this->my_mimetype = $the_params_map[ "the_mimetype" ];
	}
}