<?php
$format = htmlspecialchars( $_GET[ "format" ] );

$default_width = 640;
$default_height = 480;
$aspect_ratio = 1;

$get_width = $_GET[ "maxwidth" ];
$get_height = $_GET[ "maxheight" ];

if($get_width === null)
{
	$max_width = $default_width;
}
else
{
	$max_width = htmlspecialchars( $get_width );
}
if($get_height === null)
{
	$max_height = $default_height;
}
else
{
	$max_height = htmlspecialchars( $get_height );
}

if( ($max_width <=$default_width && $max_height <= $default_height) || ($max_width >= $max_height) )
{
	$width = $max_width;
	$height = $max_height;
}
else
{
	$width = $max_width;
	$height = $max_width;
}

$url = htmlspecialchars( $_GET[ "url" ] );
$url_info = parse_url( $url );

if( $url_info ) {
	$domain = $url_info['host'];
	

	$domain_names = explode( ".", $domain );
	
	if( count( $domain_names ) < 2 ){
		return;
	}
	$bottom_domain_name = $domain_names[count($domain_names)-2] . "." . $domain_names[count($domain_names)-1];
	$flippingbook_mask = '#https?://(site-dev\.)?flippingbook\.com/view/.*#i';

	$cdl_mask = "#https?://(.*\.)?(cld\.mobi)|(cld\.bz)/.*#i";
	if( preg_match( $cdl_mask , $url ) ) {
		$htmltext = '<a href="' . $url . '" class="cld-embed" data-cld-width="' . $width . 'px" data-cld-height="' . $height . 'px">' . $url . '</a><script async defer src="https://' . $bottom_domain_name . '/content/embed-boot/boot.js"></script>';
	}
	if( preg_match( $flippingbook_mask, $url ) ) {
		$path =  $url_info['path'];
		$paths = explode('/', $path);
		$htmltext = '<a href="' . $url . '" title="FlippingBook">' . $url . '</a>11';
	}

	if( $format === "json" ) {
		echo_json_format( $htmltext, $width, $height );
	} else if( $format === "xml" ) {
		echo_xml_format( $htmltext, $width, $height );
	}
}
function echo_xml_format( $htmltext, $width_value, $height_value ) {
	if ( function_exists( 'simplexml_import_dom' ) && class_exists( 'DOMDocument', false ) ) {
		header( 'Content-Type: text/xml' );
		$dom = new DomDocument( '1.0' ); 
		$oembed = $dom->appendChild( $dom->createElement( 'oembed' ) );
		$type = $oembed->appendChild( $dom->createElement( 'type' ) );
		$type->appendChild( $dom->createTextNode( 'video' ) );
		
		$width = $oembed->appendChild( $dom->createElement( 'width' ) );
		$width->appendChild( $dom->createTextNode( "$width_value" ) );
		
		$height = $oembed->appendChild( $dom->createElement( 'height' ) );
		$height->appendChild( $dom->createTextNode( "$height_value" ) );
		
		$version = $oembed->appendChild( $dom->createElement( 'version' ) );
		$version->appendChild( $dom->createTextNode( '1.0' ) );
		$html = $oembed->appendChild( $dom->createElement( 'html' ) );
		$html->appendChild( $dom->createTextNode( $htmltext ) );
		echo simplexml_import_dom( $dom )->asXML();
	} else {
		header('Content-Type: text/plain');
		if( ! function_exists( 'simplexml_import_dom' ) ) {
			echo "function 'simplexml_import_dom' does not exist\r\n";
		}
		if( ! class_exists( 'DOMDocument', false ) ) {
			echo "class 'DOMDocument' does not exist\r\n";
		}
	}
}
function echo_json_format( $htmltext, $width, $height ){
	$data = array(
	'type' => 'video',
	'version' => "1.0",
	'width' => "$width",
	'height' => "$height",
	'html' => $htmltext
	);
	header( 'Content-Type: application/json' );
	echo json_encode( $data );
}
?>