<?php

declare( strict_types = 1 );

namespace MediaWiki\Extension\CommunityConfigurationExample\Tests\Integration;

use MediaWiki\Extension\CommunityConfiguration\Tests\SchemaProviderTestCase;

/**
 * @coversNothing
 */
class ExampleSchemaTest extends SchemaProviderTestCase {

	protected function getExtensionName(): string {
		return 'CommunityConfigurationExample';
	}

	protected function getProviderId(): string {
		return 'CommunityConfigurationExample';
	}

}
