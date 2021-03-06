<?php

namespace black_willow\bw_components;

class BW_Gateway extends \black_willow\bw_system\BW_DOM_Node {

     protected $my_gate;
     protected $my_hub;

	function __construct( $the_params_map ) {
          parent::__construct( $the_params_map );
          $this->my_node_opener = $this->get_my_node_opener() . "\n
               \n##{$this->get_my_tagName()} class='{$this->get_my_className()}' id='{$this->get_my_id()}' name='{$this->get_my_name()}' {$this->get_my_other_attributes()}>\n";

          $this->my_node_closer = "\n##/{$this->get_my_tagName()}>" . $this->get_my_node_closer();
	}
}