<?php

$wgExtensionCredits[$type][] = array(
        'path' => __FILE__,
        'name' => "WikiBanner",
        'description' => "Allows top and bottom banners to be added to the wiki as configured in the LocalSettings.php file.",
//      'descriptionmsg' => "",
        'version' => 1.1,
        'author' => "Inquisitor Ehrenstein",
        'url' => "http://www.mediawiki.org/wiki/Extension:WikiBanner",
);


//Explicitly defining global variables

$wgTopBannerCode = '<!-- No Top Banner -->';
$wgBottomBannerCode = '<!-- No Bottom Banner -->';

//Code for adding the top and bottom banners to the wiki

$wgHooks['BeforePageDisplay'][] = 'WikiBanner';
function WikiBanner( OutputPage &$out, Skin &$skin ) {
	global $wgTopBannerCode, $wgBottomBannerCode;

	$out->prependHTML( $wgTopBannerCode );
	$out->addHTML( $wgBottomBannerCode );

	return TRUE;
}

//Experimental new code for sidebar

$wgUseSidebarBanner = false;

function WikiBannerGlobals() {
	global $wgUseSidebarBanner;
}

if ( $wgUseSidebarBanner = true ) {

	$wgSidebarBannerCode = 'Set banner code';
	$wgSidebarBannerTitle = 'Set banner title';

	$wgHooks['SkinBuildSidebar'][] = 'WikiSidebarBanner';
	function WikiSidebarBanner( $skin, &$bar ) {
		global $wgSidebarBannerCode, $wgSidebarBannerTitle;
	
		$out = "$wgSidebarBannerCode";
		$bar["$wgSidebarBannerTitle"] = $out;
	
		return TRUE;
	}
} else { }