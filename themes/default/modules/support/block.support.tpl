<!-- BEGIN: main -->

<div id="support_content1">
<ul>
	<!-- BEGIN: loop -->
	<li class="media support">
		<!-- BEGIN: image --><a class="pull-left support_left" href="tel:{ROW.phone1}"><img src="{ROW.image}" alt="{ROW.title}"></a>
		<!-- END: image -->
		<div class="support_bg"><div class="support_arrow"></div>
		<div class="clearfix">
			<a href="tel:{ROW.phone1}"><i class="pull-left fa fa-user">&nbsp;</i>{ROW.title}</a><br>
			<a href="tel:{ROW.phone1}"class="phone"><i title="{ROW.title}" class="fa fa-phone">&nbsp;</i>{ROW.phone}</a><br>
			<a href="mailto:{ROW.email}"  class="phone"><i title="{ROW.email}" class="fa fa-envelope">&nbsp;</i>Gửi email</a>

			</div>
		</div>
	</li>
	<!-- END: loop -->
</ul>

</div>
<link rel="stylesheet" type="text/css" media="screen" href="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/css/support.css" />

<!-- END: main -->
