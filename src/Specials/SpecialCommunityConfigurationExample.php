<?php
namespace CommunityConfigurationExample\Specials;

use MediaWiki\Extension\CommunityConfiguration\CommunityConfigurationServices;
use MediaWiki\MediaWikiServices;
use SpecialPage;

class SpecialCommunityConfigurationExample extends SpecialPage {
	public function __construct() {
		parent::__construct( 'CommunityConfigurationExample' );
	}

	public function execute( $par ) {
		$ccServices = CommunityConfigurationServices::wrap( MediaWikiServices::getInstance() );
		$provider = $ccServices->getConfigurationProviderFactory()->newProvider( 'FooBar' );

		$request = $this->getRequest();
		$output = $this->getOutput();
		$this->setHeaders();

		# Get request data from, e.g.
		$param = $request->getText( 'param' );

		# TODO
		// Read the current CC state, (validate it?)
		// $provider->getStore()->loadConfigurationUncached();
		// Render a form based on the schema and its state
		// Allow users to update the value
		// Validate and store the new value
		// REVIEW: Page permissions

		$wikitext = 'Hello world!';
		$output->addWikiTextAsInterface( $wikitext );
	}
}
