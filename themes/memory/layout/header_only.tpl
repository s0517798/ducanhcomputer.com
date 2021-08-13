<!DOCTYPE html>
	<html lang="{LANG.Content_Language}" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>{THEME_PAGE_TITLE}</title>
		<!-- BEGIN: metatags --><meta {THEME_META_TAGS.name}="{THEME_META_TAGS.value}" content="{THEME_META_TAGS.content}">
		<!-- END: metatags -->
		<link rel="shortcut icon" href="{SITE_FAVICON}">
		<!-- BEGIN: links -->
		<link<!-- BEGIN: attr --> {LINKS.key}<!-- BEGIN: val -->="{LINKS.value}"<!-- END: val --><!-- END: attr -->>
		<!-- END: links -->
		<!-- BEGIN: js -->
		<script<!-- BEGIN: ext --> src="{JS_SRC}"<!-- END: ext -->><!-- BEGIN: int -->{JS_CONTENT}<!-- END: int --></script>
		<!-- END: js -->
		
		<script>
			$(document).ready(function () {
			 WebFont.load({
				google: {
				  families: ['Roboto:300,400,500,700', 'Oswald:400,500,700']
				}
			  });
			});
		</script>
		<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "HardwareStore",
			"url": "{NV_MY_DOMAIN}",
			"logo": "{NV_MY_DOMAIN}{LOGO_SRC}",
			"image": "{NV_MY_DOMAIN}{LOGO_SRC}",
			"priceRange": "VND",
			"hasMap": "https://goo.gl/maps/TGdC2NX7rqk",
			"email": "mailto: nvdong@ducanhcomputer.com",
			"address": { 
			"@type": "PostalAddress", 
			"addressLocality": "Gò Vấp", 
			"addressRegion": "Hồ Chí Minh", 
			"postalCode":"700000", 
			"streetAddress": "35/4 Bùi Quang Là, Phường 12, Gò Vấp, Hồ Chí Minh" 
			},
			"description": "{SITE_DESCRIPTION}",
			"name": "Đức Anh Computer", "telephone": "093-812-0135",
			"openingHours": [ "Mo-Fri 08:00-17:00", "Sat 08:00-12:00" ],
			"geo": { "@type": "GeoCoordinates", "latitude": "10.833243", "longitude": "106.641456" },
			"sameAs" : [ "https://www.facebook.com/tinhocducanh"] 
		}
		</script>
	</head>
	<body>
<script data-ad-client="ca-pub-5791253993805132" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>