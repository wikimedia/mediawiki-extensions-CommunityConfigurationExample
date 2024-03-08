<?php

namespace CommunityConfigurationExample\Schemas;

// phpcs:disable Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class GrowthHelpPanelSchema extends JsonSchema {
	// FIXME this duplicates a type defined in GrowthNewcomersHomepageSchema,
	// should we extract it to some "definitions" file?
	private const TYPE_PAGE_TITLE = 'PageTitle';
	private const TYPE_NAMESPACES = 'Namespaces';

	public const GEHelpPanelExcludedNamespaces = [
		self::REF => '#/$defs/' . self::TYPE_NAMESPACES
	];
	public const GEHelpPanelReadingModeNamespaces = [
		self::REF => '#/$defs/' . self::TYPE_NAMESPACES
	];
	public const GEHelpPanelSearchNamespaces = [
		self::REF => '#/$defs/' . self::TYPE_NAMESPACES
	];
	// REVIEW consider refactoring type from boolean to "OneOfEnum"
	public const GEHelpPanelAskMentor = [
		self::TYPE => self::TYPE_BOOLEAN
	];
	public const GEHelpPanelHelpDeskTitle = [
		self::REF => '#/$defs/' . self::TYPE_PAGE_TITLE
	];
	// REVIEW consider refactoring type from boolean to "OneOfEnum"
	public const GEHelpPanelHelpDeskPostOnTop = [
		self::TYPE => self::TYPE_BOOLEAN
	];

	public const GEHelpPanelLinks = [
		// FIXME replace by TYPE_ARRAY when available
		self::TYPE => 'array',
		// FIXME replace by self::ITEMS when available
		'items' => [
			self::TYPE => self::TYPE_OBJECT
		]
	];

	public const GEHelpPanelViewMoreTitle = [

	];

	protected const DEFS = [
		self::TYPE_PAGE_TITLE => [
			self::TYPE => self::TYPE_STRING
		],
		self::TYPE_NAMESPACES => [
			// FIXME replace by TYPE_ARRAY when available
			self::TYPE => 'array',
			// FIXME replace by self::ITEMS when available
			'items' => [
				self::TYPE => self::TYPE_NUMBER
			]
		]
	];
}
