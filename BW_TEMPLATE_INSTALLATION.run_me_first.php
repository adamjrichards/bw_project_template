<?php

namespace bw_template;

// The location and name of this folder provide the naming information for the whole system.

$the_site_location = mb_strtolower( getcwd() );
$the_site_folder = \array_pop( \mb_split( $the_site_location, "/" ) );
$the_site_full_name = \mb_split( $the_site_folder, "_", 1 );
$the_site_prefix = \array_shift( $the_site_full_name );
$the_site_name = \join( $the_site_full_name );

$the_json_source = get_file_contents( "BW_FOLDER_NAME_DEFAULTS.json" );
$the_json = \json_decode( $the_json_source, TRUE );

$the_object_naming_conventions = $the_json[ "object_naming_conventions" ];
$the_oncs = &$the_object_naming_conventions;
$the_javascript_subsystem_naming_conventions = $the_json[ "javascript_subsystem_naming_conventions" ];
$the_jncs = &$the_object_naming_conventions;
$the_file_system_tree = $the_json[ "file_system_tree" ];
$the_fst = &$the_file_system_tree;
$the_top_level_files = $the_fst[ "top_level_files" ];
$the_top_level_folders = $the_fst[ "top_level_folders" ];

$the_default_folder_content_types = $the_json[ "default_folder_content_types" ];
$the_dfcts = &$the_default_folder_content_types;

function check_the_top_level_files() {
	$the_folder_contents = \scandir( $the_top_level_files );
	foreach( $the_top_level_files as $this_particular_file ) {
		if ( \array_search( $this_particular_file, $the_folder_contents ) == FALSE ) {
			// download the missing file
		}
	}
}
function check_the_top_level_folders() {
	$the_root_folder_contents = \scandir( "\\" );
	foreach( $the_top_level_folders as $this_particular_folder ) {
		if ( \array_search( $this_particular_folder, $the_root_folder_contents ) == FALSE ) {
			// download the missing folder
		}
	}
}

function rename_all_the_items_in_the_folder( $the_folder ) {
	$the_folders_items = \scandir( $the_folder );
	foreach( $the_folders_items as $this_particular_item ) {
		if ( is_dir( $this_particular_item ) ) {
			\rename_all_the_items_in_the_folder( $this_particular_item );
			$the_new_name = $the_site_prefix . $this_particular_item;
			\rename( $this_particular_item, $the_new_name );
		} else {
			\rename_the_file_according_to_the_oncs( $this_particular_item, $the_folder );
		}
	}
}

function rename_the_file_according_to_the_oncs( $the_file, $the_folder ) {
	switch( $the_folder ) {
		case "_core": \rename_as_a_core_class( $the_file );
			break;
		case "_black_boxes" :
		case "_classes" :
		case "_components":
		case "_containers":
		case "_content":
		case "_errex" :
		case "_system" :
		case "_tags" : \rename_as_an_instantiable_class( $the_file );
			break;
		case "_assets":
		case "_css":
		case "_data":
		case "_functions":
		case "_json":
		case "_static_pages":
		case "_utilities" :
		case "_svg":	\rename_as_a_simple_codepage( $the_file );
			break;
		case "_js": \rename_according_js_subsystem_conventions();
			break;
		default: \replace_the_prefix( $the_file );
	}
}

function rename_the_js_file_according_to_the_jncs( $the_file, $the_folder ) {
	switch( $the_folder ) {
		case "_core": \rename_as_a_core_class( $the_file );
			break;
		case "_components":
		case "_event" :
		case "_errex" : \rename_as_an_instantiable_class( $the_file );
			break;
		case "_handlers": \rename_as_an_abstract_class( $the_file );
			break;
		case "_libraries":
		case "_system":
		case "_workers": \rename_as_a_simple_codepage( $the_file );
			break;
		default: \replace_the_prefix( $the_file );
	}
}
function rename_as_an_instantiable_class( $the_file, $the_folder ) {
	$this_prefix = \mb_strtoupper( $the_site_prefix );
	$the_file_names = \explode( "_", $the_file );
	$the_new_name = "";
	foreach( $the_file_name as $this_word ) {
		$the_initial = \mb_strtoupper( \array_shift( $this_word ) );
		$the_new_name .= $the_initial . $this_word;
	}
	\rename( $the_file, $the_new_name );
}
function rename_as_an_abstract_class( $the_file, $the_folder ) {
	$this_prefix = \mb_strtolower( $the_site_prefix );
	$the_file_names = \explode( "_", $the_file );
	$the_new_name = "";
	foreach( $the_file_name as $this_word ) {
		$the_initial = \mb_strtoupper( \array_shift( $this_word ) );
		$the_new_name .= $the_initial . $this_word;
	}
	\rename( $the_file, $the_new_name );
}
function rename_as_a_simple_codepage( $the_file, $the_folder ) {
	$the_initial = \mb_strtoupper( \array_shift( $this_word ) );
	$the_new_name .= "$the_initial\_$this_word";
	\rename( $the_file, $the_new_name );
}
function replace_the_prefix( $the_file ) {
	$the_name_with_no_prefix = \mb_strstr( $the_file, "_" );
	$the_new_name .= "$the_prefix\_$the_name_with_no_prefix";
	\rename( $the_file, $the_new_name );
}
Function rename_according_js_subsystem_conventions( $the_js_folder ) {

	$the_folder_items = \scandir( $the_js_folder );
	foreach( $the_folder_items as $this_particular_item ) {
		if ( is_dir( $this_particular_item ) ) {
			\rename_all_the_items_in_the_folder( $this_particular_item );
			$the_new_name = $the_site_prefix . $this_particular_item;
			\rename( $this_particular_item, $the_new_name );
		} else {
			\rename_the_file_according_to_the_jsncs( $this_particular_item, $the_folder );
		}
	}
}
echo( "Starting..." );