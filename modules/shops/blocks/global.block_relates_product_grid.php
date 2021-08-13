<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 04/18/2017 09:47
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!nv_function_exists('nv_relates_product_grid')) {

    /**
     * nv_block_config_relates_blocks()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     *
     */
    function nv_block_config_relates_blocks_grid($module, $data_block, $lang_block)
    {
        global $nv_Cache, $db_config, $site_mods;

        $html = "<div class=\"form-group\">";
        $html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['blockid'] . "</label>";
        $html .= "	<td><select name=\"config_blockid\" class=\"form-control w200\">\n";
        $sql = "SELECT bid, " . NV_LANG_DATA . "_title," . NV_LANG_DATA . "_alias FROM " . $db_config['prefix'] . "_" . $site_mods[$module]['module_data'] . "_block_cat ORDER BY weight ASC";
        $list = $nv_Cache->db($sql, 'catid', $module);
        foreach ($list as $l) {
            $sel = ($data_block['blockid'] == $l['bid']) ? ' selected' : '';
            $html .= "<option value=\"" . $l['bid'] . "\" " . $sel . ">" . $l[NV_LANG_DATA . '_title'] . "</option>\n";
        }
        $html .= "	</select></div>\n";
        $html .= '<script type="text/javascript">';
        $html .= '	$("select[name=config_blockid]").change(function() {';
        $html .= '		$("input[name=title]").val($("select[name=config_blockid] option:selected").text());';
        $html .= '	});';
        $html .= '</script>';
        $html .= "</div>";

        $html .= "<div class=\"form-group\">";
        $html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['numrow'] . "</label>";
        $html .= "	<div class=\"col-sm-18\"><input class=\"form-control w100\" type=\"text\" name=\"config_numrow\" size=\"5\" value=\"" . $data_block['numrow'] . "\"/></div>";
        $html .= "</div>";

        $html .= "<div class=\"form-group\">";
        $html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['cut_num'] . "</label>";
        $html .= "	<div class=\"col-sm-18\"><input class=\"form-control w100\" type=\"text\" name=\"config_cut_num\" size=\"5\" value=\"" . $data_block['cut_num'] . "\"/></div>";
        $html .= "</div>";

        return $html;
    }

    /**
     * nv_block_config_relates_blocks_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     *
     */
    function nv_block_config_relates_blocks_grid_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['blockid'] = $nv_Request->get_int('config_blockid', 'post', 0);
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);
        $return['config']['cut_num'] = $nv_Request->get_int('config_cut_num', 'post', 0);
        return $return;
    }

    if (!nv_function_exists('nv_get_price_tmp')) {

        function nv_get_price_tmp($module_name, $module_data, $module_file, $pro_id)
        {
            global $nv_Cache, $db, $db_config, $module_config, $discounts_config;

            $price = array();
            $pro_config = $module_config[$module_name];

            require_once NV_ROOTDIR . '/modules/' . $module_file . '/site.functions.php';
            $price = nv_get_price($pro_id, $pro_config['money_unit'], 1, false, $module_name);

            return $price;
        }
    }

    /**
     * nv_relates_product()
     *
     * @param mixed $block_config
     * @return
     *
     */
    function nv_relates_product_grid($block_config)
    {
        global $nv_Cache, $nv_Cache, $site_mods, $global_config, $lang_module, $module_config, $module_config, $module_name, $module_info, $global_array_shops_cat, $db_config, $my_head, $db, $pro_config, $money_config, $array_wishlist_id;

        $module = $block_config['module'];
        $mod_data = $site_mods[$module]['module_data'];
        $mod_file = $site_mods[$module]['module_file'];

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $mod_file . '/block.others_product_grid.tpl')) {
            $block_theme = $global_config['module_theme'];
        } else {
            $block_theme = 'default';
        }

        if ($module != $module_name) {
            $sql = 'SELECT catid, parentid, lev, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias, viewcat, numsubcat, subcatid, numlinks, ' . NV_LANG_DATA . '_description AS description, inhome, ' . NV_LANG_DATA . '_keywords AS keywords, groups_view, typeprice FROM ' . $db_config['prefix'] . '_' . $mod_data . '_catalogs ORDER BY sort ASC';
            $list = $nv_Cache->db($sql, 'catid', $module);
            foreach ($list as $row) {
                $global_array_shops_cat[$row['catid']] = array(
                    'catid' => $row['catid'],
                    'parentid' => $row['parentid'],
                    'title' => $row['title'],
                    'alias' => $row['alias'],
                    'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $row['alias'],
                    'viewcat' => $row['viewcat'],
                    'numsubcat' => $row['numsubcat'],
                    'subcatid' => $row['subcatid'],
                    'numlinks' => $row['numlinks'],
                    'description' => $row['description'],
                    'inhome' => $row['inhome'],
                    'keywords' => $row['keywords'],
                    'groups_view' => $row['groups_view'],
                    'lev' => $row['lev'],
                    'typeprice' => $row['typeprice']
                );
            }
            unset($list, $row);

            // Css
            if (file_exists(NV_ROOTDIR . '/themes/' . $block_theme . '/css/' . $mod_file . '.css')) {
                $my_head .= '<link rel="StyleSheet" href="' . NV_BASE_SITEURL . 'themes/' . $block_theme . '/css/' . $mod_file . '.css" type="text/css" />';
            }

            // js
            if (file_exists(NV_ROOTDIR . '/themes/' . $block_theme . '/js/' . $mod_file . '.js')) {
                $my_head .= '<script src="' . NV_BASE_SITEURL . 'themes/' . $block_theme . '/js/' . $mod_file . '.js"></script>';
            }

            // Language
            if (file_exists(NV_ROOTDIR . '/modules/' . $mod_file . '/language/' . NV_LANG_DATA . '.php')) {
                require_once NV_ROOTDIR . '/modules/' . $mod_file . '/language/' . NV_LANG_DATA . '.php';
            }

            $pro_config = $module_config[$module];

            // Lay ty gia ngoai te
            $sql = 'SELECT code, currency, exchange, round, number_format FROM ' . $db_config['prefix'] . '_' . $mod_data . '_money_' . NV_LANG_DATA;
            $cache_file = NV_LANG_DATA . '_' . md5($sql) . '_' . NV_CACHE_PREFIX . '.cache';
            if (($cache = $nv_Cache->getItem($module, $cache_file)) != false) {
                $money_config = unserialize($cache);
            } else {
                $money_config = array();
                $result = $db->query($sql);
                while ($row = $result->fetch()) {
                    $money_config[$row['code']] = array(
                        'code' => $row['code'],
                        'currency' => $row['currency'],
                        'exchange' => $row['exchange'],
                        'round' => $row['round'],
                        'number_format' => $row['number_format'],
                        'decimals' => $row['round'] > 1 ? $row['round'] : strlen($row['round']) - 2,
                        'is_config' => ($row['code'] == $pro_config['money_unit']) ? 1 : 0
                    );
                }
                $result->closeCursor();
                $cache = serialize($money_config);
                $nv_Cache->setItem($module, $cache_file, $cache);
            }
        }

        $link = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=';

        $xtpl = new XTemplate('block.others_product_grid.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $mod_file);
        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('TEMPLATE', $block_theme);
        $xtpl->assign('WIDTH', $pro_config['homewidth']);
        $xtpl->assign('BLOCK_TITLE', $block_config['title']);
		$xtpl->assign('MODULE_NAME', $module);
        $db->sqlreset()
            ->select('t1.id, t1.listcatid, t1.' . NV_LANG_DATA . '_title AS title, t1.' . NV_LANG_DATA . '_alias AS alias, t1.addtime, t1.homeimgfile, t1.homeimgthumb, t1.product_price, t1.money_unit, t1.discount_id, t1.showprice, t1.product_number, t1.in_stock')
            ->from($db_config['prefix'] . '_' . $mod_data . '_rows t1')
            ->join('INNER JOIN ' . $db_config['prefix'] . '_' . $mod_data . '_block t2 ON t1.id = t2.id')
            ->where('t2.bid= ' . $block_config['blockid'] . ' AND t1.status =1')
            ->order('t1.addtime DESC, t2.weight ASC')
            ->limit($block_config['numrow']);

        $list = $nv_Cache->db($db->sql(), 'id', $module);

        $i = 1;
        $cut_num = $block_config['cut_num'];
		$dee1 = 1;
		$dee2 = 1;
		$tongcong = count($list);
        foreach ($list as $row) {
			//rating
					$db->sqlreset()
					  ->select('rating')
					  ->from($db_config['prefix'] . "_" . $mod_data . "_review")
					  ->where("product_id=" . $row['id'] . " AND status=1");
					$review = $db->query($db->sql())->fetchAll();
					$count = 0;
					$demrating = 0;
					foreach($review as $rw)
					{
						$demrating = $demrating + $rw['rating'];
						$count++;
					}
					if($count > 0)
					{
						$rating_tb = ceil($demrating / $count);
					}
					else{
						$rating_tb = $demrating;
					}
					if($rating_tb == 5)
					{
						for ($a = 1; $a <= $rating_tb; $a++) {
							$xtpl->parse('main.loop.star');
						}		
					}
					else{
						for ($a = 1; $a <= $rating_tb; $a++) {
							$xtpl->parse('main.loop.star');
							
						}
						$conlai = 5 - $rating_tb;
						for ($a = 1; $a <= $conlai; $a++) {
							$xtpl->parse('main.loop.star1');
							
						}
					}
					
				///end rating
            if ($row['homeimgthumb'] == 1) {
                // image thumb

                $src_img = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $row['homeimgfile'];
            } elseif ($row['homeimgthumb'] == 2) {
                // image file

                $src_img = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $row['homeimgfile'];
            } elseif ($row['homeimgthumb'] == 3) {
                // image url

                $src_img = $row['homeimgfile'];
            } else {
                // no image

                $src_img = NV_BASE_SITEURL . 'themes/' . $block_theme . '/images/shops/no-image.jpg';
            }
			if ($row['in_stock'] == 1) {
				$row['product_status'] = $lang_module ['product_is_available'];
				$row['product_status_class'] = 'san-hang';
				$row['product_available'] = 'InStock';
			} elseif ($row['in_stock'] == 2) {
				$row['product_status'] = $lang_module ['product_is_order'];
				$row['product_status_class'] = 'dat-truoc';
				$row['product_available'] = 'PreOrder';
			} elseif ($row['in_stock'] == 3) {
				$row['product_status'] = $lang_module ['product_is_out'];
				$row['product_status_class'] = 'het-hang';
				$row['product_available'] = 'OutOfStock';
			}
			
			$xtpl->assign('product_status', $row['product_status']);
			$xtpl->assign('product_status_class', $row['product_status_class']);
            $xtpl->assign('id', $row['id']);
            $xtpl->assign('link', $link . $row['alias']);
            $xtpl->assign('title', nv_clean60($row['title'], $cut_num));
            $xtpl->assign('src_img', $src_img);
            $xtpl->assign('time', nv_date('d-m-Y h:i:s A', $row['addtime']));

            if ($pro_config['active_order'] == '1' and $pro_config['active_order_non_detail'] == '1') {
                if ($row['showprice'] == '1') {
                    if ($row['product_number'] > 0) {
                        $xtpl->parse('main.loop.order');
                    } else {
                        $xtpl->parse('main.loop.product_empty');
                    }
                }
            }

            if ($pro_config['active_price'] == '1') {
                if ($row['showprice'] == '1') {
                    $price = nv_get_price_tmp($module, $mod_data, $mod_file, $row['id']);
                    // var_dump($price); die;
                    $xtpl->assign('PRICE', $price);
                    if ($row['discount_id'] and $price['discount_percent'] > 0) {
						$xtpl->parse('main.loop.label_discount');
                        $xtpl->parse('main.loop.labelgiamgia');
                        $xtpl->parse('main.loop.price.discounts');
                    } else {
                        $xtpl->parse('main.loop.price.no_discounts');
                    }
                    $xtpl->parse('main.loop.price');
                } else {
                    $xtpl->parse('main.loop.contact');
                }
            }

            // San pham yeu thich
            if ($pro_config['active_wishlist']) {
                if (!empty($array_wishlist_id)) {
                    if (in_array($row['id'], $array_wishlist_id)) {
                        $xtpl->parse('main.loop.wishlist.disabled');
                    }
                }
                $xtpl->parse('main.loop.wishlist');
            }
			if($dee1 == 1)
			{
				$xtpl->assign('block1', '<div class="item saler_item">');
				$xtpl->assign('block11', '<div class="owl_item_product product-col-1">');
				$dee1++;
				
			}
			else{
				$xtpl->assign('block1', '');
				$xtpl->assign('block11', '');
				$dee1 = 1;
				
			}
			if($dee2 == 1)
			{
				$xtpl->assign('block2', '');
				$xtpl->assign('block21', '');
				$dee2++;
				
			}
			else{
				$xtpl->assign('block2', '</div>');
				$xtpl->assign('block21', '</div>');
				$dee2 = 1;
				
			}
			$tongcong--;
			if($tongcong == 0)
			{
				$xtpl->assign('block2', '</div>');
			}
            $xtpl->parse('main.loop');
            ++$i;
        }

        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_relates_product_grid($block_config);
}
