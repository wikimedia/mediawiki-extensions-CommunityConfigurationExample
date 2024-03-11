<?php

namespace CommunityConfigurationExample\Schemas;

// phpcs:disable Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class GrowthNewcomersHomepageSchema extends JsonSchema {

	private const TYPE_PAGE_TITLE = 'PageTitle';

	public const GEHomepageSuggestedEditsIntroLinks = [
		self::TYPE => self::TYPE_OBJECT,
		self::PROPERTIES => [
			'create' => [ self::REF => '#/$defs/' . self::TYPE_PAGE_TITLE ],
			'image' => [ self::REF => '#/$defs/' . self::TYPE_PAGE_TITLE ],
		],
		self::ADDITIONAL_PROPERTIES => false,
	];

	protected const DEFS = [
		self::TYPE_PAGE_TITLE => [
			self::TYPE => self::TYPE_STRING
		]
	];
}
