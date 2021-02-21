<?php

namespace black_willow\bw_black_boxes\bw_splash;

class BW_Splash extends \black_willow\bw_system\BW_Black_Box {

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		/*$the_sources = "";
		foreach ( $this->get_my_asset_list() as $this_asset ) {
			if ( file_exists( $this_asset ) ) {
				$the_extension = pathinfo( $this_asset, PATHINFO_EXTENSION );
				if ( $the_extension === "jpg" || $the_extension === "png" ) {
					$the_width = substr( $this_asset, strpos( $this_asset, "_x" ) + 2 );
					$the_width = substr( $the_width, 0, strpos( $the_width, "y" ) ) * 1.5;
					$the_sources .= "$this_asset $the_width" . "w, ";
				}
			}
		}*/
          $this->my_node_opener = "\n\t##{$this->get_my_tagName()} id='{$this->get_my_id()}_wrapper' class='{$this->get_my_className()} wrapper appear' {$this->get_my_trigger()} {$this->get_my_other_attributes()}>\n";

          $this->my_innerHTML = "\n##img id='{$this->get_my_id()}' class='{$this->get_my_className()}' name='{$this->get_my_name()}' src='bw_black_boxes/BW_Splash/{$this->get_my_src()}' {$this->get_my_trigger()} {$this->get_my_other_attributes()}>\n";

          $this->my_node_closer = "\n##/{$this->get_my_tagName()}>\n";
     }
}