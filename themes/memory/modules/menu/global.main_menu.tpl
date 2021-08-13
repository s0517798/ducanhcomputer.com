<!-- BEGIN: tree -->
<li class="nav_item lv2 col-lg-6 col-md-6">
	<a title="{MENUTREE.title}" href="{MENUTREE.link}" {MENUTREE.target}>{MENUTREE.title_trim}</a>
	<!-- BEGIN: tree_content -->
	<ul class="ul_content_right_2">
		{TREE_CONTENT}
	</ul>
	<!-- END: tree_content -->
</li>
<!-- END: tree -->
<!-- BEGIN: main -->
<div class="menu_mega">
	<div class="title_menu">
		<span class="title_">Danh mục sản phẩm</span>
		<span class="nav_button"><span><i class="fa fa-bars" aria-hidden="true"></i></span></span>
	</div>
	<div class="list_menu_header menu_all_site col-lg-6 col-md-6 hidden-sm hidden-xs">
		<ul class="ul_menu site-nav-vetical">
			<!-- BEGIN: loopcat1 -->
				<li class="nav_item">
					<a title="{CAT1.title}" href="{CAT1.link}"{CAT1.target}><!-- BEGIN: icon --><img src="{CAT1.icon}" alt="{CAT1.title}"/><!-- END: icon -->{CAT1.title_trim}
						<!-- BEGIN: expand -->
						<i class="fa fa-angle-right"></i>
						<!-- END: expand -->
					</a>
					<!-- BEGIN: cat2 -->
					<ul class="ul_content_right_1 row">
						{HTML_CONTENT}
					</ul>
					<!-- END: cat2 -->
				</li>
			<!-- END: loopcat1 -->
		</ul>
	</div>
	<div class="list_menu_header_show hidden-lg hidden-md">
		<ul class="mobile-menu">
		<!-- BEGIN: loopcat12 -->
			<li class="mb-li li-has-subs">
				<a title="{CAT1.title}" href="{CAT1.link}"{CAT1.target}><img src="{CAT1.icon}" alt="{CAT1.title}"/>{CAT1.title_trim}
					<!-- BEGIN: expand -->
					<i class="fa fa-angle-down open-close"></i>
					<!-- END: expand -->
				</a>
				<!-- BEGIN: cat2 -->
				<ul class="mb-ul2 submenu">
					{HTML_CONTENT}
				</ul>
				<!-- END: cat2 -->
			</li>
			<!-- END: loopcat12 -->
		</ul>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.open-close').on('click', function(e){
			e.preventDefault();
			var $this = $(this);
			$this.parents('.li-has-subs').find('.submenu').stop().slideToggle();
			$(this).toggleClass('active')
			return false;
		});
	});	
</script>
<!-- END: main -->