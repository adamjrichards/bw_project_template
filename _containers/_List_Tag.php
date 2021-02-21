<?php

namespace black_willow\bw_containers;

class BW_Unordered_List  extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );
		$this->my_node_opener = "
		##!-------------" .  $this->get_my_name() . "-------------->

			##ul class='" . $this->get_my_className() . "' id='" . $this->get_my_ID() . "' name='" . $this->get_my_name() . "' " . $this->get_my_other_attributes() . ">\n";


		$this->my_node_closer = "##/ul>
		##!------------- Unordered list" . $this->get_my_name() . " ends here. -------------->\n";

	}
}

class BW_Ordered_List extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );
          $this->my_node_opener = "\n
                  ##!------------- Ordered list " . $this->get_my_name() . " starts here. -------------->\n
                  ##ol class='" . $this->get_my_className() . "' id='" . $this->get_my_ID() . "' name='" . $this->get_my_name() . "' " . $this->get_my_other_attributes() . ">\n";



		$this->my_node_closer = "##/ol>
		##!------------- Ordered list " .  $this->get_my_name() . " ends here. -------------->\n";


	}
}

class BW_List_Item extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );
          $this->my_node_opener = "
		##!------------- Unordered list " . $this->get_my_name() . " starts here. -------------->

			##li class='" . $this->get_my_className() . "' id='" . $this->get_my_ID() . "' name='" . $this->get_my_name() . "' " . $this->get_my_other_attributes() . ">";


		$this->my_node_closer = "##/li>
		##!------------- Unordered list " . $this->get_my_name() . " ends here. -------------->\n";

	}
}