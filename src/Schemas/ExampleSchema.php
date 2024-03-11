<?php

namespace CommunityConfigurationExample\Schemas;

use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;
use MediaWiki\Extension\CommunityConfiguration\Schemas\MediaWiki\MediaWikiDefinitions;

class ExampleSchema extends JsonSchema {
	public const CCExampleBackgroundColor = [
		self::TYPE => self::TYPE_STRING
	];

	public const CCExamplePageTitle = [
		self::REF => [ 'class' => MediaWikiDefinitions::class, 'field' => 'PageTitle'  ]
	];
}
