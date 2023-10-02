<?php
namespace CommunityConfigurationExample\Specials;

class SpecialCCExample extends \SpecialPage {
	function __construct() {
		parent::__construct( 'CommunityConfigurationExample' );
	}

	function execute( $par ) {
		$request = $this->getRequest();
		$output = $this->getOutput();
		$this->setHeaders();

		# Get request data from, e.g.
		$param = $request->getText( 'param' );

		# Do stuff
		# ...
		// Load JSON schema for a given CC
		// Validate it
		// Read the current CC state, (validate it?)
		// Render a form based on the schema and its state
		// Allow users to update the vale
		// TODO: Page permissions
		// Validate and store the new value

		$wikitext = 'Hello world!';
		$output->addWikiTextAsInterface( $wikitext );
	}
}
