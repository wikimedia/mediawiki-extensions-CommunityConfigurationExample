<?php
namespace CommunityConfigurationExample\Specials;

use CommunityConfigurationExample\Config\WikiPageConfig;
use MediaWiki\Extension\CommunityConfiguration\CommunityConfigurationServices;
use MediaWiki\Extension\CommunityConfiguration\Provider\ConfigurationProviderFactory;
use MediaWiki\MediaWikiServices;
use SpecialPage;

class SpecialCommunityConfigurationExample extends SpecialPage {

	private WikiPageConfig $wikiConfig;

	public function __construct(
		WikiPageConfig $wikiConfig
	) {
		parent::__construct( 'CommunityConfigurationExample' );

		$this->wikiConfig = $wikiConfig;
	}

	/**
	 * @note WARNING: This is an ugly and insecure hack, introduced for the purposes of
	 * demonstration. Do not use this elsewhere unless you know what you are doing.
	 * @param string $color
	 * @return void
	 */
	private function setBackgroundColor( string $color ): void {
		$this->getOutput()->addInlineStyle(
			'.mw-page-container { background-color: ' . $color . ' !important; }'
		);
	}

	public function execute( $par ) {
		// REVIEW: Page permissions --Sergio
		parent::execute( $par );

		$this->getOutput()->addWikiTextAsInterface( 'Hello world!' );
		$this->setBackgroundColor( $this->wikiConfig->get( 'CCExampleBackgroundColor' ) );
	}
}
