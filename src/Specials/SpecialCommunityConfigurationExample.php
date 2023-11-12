<?php
namespace CommunityConfigurationExample\Specials;

use MediaWiki\Extension\CommunityConfiguration\CommunityConfigurationServices;
use MediaWiki\Extension\CommunityConfiguration\Provider\ConfigurationProviderFactory;
use MediaWiki\MediaWikiServices;
use SpecialPage;

class SpecialCommunityConfigurationExample extends SpecialPage {

	private ConfigurationProviderFactory $configurationProviderFactory;

	public function __construct(
		ConfigurationProviderFactory $configurationProviderFactory
	) {
		parent::__construct( 'CommunityConfigurationExample' );

		$this->configurationProviderFactory = $configurationProviderFactory;
	}

	public function execute( $par ) {
		parent::execute( $par );

		$provider = $this->configurationProviderFactory->newProvider( 'FooBar' );



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
