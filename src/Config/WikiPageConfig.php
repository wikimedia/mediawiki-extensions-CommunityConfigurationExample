<?php

namespace CommunityConfigurationExample\Config;

use MediaWiki\Config\Config;
use MediaWiki\Extension\CommunityConfiguration\Provider\KeyValueConfigurationProvider;

class WikiPageConfig implements Config {

	private KeyValueConfigurationProvider $provider;

	public function __construct( KeyValueConfigurationProvider $provider ) {
		$this->provider = $provider;
	}

	/**
	 * @inheritDoc
	 */
	public function get( $name ) {
		return $this->provider->get( $name );
	}

	/**
	 * @inheritDoc
	 */
	public function has( $name ) {
		return $this->provider->has( $name );
	}
}
