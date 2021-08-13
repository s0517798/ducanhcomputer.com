<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/owl.carousel.min.css"/>

<div class="section_choose_private section_base">
	<div class="border_bottom_title clearfix">
	</div>
	<div class="title_top_menu">
		<h3>{BLOCK_TITLE}</h3>
	</div>				
	<div class="content_sec clearfix">
		<div class="prd_sec">
			<div class="products owl-carousel owl-theme products-view-grid" data-nav="true" data-lg-items="3" data-md-items="2" data-sm-items="2" data-xs-items="1" data-margin="15">
				<!-- BEGIN: loop -->
				{block1}
				{block11}
					
				<div class="product-box-h product-box-1">
					<div class="row">
						<div class="col-sm-10 col-xs-10 col-xs-left-f">
							<div class="product-thumbnail">
								<a rel="nofollow" class="image_link display_flex" href="{link}" title="{title}">
									<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/rolling.svg" data-lazyload="{src_img}" alt="{title}">
								</a>
								<!-- BEGIN: labelgiamgia -->
								<div class="tagdacbiet_sale sale-flash">
									<div class="font16">
										- {PRICE.giamgia}%
									</div>
								</div>
								<!-- END: labelgiamgia -->
								<div class="status-pro {product_status_class}">
									{product_status}
								</div>
							</div>
						</div>
						<div class="col-sm-14 col-xs-14 col-xs-right-f pad-col-15">
							<div class="product-info a-left">
								<h3 class="product-name"><a href="{link}" title="{title}">{title}</a></h3>
								<div class="web-product-reviews-badge">
									<!-- BEGIN: star -->
									<i class="fa fa-star star-yellow" aria-hidden="true"></i>
									<!-- END: star -->
									<!-- BEGIN: star1 -->
									<i class="fa fa-star star-none" aria-hidden="true"></i>
									<!-- END: star1 -->
								</div>
								<div class="product-hide">
									<div class="price-box clearfix">
										<!-- BEGIN: price -->
										<!-- BEGIN: discounts -->
										<div class="special-price">
											<span class="price product-price">
												{PRICE.sale_format} {PRICE.unit}
											</span>
										</div>
										<div class="old-price">															 
											<span class="price product-price-old">
												{PRICE.price_format} {PRICE.unit}
											</span>
										</div>
										<!-- END: discounts -->
										<!-- BEGIN: no_discounts -->
										<div class="special-price">
											<span class="price product-price">
												{PRICE.sale_format} {PRICE.unit}
											</span>
										</div>
										<!-- END: no_discounts -->
										<!-- END: price -->
										<!-- BEGIN: contact -->
										<div class="special-price">
											<span class="price product-price">
												{LANG.price_contact}
											</span>
										</div>
										<!-- END: contact -->
									</div>
								</div>
								<div class="product-action clearfix hidden-xs">
									<div class="variants form-nut-grid">
										<!-- BEGIN: order -->
										<button class="btn-buy btn-cart btn btn-circle left-to " data-id="{id}" onclick="cartorder_block(this, 0, 0, '{MODULE_NAME}'); return !1;" title="Thêm vào giỏ hàng">
											<i class="fa fa-shopping-basket"></i>Mua ngay
										</button>
										<!-- END: order -->
										<!-- BEGIN: product_empty -->
										<button class="btn-buy btn-cart btn btn-circle left-to btn-danger disabled" title="{LANG.product_empty}">
											<i class="fa fa-cart-arrow-down"></i>{LANG.product_empty}
										</button>
										<!-- END: product_empty -->
										<a rel="nofollow" title="Xem nhanh" href="{link}" class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm hidden-md">
											<i class="fa fa-eye"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				{block21}
				{block2}
				<!-- END: loop -->
			</div>
		</div>
	</div>
</div>
<script>
$(function() {
	$(".owl_product_item_content .saler_item").each(function() {
		var _this = $(this).find('.owl_item_product .product-box');
		var this_thumb = $(_this).find('.product-thumbnail .image_link img');
		var default_this_thumb = $(_this).find('.product-thumbnail .image_link').attr('data-images');
		var this_mini_thumb = $(_this).find('.action_image .owl_image_thumb_item .product_image_list .item_image');
		$(this_mini_thumb)
			.mouseover(function() { 
			var this_s = $(this).attr('data-image');
			this_thumb.attr('src', this_s);
		})
			.mouseout(function() {
			this_thumb.attr('src', default_this_thumb);
		});
	});
});
</script>
<script>
function cartorder_block(a_ob, popup, buy_now, modulename) {
    var num = 1;
    var id = $(a_ob).attr("data-id");
    var group = '';
    var label = '';

    var i = 0;
    $('.itemsgroup').each(function() {
        if ($('input[name="groupid[' + $(this).data('groupid') + ']"]:checked').length == 0) {
            i++;
            if (i == 1) {
                label = label + $(this).data('header');
            } else {
                label = label + ', ' + $(this).data('header');
            }
        }
    });
    if (label != '') {
        $('#group_error').css('display', 'block');
        $('#group_error').html(detail_error_group + ' <strong>' + label + '</strong>');
        resize_popup();
        return false;
    }

    i = 0;
    $('.groupid').each(function() {
        if ($(this).is(':checked')) {
            i++;
            if (i == 1) {
                group = group + $(this).val();
            } else {
                group = group + ',' + $(this).val();
            }
        }
    });

    $.ajax({
        type: "POST",
        url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + modulename + '&' + nv_fc_variable + '=setcart' + '&id=' + id + "&group=" + group + "&nocache=" + new Date().getTime(),
        data: 'num=' + num,
        success: function(data) {
            var s = data.split('_');
            var strText = s[1];
            if (strText != null) {
                var intIndexOfMatch = strText.indexOf('#@#');
                while (intIndexOfMatch != -1) {
                    strText = strText.replace('#@#', '_');
                    intIndexOfMatch = strText.indexOf('#@#');
                }
                alert_msg(strText);
                $("#cart_" + modulename).load(nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + modulename + '&' + nv_fc_variable + '=loadcart');
                if (buy_now) {
                    parent.location = nv_base_siteurl + "index.php?" + nv_lang_variable + "=" + nv_lang_data + "&" + nv_name_variable + "=" + modulename + "&" + nv_fc_variable + "=cart";
                } else if (popup) {
                    parent.location = parent.location;
                }
            }
        }
    });
}
function alert_msg(msg) {
    $('body').removeClass('.msgshow').append('<div class="msgshow" id="msgshow">&nbsp;</div>');
    $('#msgshow').html(msg);
    $('#msgshow').show('slide').delay(3000).hide('slow');
}
</script>
<!-- END: main -->