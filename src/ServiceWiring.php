<?php

use CommunityConfigurationExample\Config\WikiPageConfig;
use MediaWiki\Extension\CommunityConfiguration\CommunityConfigurationServices;
use MediaWiki\Extension\CommunityConfiguration\Provider\KeyValueConfigurationProvider;
use MediaWiki\MediaWikiServices;

return [
	'CommunityConfigurationExample.WikiPageConfig' => static function ( MediaWikiServices $services ) {
		$ccServices = CommunityConfigurationServices::wrap( $services );
		$provider = $ccServices->getConfigurationProviderFactory()->newProvider( 'FooBar' );
		if ( !$provider instanceof KeyValueConfigurationProvider ) {
			throw new LogicException( 'Expected FooBar to be a KeyValueConfigurationProvider' );
		}
		return new WikiPageConfig( $provider );
	},
];