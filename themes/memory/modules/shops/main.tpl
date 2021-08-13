<!-- BEGIN: main -->
<!-- BEGIN: viewall -->
<div id="viewall">{CONTENT}</div>
<!-- END: viewall -->
<!-- BEGIN: viewcat -->
<div id="viewcat">
	<div class="section_base">
		<div class="border_bottom_title clearfix"></div>
		<!-- BEGIN: catalogs -->
		<div class="title_top_menu">
			<h3><a href="{LINK_CATALOG}" title="{TITLE_CATALOG}">{TITLE_CATALOG}</a></h3>
			<div class="btn_menu">
				<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
			</div>
			<ul class="clearfix">
				<!-- BEGIN: subcatloop -->
				<li><a href="{SUBCAT.link}" title="{SUBCAT.title}">{SUBCAT.title}</a></li>
				<!-- END: subcatloop -->
				
			</ul>
		</div>
		<div class="clearfix">{CONTENT}</div>
		<!-- END: catalogs -->
	</div>
</div>
<!-- END: viewcat -->
<!-- END: main -->