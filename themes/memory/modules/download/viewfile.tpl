<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/{MODULE_FILE}_jquery.shorten.js"></script>

<div class="block_download">
    <!-- BEGIN: scorm -->
    <a rel="nofollow" class="btn btn-success pull-right btn-xs" href="{SCORM_LINK}" target="_blank">{LANG.onlineview}</a>
    <!-- END: scorm -->
    
    <!-- BEGIN: scorms -->
    <div class="pull-right">
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            {LANG.onlineview}
            <span class="caret"></span>
          </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <!-- BEGIN: loop --><li><a href="{SCORM_LINK}" target="_blank">{LANG.onlineview_path} {SCORM_NUM}</a></li><!-- END: loop -->
            </ul>
        </div>
    </div>
    <!-- END: scorms -->
    
    <h2 class="m-bottom">{ROW.title}</h2>
    
    <!-- BEGIN: addthis -->
    <div class="m-bottom clearfix">
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid={ADDTHIS_PUBID}"></script>
        <div class="addthis_sharing_toolbox"></div>
    </div>
    <!-- END: addthis -->
    
    <!-- BEGIN: introtext -->
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- BEGIN: is_image -->
            <div class="image">
                <a rel="nofollow" href="#" id="pop" title="{ROW.title}"> <img id="imageresource" alt="{ROW.title}" src="{FILEIMAGE.src}" width="{FILEIMAGE.width}" height="{FILEIMAGE.height}" class="img-thumbnail" > </a>
                <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <h4 class="modal-title" id="myModalLabel">{ROW.title}</h4>
                            </div>
                            <div class="modal-body">
                                <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: is_image -->
            <div class="introtext m-bottom" id="download-bodyhtml">
                {ROW.description}
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $('.introtext').shorten({
                showChars: 300,
                moreText: '<p class="text-center"><button class="btn btn-primary btn-xs">{LANG.expand}</button></p>',
                lessText: '<p class="text-center"><button class="btn btn-primary btn-xs">{LANG.collapse}</button></p>',
            });
        });
        </script>
    </div>
    <!-- END: introtext -->
    <!-- BEGIN: filepdf -->
    <iframe frameborder="0" height="600" scrolling="yes" src="{FILEPDF}" width="100%"></iframe>
    <!-- END: filepdf -->
    <div class="table-download">
        <div class="list-title pdd-10">
           <i class="fa fa-th-list" aria-hidden="true"></i>{LANG.listing_details}
        </div>
        <div class="row mrg-lr-0 body-download">
			<div class="col-md-12 col-sm-12 col-xs-24 pdd-lr-0 body-download-nth">
				<div class="row list-content">
					<div class="col-md-6 col-sm-12 col-xs-12">
						{LANG.file_title}:
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						{ROW.title}
					</div>
				</div>
				<div class="row list-content">
					<div class="col-md-6 col-sm-12 col-xs-12">
						{LANG.bycat2}:
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						{ROW.catname}
					</div>
				</div>
				<div class="row list-content">
					 <div class="col-md-6 col-sm-12 col-xs-12">
						{LANG.updatetime}:
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						{ROW.updatetime}
					</div>
				</div>
				<div class="row list-content">
					<div class="col-md-6 col-sm-12 col-xs-12">
						{LANG.user_name}:
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						{ROW.user_name}
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-24 pdd-lr-0 body-download-nth">
				<div class="row list-content">
					<div class="col-md-6 col-sm-12 col-xs-12">
						{LANG.filesize}:
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						{ROW.filesize}
					</div>
				</div>
				<div class="row list-content">
					 <div class="col-md-6 col-sm-12 col-xs-12">
						{LANG.view_hits}:
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						{ROW.view_hits}
					</div>
				</div>
				<!-- BEGIN: comment_hits -->
				<div class="row list-content">
					<div class="col-md-6 col-sm-12 col-xs-12">
						{LANG.comment_hits}:
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						{ROW.comment_hits}
					</div>
				</div>
				<!-- END: comment_hits -->   
				<!-- BEGIN: download_allow -->
				<!-- BEGIN: fileupload -->
				<div class="row list-content">
					<div class="col-md-6 col-sm-12 col-xs-12">
						Link download: 
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						<!-- BEGIN: row -->
						<em class="fa fa-link">&nbsp;</em>&nbsp;<a rel="nofollow" id="myfile{FILEUPLOAD.key}" href="{FILEUPLOAD.link}" onclick="nv_download_file('idown','{FILEUPLOAD.title}');return false;">{FILEUPLOAD.title}</a>
						<!-- END: row -->
					</div>
				</div>
				<!-- END: fileupload -->
				<!-- BEGIN: linkdirect -->
				<div class="row list-content">
					<div class="col-md-6 col-sm-12 col-xs-12">
						Link download: 
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						<!-- BEGIN: row -->
						<a rel="nofollow" href="{LINKDIRECT.link}" onclick="nv_linkdirect('{LINKDIRECT.code}');return false;"><i class="fa fa-download" aria-hidden="true"></i></a>
						<!-- END: row -->
					</div>
				</div>
				<!-- END: linkdirect -->
				<!-- END: download_allow -->
				<!-- BEGIN: report -->
				<div class="row list-content">
					<div class="col-md-6 col-sm-12 col-xs-12">
						{LANG.report}: 
					</div>
					<div class="col-md-18 col-sm-12 col-xs-12">
						<a rel="nofollow" href="javascript:void(0);" data-thanks="{LANG.report_thanks}" onclick="nv_link_report( $(this), {ROW.id} );"><i class="fa fa-flag" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- END: report -->
			</div>
		</div>
	</div>
    <!-- BEGIN: download_info -->
    <div class="download">
        <div class="alert alert-danger">
            {ROW.download_info}
        </div>
    </div>
    <!-- END: download_info -->

    <!-- BEGIN: keywords -->
    <div class="news_column panel panel-default">
        <div class="panel-body">
            <div class="h5">
                <em class="fa fa-tags">&nbsp;</em><strong>{LANG.keywords}: </strong><!-- BEGIN: loop --><a title="{KEYWORD}" href="{LINK_KEYWORDS}"><em>{KEYWORD}</em></a>{SLASH}<!-- END: loop -->
            </div>
        </div>
    </div>
    <!-- END: keywords -->
    <script type="text/javascript">
        var sr = 0;
        var file_your_rating = '{LANG.file_your_rating}';
        var rating_point = '{LANG.rating_point}';
        var id = '{ROW.id}';

        $(document).ready(function() {
            $("#pop").on("click", function() {
               $('#imagepreview').attr('src', $('#imageresource').attr('src'));
               $('#imagemodal').modal('show');
            });

            $('.hover-star').rating({
                focus : function(value, link) {
                    var tip = $('#hover-test');
                    if (sr != 2) {
                        tip[0].data = tip[0].data || tip.html();
                        tip.html(file_your_rating + ': ' + link.title || 'value: ' + value);
                        sr = 1;
                    }
                },
                blur : function(value, link) {
                    var tip = $('#hover-test');
                    if (sr != 2) {
                        $('#hover-test').html(tip[0].data || '');
                        sr = 1;
                    }
                },
                callback : function(value, link) {
                    if (sr == 1) {
                        sr = 2;
                        $('.hover-star').rating('disable');
                        nv_sendrating(id, value);
                    }
                }
            });

            $('.hover-star').rating('select', rating_point);
        });
    </script>

    <!-- BEGIN: disablerating -->
    <script type="text/javascript">
        $(".hover-star").rating('disable');
        $('#hover-test').html('{ROW.rating_string}');
        $('#stringrating').html('{LANG.file_rating_note2}');
        sr = 2;
    </script>
    <!-- END: disablerating -->

    <!-- BEGIN: is_admin -->
    <div class="well well-sm">
        <div class="text-right pull-right">
            <a href="{ROW.edit_link}">{GLANG.edit}</a> &divide; <a href="{ROW.del_link}" onclick="nv_del_row(this,{ROW.id});return false;">{GLANG.delete}</a>
        </div>
        {LANG.file_admin}:
    </div>
    <!-- END: is_admin -->

    <!-- BEGIN: comment -->
    <div class="panel panel-default">
        <div class="panel-body">
            {CONTENT_COMMENT}
        </div>
    </div>
    <!-- END: comment -->
</div>
<!-- END: main -->