<?php

namespace black_willow\bw_tags;

class BW_Pre_Tag extends \black_willow\bw_nodes\BW_Wrapper_Node {

	function __construct( $the_content = "pre", $the_params_map = "default" ) {
		if ( $the_content === "pre" ) {
			$this->my_content = "##!---- Generic pre tag content goes here. -------->";
		} else {
			$this->my_content = $the_content;
		}
		if ( $the_params_map === "default" ) {
			$the_params_map = \black_willow\bw_init\bw_Init_Default::get_me_the_default_wrapper_params_array( );
		}
		parent::__construct( $this->my_content, $the_params_map );

	}
	public function get_my_node() {
		return $this->my_node;
	}
}