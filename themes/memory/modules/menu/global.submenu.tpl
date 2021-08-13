<!-- BEGIN: tree -->
<li>
	<a title="{MENUTREE.note}" href="{MENUTREE.link}" rel="nofollow" {MENUTREE.target}>{MENUTREE.title_trim}</a>
	<!-- BEGIN: tree_content -->
	<ul>
		{TREE_CONTENT}
	</ul>
	<!-- END: tree_content -->
</li>
<!-- END: tree -->
<!-- BEGIN: main -->
<div class="bg-header-nav">
	<div>
		<div class="row row-noGutter-2">
			<nav class="header-nav">
				<ul class="item_big">
					<li class="nav-item {CAT1.class} home">
						<a class="a-img" title="{LANG.Home}" href="{THEME_SITE_HREF}">
							<span>{LANG.Home}</span>
						</a>
					</li>
					<!-- BEGIN: loopcat1 -->
					<li class="nav-item {CAT1.class}">
						<a class="a-img" title="{CAT1.title}" rel="nofollow" href="{CAT1.link}"{CAT1.target}>{CAT1.title_trim}
							<span class="label_">
							<i class="label {CAT1.class}">{CAT1.note}</i>
							</span>
						</a>
						<!-- BEGIN: cat2 -->
						<ul>
							{HTML_CONTENT}
						</ul>
						<!-- END: cat2 -->
					</li>
					<!-- END: loopcat1 -->
				</ul>
			</nav>
		</div>
	</div>
</div>
<script>
	if ( window.location.pathname == '/' || window.location.pathname == '/index.php'){
		var timli = $(".home").addClass("active");

	}
</script>
<!-- END: main -->