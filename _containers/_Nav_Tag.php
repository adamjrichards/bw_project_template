<?php

namespace black_willow\bw_containers;

class BW_Nav_Tag extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );
		$this->my_node_opener = "\n
		##!------------- Nav $this->my_name starts here. -------------->\n
			##nav class='$this->my_className' id='$this->my_ID' name='$this->my_name'>";


		$this->my_node_closer = "##av>
		##!------------- Nav $this->my_name ends here. -------------->\n";

	}
}