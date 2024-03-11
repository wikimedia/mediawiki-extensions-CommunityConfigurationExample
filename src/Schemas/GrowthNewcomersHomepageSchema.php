<?php

namespace CommunityConfigurationExample\Schemas;

// phpcs:disable Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;
use MediaWiki\Extension\CommunityConfiguration\Schemas\MediaWiki\MediaWikiDefinitions;

class GrowthNewcomersHomepageSchema extends JsonSchema {

	public const GEHomepageSuggestedEditsIntroLinks = [
		self::TYPE => self::TYPE_OBJECT,
		self::PROPERTIES => [
			'create' => [
				self::REF => [ 'class' => MediaWikiDefinitions::class, 'field' => 'PageTitle'  ]
			],
			'image' => [
				self::REF => [ 'class' => MediaWikiDefinitions::class, 'field' => 'PageTitle'  ]
			]
		],
		self::ADDITIONAL_PROPERTIES => false,
	];
}
