<?php

namespace black_willow\bw_components;

class BW_Image_Set extends \bw\core\_BW_SET {

	public $my_group_name;
	public $my_figures;
	public $my_text = [];

	function __construct( $the_params_map ) {
		
		parent::__construct( $the_params_map );
		$this->my_figures = $this->my_members;
		$this->my_group_name = $this->my_label;
	}
	public function add_a_new_image_to_the_set( $the_image ) {
		//$this->add_a_new_member_to_the_set( $this->my_members, $the_image );
	}
	public function add_new_text_to_the_set( $the_text ) {
		array_push( $this->my_text, $the_text );
	}
	public function remove_an_image_from_the_set( $the_name ) {
		$this->my_images->remove( "$this->my_label\_$the_name" );
	}
}