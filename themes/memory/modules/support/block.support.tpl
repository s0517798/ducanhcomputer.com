<!-- BEGIN: main -->
<div class="support-online">
	<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/phone-img.jpg"/ alt="Hỗ trợ trực tuyến">
	<ul>
		<!-- BEGIN: loop -->
		<li class="clearfix">
			<div class="col-md-18 col-sm-18 col-xs-18">
				<a rel="nofollow" href="tel:{ROW.phone1}"><div><i class="fa fa-user">&nbsp;</i><strong>{ROW.title}</strong></div>
				<div><i title="{ROW.title}" class="fa fa-phone">&nbsp;</i>{ROW.phone}</div></a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<a aria-label="Skype" rel="nofollow" href="skype:{ROW.skype}"><i class="fa fa-skype" aria-hidden="true"></i></a>
			</div>
		</li>
		<!-- END: loop -->
	</ul>
</div>
<!-- END: main -->
