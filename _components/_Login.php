<?php

namespace black_willow\bw_components;

class BW_Login extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_params_map = null ) {

          parent::__construct( $the_params_map );
		$this->my_node_opener = "\n\t\t\t##!-------------" . $this->get_my_id() . " -------------->
		\n\t\t\t##div class='" . $this->get_my_className() . "' id='" . $this->get_my_id() . "' name='" . $this->get_my_name() . "' " . $this->get_my_other_attributes() . " " . $this->get_my_trigger() . "> ";
          //$this->my_innerHTML = "\n##h3>Login Box</h3>\n";
		$this->my_node_closer = "\t\t##/div>
		\t\t##!-------------" . $this->get_my_id() . "' ends here. -------------->\n";

	}

}