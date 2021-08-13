<!-- BEGIN: main -->

<!-- BEGIN: rate -->
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Review",
  "itemReviewed": {
    "@type": "Thing",
    "name": "{data.ratename}"
  },
  "author": {
    "@type": "Person",
    "name": "{data.ratename}"
  },
  "reviewRating": {
    "@type": "Rating",
    "ratingValue": "{data.ratenumber}",
    "bestRating": "10"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Washington Times"
  }
}
</script>
<!-- END: rate -->

<!-- BEGIN: tag -->
<div class="content_alias">
	<div class="title_alias">{data.title}</div>
	<!-- BEGIN: image -->
	<div class="image_alias"><img src="{image}" title="{data.title}" alt="{data.title}"/></div>
	<!-- END: image -->
	<div class="des_alias">{data.description}</div>
	<div class="detail_alias">{data.bodytext}</div>
</div>
<!-- END: tag -->

<div class="page panel panel-default">
	
	<!-- BEGIN: title_tag_lienquan -->
	<div class="title_result">{LANG.baiviet_lienquan}</div>
	<!-- END: title_tag_lienquan -->
    <div class="panel-body">        
        <div id="search_result">
        	{SEARCH_RESULT}
        </div>
    </div>
</div>

<!-- END: main -->
