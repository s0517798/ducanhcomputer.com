<!-- BEGIN: main -->
<!-- BEGIN: empty -->
<p class="text-center">
	<button class="btn btn-primary content-add-trigger">{LANG.content_add}</button>
</p>
<div class="alert alert-danger">{LANG.performance_note}</div>
<!-- END: empty -->
<!-- BEGIN: rows -->

<div class="clearfix m-bottom">
	<button class="btn btn-primary content-add-trigger">{LANG.content_add}</button>
		<div class="pull-right">{LANG.content_total_rows}: <strong id="content-couter" data-total="{NUM_ROWS}">{NUM_ROWS} nhân viên</strong></div>
</div>




<div class="clearfix" id="content-list-container">
	<!-- BEGIN: loop -->
	
	
	<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
	<div class="thumbnail" style="height: 210px;">
		<!-- BEGIN: image -->
		<img alt="{ROW.title}" src="{ROW.image}" width="100" class="img-thumbnail">
		<!-- END: image -->
		
		<div class="caption text-center">
			<h4><a class="show" href="/Ban-tin-noi-bo/hay-tro-thanh-nha-cung-cap-dich-vu-cua-nukeviet-6.html" data-content="Nếu bạn là công ty hosting, là công ty thiết kế web có sử dụng mã nguồn NukeViet, là cơ sở đào tạo NukeViet hay là công ty bất kỳ có kinh doanh dịch..." data-img="" data-rel="tooltip" data-placement="bottom" data-original-title="" title="">{ROW.title}</a></h4>
			<span>
				<a title="{ROW.status_text}" class="btn btn-sm btn-default content-status ct-status{ROW.status}" data-id="{ROW.id}" data-status="{ROW.status}" href="#"><i class="fa fa-circle"></i></a>
						<a title="{GLANG.edit}" class="btn btn-sm btn-default content-edit" data-id="{ROW.id}" href="#"><i class="fa fa-edit"></i></a>
						<a title="{GLANG.delete}" class="btn btn-sm btn-default content-delete" data-id="{ROW.id}" data-title="{ROW.title}" href="#"><i class="fa fa-trash"></i></a>
			</span>
		</div>
	</div>
</div>

		<!-- END: loop -->
</div>

<!-- END: rows -->
<div class="modal fade" id="content-data">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">{LANG.content_add_edit}</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="content-title" class="col-sm-5 control-label">{LANG.content_title}</label>
						<div class="col-sm-19">
							<input type="text" class="form-control txt ip" id="content-title" name="title">
						</div>
					</div>
					
					<div class="form-group">
						<label for="content-title" class="col-sm-5 control-label">{LANG.content_phone}</label>
						<div class="col-sm-19">
							<input type="text" class="form-control txt ip" id="content-phone" name="phone">
						</div>
					</div>
					<div class="form-group">
						<label for="content-title" class="col-sm-5 control-label">{LANG.content_phone1}</label>
						<div class="col-sm-19">
							<input type="text" class="form-control txt ip" id="content-phone1" name="phone1">
						</div>
					</div>
					
				
			
					<div class="form-group">
						<label for="content-title" class="col-sm-5 control-label">{LANG.content_email}</label>
						<div class="col-sm-19">
							<input type="text" class="form-control txt ip" id="content-email" name="email">
						</div>
					</div>
					<div class="form-group">
						<label for="content-title" class="col-sm-5 control-label">{LANG.content_skype}</label>
						<div class="col-sm-19">
							<input type="text" class="form-control txt ip" id="content-skype" name="skype">
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="content-image" class="col-sm-5 control-label">{LANG.content_image}</label>
						<div class="col-sm-19">
							<div class="row">
								<div class="col-xs-16">
									<input type="text" class="form-control txt ip" id="content-image" name="image">
								</div>
								<div class="col-xs-8">
									<input type="button" name="select-image" data-path="{UPLOADS_DIR_USER}" data-area="content-image" data-currentpath="{UPLOADS_DIR_USER}" id="content-select-image" value="{GLANG.browse_image}" class="btn btn-default ip">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="content-status" class="col-sm-5 control-label">{LANG.content_status_active}</label>
						<div class="col-sm-19">
							<div class="row">
								<div class="col-xs-8">
									<div class="checkbox">
										<div class="checkbox">
											<label>
												<input class="ip" type="checkbox" id="content-status" name="status" value="1">
											</label>
										</div>
									</div>
								</div>
								<div class="col-xs-8">
									<div class="checkbox text-right">
										<label for="content-exptime">
											{LANG.content_exptime}
										</label>
									</div>
								</div>
								<div class="col-xs-8">
									<input type="text" class="form-control txt ip" id="content-exptime" name="exptime" value="" placeholder="{LANG.content_exptime_note}">
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="id" id="block-id" value="" class="txt">
					<input type="hidden" name="bid" id="block-bid" value="{BID}">
				</form>			
			</div>
			<div class="modal-footer">
				<span class="per-loading"> <i class="fa fa-circle-o-notch fa-spin"></i> </span>
				<button type="button" class="btn btn-default" data-dismiss="modal">{GLANG.cancel}</button>
				<button type="button" class="btn btn-primary content-submit-trigger">{GLANG.save}</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="content-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">{LANG.content_delete}</h3>
			</div>
			<div class="modal-body">
				<p class="text-danger confirm">{LANG.content_delete_confirm}</p>
				<p class="text-center loading">
					<em class="fa fa-circle-o-notch fa-spin fa-2x"></em>
				</p>	
				<p class="text-center message"></p>	
				<p class="text-center success text-success">
					<em class="fa fa-check-circle fa-2x"></em>
				</p>	
			</div>
			<div class="modal-footer">
				<input type="hidden" name="id" value="">
				<button type="button" class="btn btn-default" data-dismiss="modal">{GLANG.cancel}</button>
				<button type="button" class="btn btn-primary content-delete-trigger">{GLANG.delete}</button>
			</div>
		</div>
	</div>
</div>
<!-- END: main -->