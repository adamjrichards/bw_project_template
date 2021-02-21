<?php

namespace black_willow\bw_black_boxes\bw_logo;

class BW_Logo extends \black_willow\bw_nodes\BW_Black_Box {

	public $my_target; // ...the image set
	public $my_owner; // ...as in a company or service, etc.

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		if ( isset( $the_params_map[ "the_owner"] ) ) {
			$this->my_owner = $the_params_map[ "the_owner" ];
		}
		if ( isset( $the_params_map[ "the_target"] ) ) {
			$this->my_target = $the_params_map[ "the_target" ];
		}

          $this->my_node_opener = "\n"
               . "\t\t##{$this->get_my_tagName()} id='{$this->get_my_id()}_wrapper' class='{$this->get_my_className()} wrapper'>\n";

          $this->my_node_closer = "\n"
                  . "\t\t##/" . $this->get_my_tagName() . ">\n";

          $this->my_innerHTML = "\n##img id='{$this->get_my_id()}' class='{$this->get_my_className()}' name='{$this->get_my_name()}' src='bw_black_boxes/BW_Logo/{$this->get_my_src()}' {$this->get_my_trigger()} {$this->get_my_other_attributes()}>\n";

	}
	public function change_my_owner( $to_this ) {
		$this->my_owner = $to_this;
	}
	public function change_my_target( $to_this ) {
		$this->my_target = $to_this;
	}
}