<!-- BEGIN: main -->
<div class="">
	<!-- BEGIN: loop -->
	<div class="product-mini-item clearfix   on-sale">
		<a rel="nofollow" href="{link}" class="product-img">
			<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/rolling.svg" data-lazyload="{src_img}" alt="{title}">
			<div class="status-pro {product_status_class}">
				{product_status}
			</div>
		</a>
		<div class="product-info">
			<h3><a rel="nofollow" href="{link}" title="{title}" class="product-name text3line">{title}</a></h3>
			<!-- BEGIN: price -->
			<div class="price-box clearfix">
				<!-- BEGIN: discounts -->
				<div class="special-price">
					<span class="price product-price">
						{PRICE.sale_format} {PRICE.unit}
					</span>
				</div>
				<div class="old-price">															 
					<span class="price product-price-old">
						<del class="sale-price">{PRICE.price_format} {PRICE.unit}</del>
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
			</div>
			<!-- END: price -->
			<!-- BEGIN: contact -->
			<div class="price-box clearfix">
				<div class="special-price">
					<span class="price product-price">
						{LANG.price_contact}
					</span>
				</div>
			</div>
			<!-- END: contact -->
		</div>
	</div>
	<!-- END: loop -->
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
<!-- END: main -->