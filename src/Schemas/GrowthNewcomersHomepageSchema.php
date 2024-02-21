<?php

namespace CommunityConfigurationExample\Schemas;

// phpcs:disable Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class GrowthNewcomersHomepageSchema implements JsonSchema {

	public const GEHomepageSuggestedEditsIntroLinks = [
		self::TYPE => self::TYPE_OBJECT,
		self::PROPERTIES => [
			'createIntroLink' => [ self::TYPE => self::TYPE_STRING ],
			'imageIntroLink' => [ self::TYPE => self::TYPE_STRING ],
		],
		self::ADDITIONAL_PROPERTIES => false,
	];
}
