<?php

namespace black_willow\bw_components;

class BW_Sidebar extends \black_willow\bw_containers\BW_Aside_Tag {

	function __construct( $the_params_map = "default" ) {
		parent::__construct( $the_params_map );
	}

	public function get_my_asset_list() {
		return parent::get_my_asset_list();
	}

	public function get_my_attributes() {
		return parent::get_my_attributes();
	}

	public function get_my_id() {
		return parent::get_my_id();
	}

	public function get_my_template() {
		return parent::get_my_template();
	}

	public function get_my_css_source() {
		return parent::get_my_css_source();
	}

	public function get_my_source_folder() {
		return parent::get_my_source_folder();
	}

	public function change_my_html( $to_this ) {
		$this->my_html = $to_this;
	}
	public function change_my_css( $to_this ) {
		$this->my_css = $to_this;
	}
	public function change_my_scripts( $to_these ) {
		$this->my_scripts = $to_these;
	}
	public function add_an_asset( $like_this_one, $with_this_name ) {
		$this->my_assets->put( $like_this_one, $with_this_name );
	}
	public function remove_the_asset( $with_this_name ) {
		$this->my_assets->remove( $like_this_one );
	}
}