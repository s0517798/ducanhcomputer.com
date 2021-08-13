<!-- BEGIN: main -->

<!-- BEGIN: enable -->
<div class="mini-cart text-xs-center">
	<div class="heading-cart cart_header">
		<a href="{LINK_VIEW}" title="Giỏ hàng">
			<div class="icon_hotline">
				<i class="fa fa-shopping-basket" aria-hidden="true"></i>
			</div>
		</a>
		<div class="content_cart_header">
			<a class="bg_cart" href="{LINK_VIEW}" title="Giỏ hàng">
			(<span class="count_item count_item_pr">{num}</span>) Sản phẩm
			<span class="text-giohang">Giỏ hàng</span>
			</a>
		</div>
	</div>
	<div class="top-cart-content">
		<ul id="cart-sidebar-box" class="mini-products-list count_li">
			<ul class="list-item-cart">
				<!-- BEGIN: loop -->
				<li class="item">
					<div class="border_list">
						<a class="product-image" href="{link_pro}" title="{title_pro}"><img alt="{title_pro}" src="{img_pro}" width="100"></a>
						<div class="detail-item">
							<div class="product-details">
								<p class="product-name">
									<a class="text2line" href="{link_pro}" title="{title_pro}">{title_pro}</a>
								</p>
							</div>
							<div class="product-details-bottom">
								<!-- BEGIN: price2 -->
								<span class="price">{PRICE.sale_format} {PRICE.unit}</span>
								<!-- END: price2 -->
								<a href="{link_remove}" title="{LANG.cart_remove_pro}" class="remove-cart-block remove-item-cart fa fa-times">&nbsp;</a>
							</div>
						</div>
					</div>
				</li>
				<!-- END: loop -->
			</ul>
			<!-- BEGIN: cohang -->
			<div class="pd">
				<div class="top-subtotal">{LANG.cart_product_total}: <span class="price">{total} ₫</span></div>
			</div>
			<div class="pd right_ct">
				<a href="{LINK_VIEW}" class="btn btn-primary">
					<span>{LANG.cart_check_out}</span>
				</a>
				<a href="{LINK_VIEW}" class="btn btn-white">
					<span>Đi đến giỏ hàng</span>
				</a>
			</div>
			<!-- END: cohang -->
			<!-- BEGIN: trong -->
			<ul id="cart-sidebar" class="mini-products-list count_li">
				<div class="no-item">
					<p>Không có sản phẩm nào trong giỏ hàng.</p>
				</div>
			</ul>
			<!-- END: trong -->
		</ul>
	</div>
</div>
<!-- END: enable -->
<script>
var nv_module_name_shop = '{nv_module_name_shop}';
var urload = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name_shop + '&' + nv_fc_variable + '=loadcart';
$("#total").load(urload + '&t=2');  
$(function() {
	$(".remove-cart-block").click(function() {
		var href = $(this).attr("href");
		$.ajax({
			type : "GET",
			url : href,
			data : '',
			success : function(data) {
				if (data != '') {
					$("#" + data).html('');
					$("#cart_" + nv_module_name_shop).load(urload);
					$("#total").load(urload + '&t=2');
				}
				
			}
			
		});
		return false;
	});
});
</script>
<!-- END: main -->