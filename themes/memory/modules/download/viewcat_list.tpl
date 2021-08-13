<!-- BEGIN: main -->
<div class="table-download">
	<!-- BEGIN: cat_data -->
	<div class="list-title pdd-10"><i class="fa fa-dropbox" aria-hidden="true"></i>{CAT.title} ({CAT.numfile} {LANG.file})</div>
	<!-- END: cat_data -->
	<div class="row mrg-lr-0 body-download">
	<!-- BEGIN: loop -->
	<div class="col-md-12 col-xs-12 col-xs-24 pdd-lr-0 body-download-nth">
		<div class="row list-content">
			<div class="col-md-18">
				<a rel="nofollow" href="{FILE.more_link}" title="{FILE.title}"><i class="fa fa-file-o" aria-hidden="true"></i>{FILE.title0}</a>
			</div>
			<div class="col-md-4">
				{FILE.filesize}
			</div>
			<div class="col-md-2">
				<a rel="nofollow" href="{FILE.linkdirect}" title="Download {FILE.title}"><i class="fa fa-download" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	<!-- END: loop -->
	</div>

    <!-- BEGIN: page -->
    <div class="text-center">{PAGE}</div>
    <!-- END: page -->
</div>
<script>
    $('.pagination').addClass('pagination-sm');
</script>
<!-- END: main -->