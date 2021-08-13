<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TAG (info@theanhgroup.com)
 * @Copyright (C) 2018 TAG. All rights reserved
 * @Forum support https://theanhgroup.com
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Wed, 18 Oct 2018 12:00:00 GMT 
 */

if( ! defined( 'NV_MAINFILE' ) )
{
	die( 'Stop!!!' );
}

if( ! nv_function_exists( 'nv_page_one' ) )
{
	function nv_block_config_page_one( $module, $data_block, $lang_block )
	{
		global $db, $nv_Cache, $site_mods;

		$db->sqlreset()->select( 'id, title, alias, description' )->from( NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] )->where( 'status = 1' )->order( 'weight ASC' );

		$list = $nv_Cache->db( $db->sql(), 'id', $module );

		$html = '';
		$html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['title_length'] . ':</label>';
        $html .= '	<div class="col-sm-9"><input type="text" class="form-control" name="config_title_length" value="' . $data_block['title_length'] . '"/></div>';
        $html .= '</div>';
		
        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['description_length'] . ':</label>';
        $html .= '	<div class="col-sm-9"><input type="text" name="config_description_length" class="form-control" value="' . $data_block['description_length'] . '"/></div>';
        $html .= '</div>';
		
		$html .= '<div class="form-group">';
		$html .= '	<label class="control-label col-sm-6">' . $lang_block['id'] . ':</label>';

		$html .= '	<div class="col-sm-9">';
		$html .= '		<select type="text" name="config_id" class="form-control">';
		foreach( $list as $l )
		{
			$selected = ( $l['id'] == $data_block['id'] ) ? 'selected="selected"' : '';
			$html .= '		<option value="' . $l['id'] . '"  ' . $selected . '>' . $l['title'] . '</option>';
		}
		$html .= '		</select>';
		$html .= '</div>';
		$html .= '</div>';
		return $html;
	}

	function nv_block_config_page_one_submit( $module, $lang_block )
	{
		global $nv_Request;
		$return = array();
		$return['error'] = array();
		$return['config'] = array();
		$return['config']['title_length'] = $nv_Request->get_int( 'config_title_length', 'post', 60 );
		$return['config']['description_length'] = $nv_Request->get_int( 'config_description_length', 'post', 200 );
		$return['config']['id'] = $nv_Request->get_int( 'config_id', 'post', 0 );
		return $return;
	}

	/**
	 * nv_page_one()
	 *
	 * @return
	 */
	function nv_page_one( $block_config )
	{
		global $nv_Cache, $global_config, $site_mods, $db, $module_name;
		
		$module = $block_config['module'];

		if( ! isset( $site_mods[$module] ) )
		{
			return '';
		}

		$db->sqlreset()->select( 'id, title, alias, description, image, bodytext' )->from( NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] )->where( 'status = 1 AND id=' . $block_config['id'] );

		$list = $nv_Cache->db( $db->sql(), 'id', $module );

		if( ! empty( $list ) )
		{
			if( file_exists( NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/page/block.page_one.tpl' ) )
			{
				$block_theme = $global_config['module_theme'];
			}
			elseif( file_exists( NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/page/block.page_one.tpl' ) )
			{
				$block_theme = $global_config['site_theme'];
			}
			else
			{
				$block_theme = 'default';
			}

			$xtpl = new XTemplate( 'block.page_one.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/page' );
			$width = $block_config['image_width'];
			$height = $block_config['image_height'];
			foreach( $list as $l )
			{
				
				$l['title_cut'] = nv_clean60( $l['title'], $block_config['title_length'] );
				$l['description_cut'] = nv_clean60( $l['description'], $block_config['description_length'] );
				$l['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'] . $global_config['rewrite_exturl'];

				$xtpl->assign( 'ROW', $l );
			}
			$xtpl->parse( 'main' );
			return $xtpl->text( 'main' );
		}
		else
		{
			return '';
		}
	}
}
if( defined( 'NV_SYSTEM' ) )
{
	$content = nv_page_one( $block_config );
}
