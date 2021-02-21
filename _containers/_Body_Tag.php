<?php

namespace black_willow\bw_containers;

class BW_Body_Tag extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );

		$this->my_node_opener = "\n##!------------- Body tag '{$this->get_my_id()}' starts here. -------------->
		\n##body class='{$this->get_my_className()}' id='{$this->get_my_id()}' name='{$this->get_my_name()}' {$this->get_my_trigger()}>";

		$this->my_node_closer = "\n##/body>
		\n##!------------- Body tag {$this->get_my_id()} ends here. -------------->\n";


	}
}