<?php

namespace black_willow\bw_components;

class BW_Ornament extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_params_map = "default" ) {
          if ( $the_params_map === "default" ) {
               $the_params_map = \black_willow\bw_init\bw_Init::get_me_the_default_params_array( "default" );
          }
		parent::__construct( $the_params_map );
		$this->my_css_source = $the_params_map[ "my_css_source" ];
		$this->my_source_folder = $the_params_map[ "my_source_folder" ];
		$this->my_context = $the_params_map[ "my_context" ];
          $this->my_node_opener = $this->get_my_node_opener() . "\n
               \n##{$this->get_my_tagName()} class='{$this->get_my_className()}' id='{$this->get_my_id()}' name='{$this->get_my_name()}' {$this->get_my_other_attributes()}>\n";

          $this->my_node_closer = "\n##/{$this->get_my_tagName()}>" . $this->get_my_node_closer();
	}

	public function get_my_asset_list() {
		return $this->my_asset_list;
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
		return $this->my_css_source;
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