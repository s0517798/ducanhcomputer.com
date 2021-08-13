<!-- BEGIN: tree -->
<li class="level sub">
	<a rel="nofollow" title="{MENUTREE.title}" href="{MENUTREE.link}"><i class="fa fa-check"></i> {MENUTREE.title}</a>
	<!-- BEGIN: tree_content -->
	<ul class="navigation">
		{TREE_CONTENT}
	</ul>
	<!-- END: tree_content -->
</li>
<!-- END: tree -->
<!-- BEGIN: main -->
<!-- BEGIN: cat -->
<div class="verticalmenu">
    <ul id="vertical">
		<!-- BEGIN: loopcat1 -->
        <li class="sub">
            <a rel="nofollow" href="{CAT.link}"><i class="fa fa-angle-right" aria-hidden="true"></i> <span>{CAT.title}</span></a>
            <!-- BEGIN: cat2 -->
			<ul class="navigation">
				{HTML_CONTENT}
			</ul>
			<!-- END: cat2 -->
        </li>
	    <!-- END: loopcat1 --> 
	</ul>
</div>
<!-- END: cat -->
<!-- END: main -->