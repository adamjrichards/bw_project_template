<?php

namespace black_willow\bw_tags;

class BW_Meta_Tag extends \black_willow\bw_nodes\BW_Empty_DOM_Node {

	private $my_HTML_tag = "";

	function __construct( $the_key, $the_value, $the_type = null ) {
		parent::__construct( $the_type );
		$this->my_HTML_tag = "\n##meta $the_type='$the_key' content='$the_value'>\n";
	}
	public function get_my_HTML_tag() {
		return $this->my_HTML_tag;
	}
}