<?php

namespace CommunityConfigurationExample\Schemas;

// phpcs:disable Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class GrowthNewcomersHomepageSchema extends JsonSchema {

	public const GEHomepageSuggestedEditsIntroLinks = [
		self::TYPE => self::TYPE_OBJECT,
		self::PROPERTIES => [
			'create' => [ self::TYPE => self::TYPE_STRING ],
			'image' => [ self::TYPE => self::TYPE_STRING ],
		],
		self::ADDITIONAL_PROPERTIES => false,
	];
}
