<?php

namespace black_willow\bw_components\bw_controls;

class BW_Window_Controls extends \black_willow\bw_nodes\BW_Object_Node {

	private $my_button_group;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );

		$this->my_button_group = new \Ds\Map( [
				"my_close_me" => "##button type='button' class='nav-buttons closer' id='{$this->my_id}_closer' onclick='close_me(this.parentElement)'>
					close me
				</button>",
				"my_shrink_me" => "##button type='button' class='nav-buttons minimizer' id='{$this->my_id}_minimizer' onclick='shrink_me(this.parentElement)'>
					shrink me
				</button>",
				"my_expand_me" => "##button type='button' class='nav-buttons maximizer' id='{$this->my_id}_maximizer' onclick='expand_me(this.parentElement)'>
					take over the space
				</button>" ] );

		$this->my_wrapper->putAll( [
				[ "my_tag_opener" => "\n
					##nav class='$this->myclassName' id='{$this->my_id}_controls'>\n" ],
				[ "my_button_group" => $this->my_button_group ]
			]
		);

		$this->my_wrapper->put( "my_tag_closer", "##/nav>" );

	}
	public function add_a_button_to_my_controls( $with_this_label, $like_this_one ) {
		$this->my_button_group->put( $with_this_label,
				"<button type='button' class='nav-buttons $like_this_one' id='{$this->my_id}_$like_this_one'>
						$with_this_label
					</button>" );
	}
	public function get_my_controls() {
		$the_html = $this->my_wrapper->get( "my_tag_opener" );
		$the_html .= $this->my_button_group->reduce(
				function( $carry, $key, $value ) {
					return $carry . "\n##!-- $key -- >\n" . $value . "\n";
				} );
		$the_html .= $this->my_wrapper->get( "my_tag_closer");
		return $the_html;
	}
	public function remove_a_button_from_my_controls( $with_this_label ) {
		return $this->my_button_group->remove( $with_this_label );
	}
	public function add_a_windowshader_to_my_controls( $with_this_label ) {
		$this->my_button_group->put( $with_this_label,
				"<button type='button' class='nav-buttons windowshader' id='{$this->my_id}_windowshader' onclick='roll_me_up(this.parentElement)'>
						$with_this_label
					</button>" );
	}
}