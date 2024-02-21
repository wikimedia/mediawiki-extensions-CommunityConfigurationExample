<?php

namespace CommunityConfigurationExample\Schemas;

// phpcs:disable Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class GrowthMentorshipSchema extends JsonSchema {
	public const GEMentorshipAutomaticEligibility = [
		self::TYPE => self::TYPE_BOOLEAN,
		self::DEFAULT => true,
	];
	public const GEMentorshipEnabled = [
		self::TYPE => self::TYPE_BOOLEAN,
		self::DEFAULT => true,
	];
	public const GEMentorshipMinimumAge = [
		self::TYPE => self::TYPE_NUMBER,
		self::DEFAULT => 90,
	];
	public const GEMentorshipMinimumEditcount = [
		self::TYPE => self::TYPE_NUMBER,
		self::DEFAULT => 500,
	];
	public const GEPersonalizedPraiseDays = [
		self::TYPE => self::TYPE_NUMBER,
		self::DEFAULT => 7,
	];
	// FIXME: type used in production is string
	public const GEPersonalizedPraiseDefaultNotificationsFrequency = [
		self::TYPE => self::TYPE_NUMBER,
		self::DEFAULT => 168,
	];
	public const GEPersonalizedPraiseMaxEdits = [
		self::TYPE => self::TYPE_NUMBER,
		self::DEFAULT => 500,
	];
	public const GEPersonalizedPraiseMinEdits = [
		self::TYPE => self::TYPE_NUMBER,
		self::DEFAULT => 8,
	];
}
