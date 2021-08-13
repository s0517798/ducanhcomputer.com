<!-- BEGIN: main -->
<div class="header_search">
	<form  action="{NV_BASE_SITEURL}" method="get" role="form" name="frm_search" onsubmit="return onsubmitsearch();" class="input-group search-bar">
		<input aria-labelledby="keyword" id="keyword" type="text" value="{value_keyword}" name="keyword" autocomplete="off" placeholder="Sản phẩm bạn muốn tìm..." onkeypress="return searchKeyPress(event);" class="input-group-field auto-search">
		<span class="input-group-btn">
			<button aria-label="button search" type="button" name="submit" id="submit" onclick="onsubmitsearch('{MODULE_NAME}')" class="btn icon-fallback-text">
				<span class="fa fa-search"></span>      
			</button>
		</span>
	</form>
</div>
<script>
function searchKeyPress(e)
{
    // look for window.event in case event isn't passed in
    e = e || window.event;
    if (e.keyCode == 13)
    {
        document.getElementById('submit').click();
        return false;
    }
    return true;
}
</script>
<!-- END: main -->