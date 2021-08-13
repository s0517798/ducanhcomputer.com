<!-- BEGIN: main -->

<!-- BEGIN: catbox -->
<div class="table-download">
    <div class="list-title pdd-10">
            <a rel="nofollow" title="{catbox.title}" href="{catbox.link}"><i class="fa fa-dropbox" aria-hidden="true"></i>{catbox.title} ({catbox.numfile} {LANG.file})</a>
            <!-- BEGIN: subcatbox -->
            <!-- BEGIN: listsubcat -->
            <span class="divider">></span> <a title="{listsubcat.title}" href="{listsubcat.link}">{listsubcat.title}</a>
            <!-- END: listsubcat -->
            <!-- BEGIN: more -->
            <em class="pull-right"><small><a title="{LANG.categories_viewall}" href="{MORE}"><em class="fa fa-search fa-lg">&nbsp;</em>{LANG.categories_viewall}</a></small></em>
            <!-- END: more -->
            <!-- END: subcatbox -->
            <!-- BEGIN: is_addfile_allow -->
            <em class="pull-right"><small><a rel="nofollow" title="{LANG.upload_to}" href="{catbox.uploadurl}"><em class="fa fa-upload fa-lg">&nbsp;</em>{LANG.upload_to}&nbsp;&nbsp;&nbsp;</a></small></em>
            <!-- END: is_addfile_allow -->
    </div>
    <!-- BEGIN: related -->
	<div class="row mrg-lr-0 body-download">
		<!-- BEGIN: loop -->
		<div class="col-md-12 col-xs-12 col-xs-24 pdd-lr-0 body-download-nth">
			<div class="row list-content">
				<div class="col-md-18">
					<a rel="nofollow" title="{loop.title}" href="{loop.more_link}"><i class="fa fa-file-o" aria-hidden="true"></i>{loop.title}</a>
				</div>
				<div class="col-md-4">
					{loop.filesize}
				</div>
				<div class="col-md-2">
					<a rel="nofollow" href="{loop.linkdirect}" title="Download {loop.title}"><i class="fa fa-download" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<!-- END: loop -->
		<!-- END: related -->
	</div>
</div>
<!-- END: catbox -->

<!-- BEGIN: filelist -->
<h2 class="m-bottom pull-left">{CAT_TITLE}</h2>
{FILE_LIST}
<!-- END: filelist -->

<!-- END: main -->