<!-- BEGIN: main -->
 
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/{MOD_FILE}/plugins/jcarousel/jcarousel.responsive.css" media="all"/>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/{MOD_FILE}/plugins/jcarousel/jquery.jcarousel.min.js"></script>
 
<div class="jcarousel-wrapper">
	<div class="jcarousel">
		<ul>
			<!-- BEGIN: loop -->
			<li>
				<a href="{DATA.link}" title="{DATA.title}">
					<img class="img-other-hot" alt="{DATA.title}" src="{DATA.image}" title="{DATA.title}"  />
				</a>
				<p>{DATA.title}</p>
			</li>
			<!-- END: loop -->
		</ul>
	</div>
	<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
	<a href="#" class="jcarousel-control-next">&rsaquo;</a>
	<!-- <p class="jcarousel-pagination"></p> -->
</div>
<script type="text/javascript">
$(function()
{
	var jcarousel = $('.jcarousel');
	jcarousel.on('jcarousel:reload jcarousel:create', function()
		{
			var carousel = $(this),
				width = carousel.innerWidth();
			if (width >= 600)
			{
				width = width / 4;
			}
			else if (width >= 350)
			{
				width = width / 2;
			}
			carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
		})
		.jcarousel(
		{
			wrap: 'circular'
		});
	$('.jcarousel-control-prev').jcarouselControl(
	{
		target: '-=1'
	});
	$('.jcarousel-control-next').jcarouselControl(
	{
		target: '+=1'
	});
});

</script>
 
<!-- END: main -->

