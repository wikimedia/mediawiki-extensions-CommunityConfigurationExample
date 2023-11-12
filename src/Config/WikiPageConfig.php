<?php

namespace CommunityConfigurationExample\Config;

use MediaWiki\Config\Config;
use MediaWiki\Extension\CommunityConfiguration\Provider\WikiPageConfigProvider;

class WikiPageConfig implements Config {

	private WikiPageConfigProvider $provider;

	public function __construct( WikiPageConfigProvider $provider ) {
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
