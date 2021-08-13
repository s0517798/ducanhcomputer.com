<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DANGDINHTU (dlinhvan@gmail.com)
 * @Copyright (C) 2013 Webdep24.com. All rights reserved
 * @Forum support https://forum.nuke.vn/
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Mon, 20 Oct 2014 14:00:59 GMT
 */

if( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

if( ! nv_function_exists( 'nv_product_sub_by_cat' ) )
{
	if( ! nv_function_exists( 'product_subcat' ) )
	{
		function product_subcat( $global_array_shops_cat, $list_sub )
		{
			global $global_config, $module_file, $module_name, $module_info;

			if( file_exists( NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $module_file . '/block.sub_by_cat.tpl' ) )
			{
				$block_theme = $global_config['site_theme'];
			}
			else
			{
				$block_theme = 'default';
			}

			$xtpl = new XTemplate( 'block.sub_by_cat.tpl', NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $module_file );

			if( empty( $list_sub ) )
			{
				return '';
			}
			else
			{
				$list = explode( ',', $list_sub );

				foreach( $global_array_shops_cat as $cat )
				{
					$catid = $cat['catid'];
					if( in_array( $catid, $list ) )
					{
						$cat = $global_array_shops_cat[$catid];
						$cat['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $cat['alias'];
						$xtpl->assign( 'MENUTREE', $cat );

						if( ! empty( $global_array_shops_cat[$catid]['subcatid'] ) )
						{
							$tree = product_subcat( $global_array_shops_cat, $global_array_shops_cat[$catid]['subcatid'] );

							$xtpl->assign( 'TREE_CONTENT', $tree );
							$xtpl->parse( 'tree.tree_content' );
						}

						$xtpl->parse( 'tree' );
					}
				}

				return $xtpl->text( 'tree' );
			}
		}
	}

	function nv_product_sub_by_cat( $module, $block_config )
	{
		global $module_data, $module_name, $catid, $module_file, $global_array_shops_cat, $global_config, $lang_module, $module_config, $module_info;

		if( file_exists( NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $module_file . '/block.sub_by_cat.tpl' ) )
		{
			$block_theme = $global_config['site_theme'];
		}
		else
		{
			$block_theme = 'default';
		}

		$xtpl = new XTemplate( 'block.sub_by_cat.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $module_file );

		$xtpl->assign( 'LANG', $lang_module );

		if( isset( $global_array_shops_cat[$catid] ) )
		{
			$subcatid = array_filter( explode( ',', $global_array_shops_cat[$catid]['subcatid'] ) );

			if( empty( $subcatid ) )
			{
				$_parentid = isset( $global_array_shops_cat[$catid] ) ? $global_array_shops_cat[$catid]['parentid'] : 0;
				if( isset( $global_array_shops_cat[$_parentid]['subcatid'] ) )
				{
					$subcatid = array_filter( explode( ',', $global_array_shops_cat[$_parentid]['subcatid'] ) );
				}
			}
			if( ! empty( $subcatid ) )
			{
				foreach( $subcatid as $_catid )
				{
					$cat = $global_array_shops_cat[$_catid];

					$cat['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $cat['alias'];
					if( ! empty( $cat['subcatid'] ) )
					{
						$html_content = product_subcat( $global_array_shops_cat, $cat['subcatid'] );
						$xtpl->assign( 'HTML_CONTENT', $html_content );
						$xtpl->parse( 'main.cat.loopcat1.cat2' );
					}
					$xtpl->assign( 'CAT', $cat );
					$xtpl->parse( 'main.cat.loopcat1' );
				}
				$xtpl->parse( 'main.cat' );
			}

		}
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
}

if( defined( 'NV_SYSTEM' ) )
{
	$module = $block_config['module'];
	$content = nv_product_sub_by_cat( $module, $block_config );
}
