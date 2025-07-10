<?php

declare( strict_types = 1 );

namespace MediaWiki\Extension\CommunityConfigurationExample\Config\Schemas\Migrations;

use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;
use MediaWiki\Extension\CommunityConfiguration\Schemas\MediaWiki\MediaWikiDefinitions;

// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
// phpcs:disable Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
class ExampleSchema_1_0_0 extends JsonSchema {
	public const VERSION = '1.0.0';
	public const SCHEMA_NEXT_VERSION = '1.1.0';

	public const CCExample_OnOff = [
		self::ENUM => [
			'on',
			'off',
		],
		self::TYPE => self::TYPE_STRING,
		self::DEFAULT => 'off',
	];

	public const CCExample_String = [
		self::TYPE => self::TYPE_STRING,
		self::DEFAULT => '',
		self::MAX_LENGTH => 50,
	];

	public const CCExample_Numbers = [
		self::TYPE => self::TYPE_OBJECT,
		self::PROPERTIES => [
			'IntegerNumber' => [
				self::TYPE => self::TYPE_INTEGER,
				self::DEFAULT => 0,
				self::MINIMUM => 0,
				self::MAXIMUM => 42,
			],
			'DecimalNumber' => [
				self::TYPE => self::TYPE_NUMBER,
				self::DEFAULT => 0.6,
				self::MINIMUM => 0.0,
				self::MAXIMUM => 1.0,
				self::MULTIPLE_OF => 0.01,
			],
		],
	];

	public const CCExample_FavoriteColors = [
		self::TYPE => self::TYPE_ARRAY,
		self::DEFAULT => [],
		self::ITEMS => [
			self::ENUM => [
				'crimson',
				'firebrick',
				'gold',
				'tomato',
				'moccasin',
				'peachpuff',
				'mediumseagreen',
				'lime',
				'teal',
				'torquoise',
				'cyan',
				'midnightblue',
				'rebeccapurple',
				'navajowhite',
			],
			self::TYPE => self::TYPE_STRING,
		],
		self::MAX_ITEMS => 3,
	];

	public const CCExample_RelevantPages = [
		self::TYPE => self::TYPE_ARRAY,
		self::DEFAULT => [],
		self::ITEMS => [
			self::TYPE => self::TYPE_OBJECT,
			self::PROPERTIES => [
				'title' => [
					self::REF => [
						'class' => MediaWikiDefinitions::class,
						'field' => 'PageTitle',
					],
					// TODO: this does not work!
					self::MIN_LENGTH => 1,
				],
				'text' => [
					self::TYPE => self::TYPE_STRING,
					self::MIN_LENGTH => 1,
				],
			],
			self::REQUIRED => [ 'title', 'text' ],
		],
	];
}
