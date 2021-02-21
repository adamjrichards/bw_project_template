<?php

namespace black_willow\bw_tags;

class BW_Script_Tag extends \black_willow\bw_nodes\BW_Empty_DOM_Node {

	private $my_defer = "";
	private $my_async = "";
	private $my_src = "";

	function __construct( $from_this_path, $the_params_map = null ) {
		parent::__construct( $the_params_map );
		$the_script_attributes = "";
		if ( ! is_null( $the_params_map ) ) {
			$this->my_name = $this->get_my_name();
			$this->my_MIMEType = $this->get_my_MIMEType();
			$my_path = &$for_this_path;

			if ( $the_params_map->hasKey( "my_defer" ) ) {
				$this->my_defer = $the_params_map->get( "my_defer" );
				if ( $this->my_defer !== "" ) {
					$the_script_attributes .= " $this->my_defer";
				}
			}
			if ( $the_params_map->hasKey( "my_async" ) ) {
				$this->my_async = $the_params_map->get( "my_async" );
				if ( $this->my_async !== "" ) {
					$the_script_attributes .= " $this->my_async";
				}
			}
			if ( $the_params_map->hasKey( "my_other_attributes" ) ) {
				if ( $this->get_my_other_attributes() !== "" ) {
					$the_script_attributes .= " {$this->get_my_other_attributes()}";
				}
			}
		} else {
			$the_attributes = $this->get_my_tag_attributes( $from_this_path );
			$this->my_name = $the_attributes->get( "my_name" );
			$this->my_MIMEType = $the_attributes->get( "my_MIMEType" );
			$my_path = &$for_this_path;
		}

		if ( $this->my_name !== "" ) {
			$the_script_attributes .= " name='{$this->my_name}'";
		}
		if ( $this->my_src === "" ) {
			$this->my_src = $from_this_path;
		} else if ( \strpos( $this->my_src, "inline" ) !== FALSE  ) {
			$this->my_innerHTML = $this->my_src;
			$this->my_src = "";
		}

		if ( ! empty( $this->my_src ) ) {
			$the_script_attributes .= " src='$my_path/$this->my_src'";
		}

		if ( ! empty( $this->my_innerHTML ) ) {
			$this->my_src = "";
			$this->my_innerHTML = $the_params_map->get( "my_innerHTML" );
		}

		if ( $this->my_MIMEType !== "text/javascript" && $this->my_MIMEType !== "text/html" ) {
			$the_script_attributes .= " type='$this->my_MIMEType'";
		}

		$this->my_node_opener = "##script" . $the_script_attributes . ">";

		$this->my_node_closer = "##/script>\n";
	}

     public function get_my_tag() {
         $the_tag = $this->my_node_opener . $this->my_innerHTML . $this->my_node_closer;
	    return $the_tag;
	}

     public function add_an_inline_function( $like_this_one ) {
     }

	public function get_my_tag_attributes( $from_this_js_file ) {
		$the_script = \file_get_contents( $from_this_js_file );
		if ( \mb_strpos( $the_script, "/* Script tag attributes *") !== FALSE ) {
			$the_end_pos = \mb_strpos( $the_script, "END" );
			$the_start_pos = \mb_strpos( $the_script, "BEGIN" );
			$the_length = $the_end_pos - $the_start_pos - 6;
			$the_json_string = \mb_strcut( $the_script, $the_start_pos + 6, $the_length );
			$the_json = \json_decode( $the_json_string, TRUE );
			//\line_out( __FILE__, __LINE__, $from_this_file );
			//\line_out_boolean( __FILE__, __LINE__, is_array($the_JSON) );
			$the_map = new \Ds\Map( $the_json );
			return $the_map;
		} else {
			return new \Ds\Map( [
						"my_MIMEType" => "text/javascript",
						"my_name" => "",
						"my_defer" => "",
						"my_async" => "",
						"my_other_attributes" => "" ] );
		}
	}

}