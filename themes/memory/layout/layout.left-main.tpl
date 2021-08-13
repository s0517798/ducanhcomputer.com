<!-- BEGIN: main -->
{FILE "header_only.tpl"}
{FILE "header_extended.tpl"}
<div class="container">
	<div class="row">
	    <div class="col-sm-18 col-md-18 col-sm-push-6 col-md-push-6">
	        {MODULE_CONTENT}
	    </div>
		<div class="col-sm-6 col-md-6 col-sm-pull-18 col-md-pull-18">
			[LEFT]
		</div>
	</div>
</div>
{FILE "footer_extended.tpl"}
{FILE "footer_only.tpl"}
<!-- END: main -->