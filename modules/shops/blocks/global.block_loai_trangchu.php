<?php

/**
 * @Project NUKEVIET 4.x
* @Author VINADES.,JSC (contact@vinades.vn)
* @Copyright (C) 2014 VINADES., JSC. All rights reserved
* @License GNU/GPL version 2 or any later version
* @Createdate 3/9/2010 23:25
*/
if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (! nv_function_exists('nv_relates_product3')) {

    /**
     * nv_block_config_relates_blocks()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     *
     */
    function nv_block_config_relates_blocks3($module, $data_block, $lang_block)
    {
        global $nv_Cache, $db_config, $site_mods;

        $html .= "<div class=\"form-group\">";
		$html .= "	<label class=\"control-label col-sm-6\">Loại sản phẩm</label>";
        $html .= "	<div class=\"col-sm-18\">";
        $sql = "SELECT catid, " . NV_LANG_DATA . "_title," . NV_LANG_DATA . "_alias, lev FROM " . $db_config['prefix'] . "_" . $site_mods[$module]['module_data'] . "_catalogs ORDER BY sort ASC";

        $list = $nv_Cache->db($sql, 'catid', $module);
		
        foreach ($list as $l) {
			$xtitle_i = '';
			$first = '';
			if ($l['lev'] > 0) {
				for ($i = 1; $i <= $l['lev']; ++$i) {
					$xtitle_i .= '- - - - ';
				}
				$first = '|';
            }
			
			$html .= $first . $xtitle_i . '<label><input type="checkbox" name="config_catid[]" value="' . $l['catid'] . '" ' . ((in_array($l['catid'], $data_block['catid'])) ? ' checked="checked"' : '') . '</input>' . $l[NV_LANG_DATA . '_title'] . '</label><br />';
			
        }
		/* Thêm hình (banner) vào block */
		$existhinh1 = NV_BASE_SITEURL . NV_UPLOADS_DIR;
		if (! empty($data_block['hinh1']) and file_exists(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $data_block['hinh1'])) {
            $urlimg1 = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $data_block['hinh1'];
        }
		else{
		
			$urlimg1 = NV_BASE_SITEURL . NV_UPLOADS_DIR;
		}
		
		$existhinh2 = NV_BASE_SITEURL . NV_UPLOADS_DIR;
		if (! empty($data_block['hinh2']) and file_exists(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $data_block['hinh2'])) {
            $urlimg2 = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $data_block['hinh2'];
        }
		else{
		
			$urlimg2 = NV_BASE_SITEURL . NV_UPLOADS_DIR;
		}
        $html .= "</div>";
        $html .= "</div>";
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
		
		$html .= "<div class=\"form-group\">";
		$html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['hinh1'] . "</label>";
		$html .= "<div class=\"col-sm-18\">";
		$html .=	"<div class=\"input-group w400\">";
		$html .=		"<input class=\"form-control\" type=\"text\" name=\"config_hinh1\" value=\"" . $urlimg1 ."\" id=\"hinh1\" /> ";
		$html .= "		<span class=\"input-group-btn\">";
		$html .=			"<button class=\"btn btn-default selectfile\" data-area=\"hinh1\" data-currentpath=\"". $existhinh1 ."\" type=\"button\">";
		$html .=				"<em class=\"fa fa-folder-open-o fa-fix\"></em>";
		$html .=			"</button>";
		$html .= 		"</span>";
		$html .= 	"</div>";
        $html .= "</div>";
        $html .= "</div>";

		$html .= "<div class=\"form-group\">";
        $html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['link1'] . "</label>";
        $html .= "	<div class=\"col-sm-18\"><input class=\"form-control w400\" type=\"text\" name=\"config_link1\" size=\"5\" value=\"" . $data_block['link1'] . "\"/></div>";
        $html .= "</div>";
		
		$html .= "<div class=\"form-group\">";
        $html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['alt1'] . "</label>";
        $html .= "	<div class=\"col-sm-18\"><input class=\"form-control w400\" type=\"text\" name=\"config_alt1\" size=\"5\" value=\"" . $data_block['alt1'] . "\"/></div>";
        $html .= "</div>";
		
		$html .= "<div class=\"form-group\">";
		$html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['hinh2'] . "</label>";
		$html .= "<div class=\"col-sm-18\">";
		$html .=	"<div class=\"input-group w400\">";
		$html .=		"<input class=\"form-control\" type=\"text\" name=\"config_hinh2\" value=\"" . $urlimg2 ."\" id=\"hinh2\" /> ";
		$html .= "		<span class=\"input-group-btn\">";
		$html .=			"<button class=\"btn btn-default selectfile\" data-area=\"hinh2\" data-currentpath=\"". $existhinh2 ."\" type=\"button\">";
		$html .=				"<em class=\"fa fa-folder-open-o fa-fix\"></em>";
		$html .=			"</button>";
		$html .= 		"</span>";
		$html .= 	"</div>";
        $html .= "</div>";
        $html .= "</div>";
		
		$html .= "<div class=\"form-group\">";
        $html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['link2'] . "</label>";
        $html .= "	<div class=\"col-sm-18\"><input class=\"form-control w400\" type=\"text\" name=\"config_link2\" size=\"5\" value=\"" . $data_block['link2'] . "\"/></div>";
        $html .= "</div>";
				
		$html .= "<div class=\"form-group\">";
        $html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['alt2'] . "</label>";
        $html .= "	<div class=\"col-sm-18\"><input class=\"form-control w400\" type=\"text\" name=\"config_alt2\" size=\"5\" value=\"" . $data_block['alt2'] . "\"/></div>";
        $html .= "</div>";
		
		$html .='<script type="text/javascript">';
		$html .='$(document).ready(function() {';
		$html .='$(".selectfile").click(function() {';
		$html .='var area = $(this).data(\'area\');';
		$html .='var path = "' . NV_UPLOADS_DIR .'";';
		$html .='var currentpath = $(this).data(\'currentpath\');';
		$html .='var type = "image";';
		$html .='nv_open_browse(script_name + "?" + nv_name_variable';
		$html .='+ "=upload&popup=1&area=" + area + "&path="';
		$html .=							'+ path + "&type=" + type + "&currentpath="';
		$html .=							'+ currentpath, "NVImg", 850, 420,';
		$html .=							'"resizable=no,scrollbars=no,toolbar=no,location=no,status=no");';
		$html .=					'return false;';
		$html .=				'});';
		$html .=			'});';
		$html .=	'	</script>';
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
    function nv_block_config_relates_blocks_submit3($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
		$return['config']['catid'] = $nv_Request->get_array('config_catid', 'post', array());
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);
        $return['config']['cut_num'] = $nv_Request->get_int('config_cut_num', 'post', 0);
		
		$return['config']['hinh1'] = '';
		$hinh1 = $nv_Request->get_title('config_hinh1', 'post', '');
        
        if (! empty($hinh1) and file_exists(NV_ROOTDIR . $hinh1)) {
            $lu1 = strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/');
            $return['config']['hinh1'] = substr($hinh1, $lu1);
        }
		$return['config']['link1'] = $nv_Request->get_string('config_link1', 'post', '');
		$return['config']['alt1'] = $nv_Request->get_string('config_alt1', 'post', '');
		
		$return['config']['hinh2'] = '';
		$hinh2 = $nv_Request->get_title('config_hinh2', 'post', '');
        
        if (! empty($hinh2) and file_exists(NV_ROOTDIR . $hinh2)) {
            $lu2 = strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/');
            $return['config']['hinh2'] = substr($hinh2, $lu2);
        }
		$return['config']['link2'] = $nv_Request->get_string('config_link2', 'post', '');
		$return['config']['alt2'] = $nv_Request->get_string('config_alt2', 'post', '');
        return $return;
    }

   
    if (! nv_function_exists('nv_get_price_tmp')) {

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
	function get_youtube_id_from_url($url)  {
		preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);
		return $results[6];
	}
    function nv_relates_product3($block_config)
    {
        global $nv_Cache, $nv_Cache, $site_mods, $global_config, $lang_module, $module_config, $module_config, $module_name, $module_info, $global_array_shops_cat, $db_config, $my_head, $db, $pro_config, $money_config, $array_wishlist_id;

        $module = $block_config['module'];
        $mod_data = $site_mods[$module]['module_data'];
        $mod_file = $site_mods[$module]['module_file'];

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $mod_file . '/block.loai_trangchu.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        if ($module != $module_name) {
		
		
            $sql = 'SELECT catid, parentid, image, lev, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias, viewcat, numsubcat, subcatid, numlinks, ' . NV_LANG_DATA . '_description AS description, inhome, ' . NV_LANG_DATA . '_keywords AS keywords, groups_view, typeprice FROM ' . $db_config['prefix'] . '_' . $mod_data . '_catalogs ORDER BY sort ASC';
            $list = $nv_Cache->db($sql, 'catid', $module);
            foreach ($list as $row) {
                $global_array_shops_cat[$row['catid']] = array(
                    'catid' => $row['catid'],
                    'parentid' => $row['parentid'],
                    'image' => $row['image'],
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

        $xtpl = new XTemplate('block.loai_trangchu.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $mod_file);
        $xtpl->assign('MODULE_NAME', $module);
        $xtpl->assign('TEMPLATE', $block_theme);
        $xtpl->assign('BLOCK_TITLE', $block_config['title']);
        $xtpl->assign('BLOCK_ID', $block_config['bid']);
        $xtpl->assign('LANG', $lang_module);
		$xtpl->assign('MODULE_NAME', $module);
        $xtpl->assign('LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $row['alias']);
        $xtpl->assign('WIDTH', $pro_config['homewidth']);
		$xtpl->assign('hinh1bnn', NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $block_config['hinh1']);
		$xtpl->assign('hinh2bnn', NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $block_config['hinh2']);
		if(!empty($block_config['hinh1'])){
			$xtpl->assign('link1bnn', $block_config['link1']);
			$xtpl->assign('alt1bnn', $block_config['alt1']);
			$xtpl->parse('main.banner.banner1');
			$xtpl->parse('main.banner');
		}
		
		//print_r($block_config);
		if(!empty($block_config['link2'])){
			$xtpl->assign('link2bnn', get_youtube_id_from_url($block_config['link2']));
			$xtpl->assign('alt2bnn', $block_config['alt2']);
			$xtpl->parse('main.banner.banner2');
			$xtpl->parse('main.banner');
		}
		$as;
		if(!empty($block_config['catid']))
		{
			
			$arr = implode(',' ,$block_config['catid']);
			$db->sqlreset()
			->select('t1.id, t1.listcatid, t1.' . NV_LANG_DATA . '_title  AS title , t1.' . NV_LANG_DATA . '_hometext AS hometext, t1.' . NV_LANG_DATA . '_alias AS alias, t1.addtime, t1.homeimgfile, t1.homeimgthumb, t1.product_price, t1.money_unit, t1.discount_id, t1.showprice, t1.product_number, t1.in_stock, t1.gift_from, t1.gift_to, t1.' . NV_LANG_DATA . '_gift_content')
			->from($db_config['prefix'] . '_' . $mod_data . '_rows t1')
			->join('INNER JOIN ' . $db_config['prefix'] . '_' . $mod_data . '_catalogs t2 ON t1.listcatid = t2.catid')
			->where('t2.catid IN (' . $arr . ') AND t1.status =1')
			->order('t1.id DESC')
			->limit($block_config['numrow']);
			$list = $nv_Cache->db($db->sql(), 'id', $module);
			$cut_num = $block_config['cut_num'];
			
			if(!empty($list))
			{
				$dem = 1;
				foreach($block_config['catid'] as $bid)
				{
					
					if(!empty($global_array_shops_cat[$bid]['image']))
					{
						$icon = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $global_array_shops_cat[$bid]['image'];
						$xtpl->assign('icon', $icon);
						$xtpl->parse('main.loopcatid.image');
					}
					$xtpl->assign('data', $global_array_shops_cat[$bid]);
					if($dem == 1)
					{
						$xtpl->parse('main.loopcatid1');
						$dem++;
					}
					else
					{
						$xtpl->parse('main.loopcatid');
					}
				}
				$dee1 = 1;
				$dee2 = 1;
				$tongcong = count($list);
				foreach ($list as $row) {
					$dee = $dee1;
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

						$src_img = NV_BASE_SITEURL . 'themes/' . $global_config['site_theme'] . '/images/shops/no-image.jpg';
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
					$xtpl->assign('hometext', $row['hometext']);
					$xtpl->assign('link', $link . $row['alias']);
					$xtpl->assign('title', nv_clean60($row['title'], $cut_num));
					$xtpl->assign('src_img', $src_img);
					$xtpl->assign('time', nv_date('d-m-Y h:i:s A', $row['addtime']));
					$xtpl->assign('hometext', $row['hometext']);
					if ($pro_config['active_order'] == '1' and $pro_config['active_order_non_detail'] == '1') {
						if ($row['showprice'] == '1') {
							if ($row['product_number'] > 0) {
								$xtpl->parse('main.loop.order');
							} else {
								$xtpl->parse('main.loop.product_empty');
							}
						}
					}
					if ($pro_config['active_gift'] and !empty($row[NV_LANG_DATA . '_gift_content']) and NV_CURRENTTIME >= $row['gift_from'] and NV_CURRENTTIME <= $row['gift_to']) {
						$xtpl->parse('main.loop.gift');
					}
					
					if ($pro_config['active_price'] == '1') {
						if ($row['showprice'] == '1') {
							$price = nv_get_price_tmp($module, $mod_data, $mod_file, $row['id']);

							$xtpl->assign('PRICE', $price);
							if ($row['discount_id'] and $price['discount_percent'] > 0) {
								$xtpl->parse('main.loop.labelgiamgia');
								$xtpl->parse('main.loop.price.discounts');
								$xtpl->parse('main.loop.price1.discounts');
							} else {
								$xtpl->parse('main.loop.price.no_discounts');
								$xtpl->parse('main.loop.price1.no_discounts');
							}
							$xtpl->parse('main.loop.price');
							$xtpl->parse('main.loop.price1');
						} else {
							$xtpl->parse('main.loop.contact');
							$xtpl->parse('main.loop.contact1');
						}
					}

					// San pham yeu thich
					if ($pro_config['active_wishlist']) {
						if (! empty($array_wishlist_id)) {
							if (in_array($row['id'], $array_wishlist_id)) {
								$xtpl->parse('main.loop.wishlist.disabled');
							}
						}
						$xtpl->parse('main.loop.wishlist');
					}
					if($dee1 == 1)
					{
						$xtpl->assign('block1', '<div class="item saler_item">');
						$dee1++;
						
					}
					else{
						$xtpl->assign('block1', '');
						$dee1 = 1;
						
					}
					if($dee2 == 1)
					{
						$xtpl->assign('block2', '');
						$dee2++;
						
					}
					else{
						$xtpl->assign('block2', '</div>');
						$dee2 = 1;
						
					}
					$tongcong--;
					if($tongcong == 0)
					{
						$xtpl->assign('block2', '</div>');
					}
					$xtpl->parse('main.loop');
				}
			}
		}
        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_relates_product3($block_config);
}
