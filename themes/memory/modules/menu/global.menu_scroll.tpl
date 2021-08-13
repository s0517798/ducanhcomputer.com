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
<div class="scroll_menu hidden-xs hidden-sm" id="myScrollspy">
	<ul class="nav nav-pills nav-stacked">
		<!-- BEGIN: loopcat1 -->
		<li>
			<a rel="nofollow" href="{CAT1.link}" data-href="{CAT1.link}">
				<img alt="{CAT1.title_trim}" src="{CAT1.icon}">
				<span class="scroll_tooltip_1">{CAT1.title_trim}</span>
			</a>
			<!-- BEGIN: cat2 -->
			
			<!-- END: cat2 -->
		</li>
		<!-- END: loopcat1 -->
	</ul>
</div>
<script>
	var $root = $('html, body');
	$('.scroll_menu a').click(function() {
		var location = $( $.attr(this, 'href') ).offset().top - 150;
		$root.animate({
			scrollTop: location
		}, 500);
		return false;
	});
	
	$(document).ready(function () {
	
		$(this).scroll(function() {
			var height = $(window).scrollTop();
			if(height >= 400) {
				$('.scroll_menu').addClass('visible');
			}
			else {
				$('.scroll_menu').removeClass('visible');
			}
		});
	});
</script>
<!-- END: main -->