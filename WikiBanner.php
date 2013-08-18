<?php

$wgExtensionCredits[$type][] = array(
        'path' => __FILE__,
        'name' => "",
        'description' => "",
        'descriptionmsg' => "",
        'version' => 0,
        'author' => "",
        'url' => "",
);

$wgHooks['BeforePageDisplay'][] = 'WikiBanner';
function WikiBanner( OutputPage &$out, Skin &$skin ) {
	global $wgTopBannerCode = '<!-- No Top Banner -->';
	global $wgBottomBannerCode = '<!-- No Bottom Banner -->';

	$out->prependHTML( $wgTopBannerCode );
	$out->addHTML( $wgBottomBannerCode );

	return TRUE;
}
