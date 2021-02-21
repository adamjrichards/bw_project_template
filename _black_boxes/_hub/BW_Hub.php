<?php

namespace black_willow\bbox;

class BW_Hub extends \black_willow\bw_system\BW_Black_Box {

     private $my_svg = "";
	private $my_gateways;

	function __construct( $the_params_map ) {
          parent::__construct( $the_params_map );
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_svg( "bw_black_boxes/BW_Hub/bw_hub_ornament_group_1.4_x1000y1000.svg", "black_box" );
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_svg( "bw_black_boxes/BW_Hub/bw_hub_ring_group_1.1_x1000y1000.svg", "black_box" );
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_svg( "bw_black_boxes/BW_Hub/bw_hub_background_group_1.2.svg", "black_box" );
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_svg( "bw_black_boxes/BW_Hub/bw_hub_ray_group_1.4_x2000y1000.svg", "black_box" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_css_file( "bw_black_boxes/BW_Hub/bw_hubs.css", "head_tag" );

		$this->my_svg .= $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_svg( "bw_black_boxes/BW_Hub/bw_hub_1.1.svg", "return" );

		$this->my_svg .= \str_replace( "##/svg>", "\n", \str_replace( "<", "##", $this->my_svg ) );
          if ( \file_exists( $this->get_my_meta() )  ) {
               $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_system\\BW_JSON_Reader" );
               $the_reader = new \black_willow\bw_system\BW_JSON_Reader( $this->get_my_meta(), $this->get_my_handle() );
               $the_json = $the_reader->get_my_json();
          }
		/*
          $the_links = $the_json->{$this->get_my_handle()};
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_system\\BW_Toy" );
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\toys\\BW_Bubble" );
          foreach ( $the_links as $this_link ) {
               $the_name = \str_replace( "the_", "my_", $this_link->id );
               $the_bubble = new \toys\BW_Bubble( $this_link->id, $this_link->className, $this_link->target );
               $this->my_svg .= $the_bubble->get_my_tag();
          }*/
          $this->my_svg .= "\n##/svg>\n";
     }
     public function get_my_svg() {
          return $this->my_svg;
     }
}