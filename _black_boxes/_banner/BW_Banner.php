<?php

namespace black_willow\bw_black_boxes\bw_banner;

class BW_Banner extends \black_willow\bw_nodes\BW_Black_Box {

	public $my_pictures;
	public $my_background;
	public $my_scripts;
	public $my_css;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
	}

	public function get_my_parent() {
		return parent::get_my_parent();
	}

	public function get_my_pictures() {
		return $this->my_pictures;
	}

	public function get_my_background() {
		return $this->my_background;
	}

	public function get_my_scripts() {
		return $this->my_scripts;
	}

	public function get_my_css() {
		return $this->my_css;
	}
}