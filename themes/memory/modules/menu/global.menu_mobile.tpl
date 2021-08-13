<!-- BEGIN: tree -->
<li>
	<a title="{MENUTREE.note}" href="{MENUTREE.link}" {MENUTREE.target}>{MENUTREE.title_trim}</a>
	<!-- BEGIN: tree_content -->
	<ul>
		{TREE_CONTENT}
	</ul>
	<!-- END: tree_content -->
</li>
<!-- END: tree -->
<!-- BEGIN: main -->
<div class="hidden-md hidden-lg opacity_menu"></div>
<div id="mySidenav" class="sidenav menu_mobile hidden-md hidden-lg">
    <div class="top_menu_mobile">
        <a href="#">
        <span class="close_menu" style="background:url({LOGO}); background-size: 100% 100%;">
        </span>
        </a>
    </div>
	<div class="content_memu_mb">
        <div class="link_list_mobile">
            <ul class="ct-mobile hidden">
            </ul>
			<ul class="ct-mobile">
				<!-- BEGIN: loopcat1 -->
					<li class="level0 level-top parent level_ico">
						<a title="{CAT1.note}" href="{CAT1.link}"{CAT1.target}>{CAT1.title_trim}</a>
						<!-- BEGIN: expand -->
						<span class="fa arrow expand"></span>
						<!-- END: expand -->

						<!-- BEGIN: cat2 -->
						<ul>
							{HTML_CONTENT}
						</ul>
						<!-- END: cat2 -->
					</li>
				<!-- END: loopcat1 -->
			</ul>
		</div>
	</div>
</div>
<!-- END: main -->