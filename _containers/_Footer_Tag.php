<?php

namespace black_willow\bw_containers;

class BW_Footer_Tag extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );

		$this->my_node_opener = "\n
		##!------------- Footer tag '{$this->get_my_id()}' starts here. -------------->
          ##footer class='{$this->get_my_className()}' id='{$this->get_my_ID()}' name='{$this->get_my_name()}' {$this->get_my_trigger()} {$this->get_my_other_attributes()}>\n";

		$this->my_node_closer = "
		##/footer>\n
          ##!------------- Footer tag {$this->get_my_id()} ends here. -------------->\n";
	}
}