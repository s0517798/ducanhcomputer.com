<!-- BEGIN: main -->
<div class="row">
    <!-- BEGIN: loop -->
    <div class="col-sm-12 col-md-{NUM}">
        <div class="product-box-h">
			<div class="product-thumbnail">
				<a class="image_link display_flex" href="{ROW.link_pro}" title="{ROW.title}">
				<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/rolling.svg" data-lazyload="{ROW.homeimgthumb}" alt="{ROW.title}">
				</a>
				<!-- BEGIN: labelgiamgia -->
				<div class="tagdacbiet_sale sale-flash">
					<div class="font16">
						- {PRICE.giamgia}%
					</div>
				</div>
				<!-- END: labelgiamgia -->
				<div class="status-pro {ROW.product_status_class}">
					{ROW.product_status}
				</div>
			</div>
			<div class="product-info a-left">
				<h3 class="product-name"><a class="height_name text2line" href="{ROW.link_pro}" title="{ROW.title}">{ROW.title}</a></h3>
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
						<button class="btn-buy btn-cart btn btn-circle left-to " data-id="{ROW.id}" onclick="cartorder_block(this, 0, 0, '{MODULE_NAME}'); return !1;" title="Thêm vào giỏ hàng">
							<i class="fa fa-shopping-basket"></i>Mua ngay
						</button>
						<!-- END: order -->
						<!-- BEGIN: product_empty -->
						<button class="btn-buy btn-cart btn btn-circle left-to btn-danger disabled" title="{LANG.product_empty}">
							<i class="fa fa-cart-arrow-down"></i>{LANG.product_empty}
						</button>
						<!-- END: product_empty -->
						<a title="Xem nhanh" href="{link}" class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm hidden-md">
							<i class="fa fa-eye"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- END: loop -->
</div>
<!-- BEGIN: page -->
<div class="text-center">{PAGE}</div>
<!-- END: page -->
<!-- BEGIN: tooltip_js -->
<script type="text/javascript" data-show="after">
    $(document).ready(function() {
        $("[data-rel='tooltip']").tooltip({
            placement : "bottom",
            html : true,
            title : function() {
                return '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';
            }
        });
    });
</script>
<!-- END: tooltip_js -->
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