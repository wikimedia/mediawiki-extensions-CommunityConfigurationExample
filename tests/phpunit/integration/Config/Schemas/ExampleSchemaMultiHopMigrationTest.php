<?php

declare( strict_types = 1 );

namespace MediaWiki\Extension\CommunityConfigurationExample\Tests\Integration;

use MediaWiki\Extension\CommunityConfiguration\Maintenance\MigrateConfig;
use MediaWiki\Page\WikiPage;
use MediaWiki\Tests\Maintenance\MaintenanceBaseTestCase;
use MediaWiki\Title\Title;
use stdClass;

/**
 * Migrations across more than one version boundary.
 *
 * ExampleSchema_Converter_1_1_0Test covers a single hop. This covers the recursion in
 * SchemaMigrator::doConvertDataToVersion(), which walks the chain one version at a time:
 * 1.0.0 <-> 1.1.0 <-> 1.2.0. A single-hop test cannot tell a working chain apart from one
 * where the second converter is never reached, or where the wrong converter is picked up for
 * the second hop.
 *
 * @group Database
 * @covers \MediaWiki\Extension\CommunityConfiguration\Schema\SchemaMigrator
 * @covers \MediaWiki\Extension\CommunityConfigurationExample\Config\Schemas\Converters\ExampleSchema_Converter_1_2_0
 */
class ExampleSchemaMultiHopMigrationTest extends MaintenanceBaseTestCase {

	private const CONFIG_PAGE = 'MediaWiki:CommunityConfigurationExample.json';
	private const PROVIDER_ID = 'CommunityConfigurationExample';

	protected function getMaintenanceClass(): string {
		return MigrateConfig::class;
	}

	protected function setUp(): void {
		parent::setUp();
		$this->markTestSkippedIfExtensionNotLoaded( 'CommunityConfigurationExample' );
	}

	private function storeConfig( string $json ): void {
		$this->assertStatusGood( $this->editPage( self::CONFIG_PAGE, $json ) );
	}

	/**
	 * Run the migration script against the example provider.
	 *
	 * @param string|null $targetVersion Version to migrate to, or null to let the script
	 *   default to the most recent one.
	 */
	private function migrateTo( ?string $targetVersion ): void {
		$this->maintenance->loadParamsAndArgs(
			null,
			$targetVersion === null ? [] : [ 'version' => $targetVersion ],
			[ self::PROVIDER_ID ]
		);
		$this->assertTrue( $this->maintenance->execute() );
	}

	private function getStoredConfig(): stdClass {
		/** @var WikiPage $wikipage */
		$wikipage = $this->getServiceContainer()->get( 'WikiPageFactory' )->newFromTitle(
			Title::newFromText( self::CONFIG_PAGE )
		);
		$dataStatus = $wikipage->getContent()->getData();
		$this->assertStatusGood( $dataStatus );
		return $dataStatus->getValue();
	}

	/**
	 * 1.0.0 -> 1.2.0 runs both converters in turn. No target version is passed, so this also
	 * covers MigrateConfig defaulting to the most recent schema version.
	 */
	public function testUpgradeAcrossTwoVersions(): void {
		$this->storeConfig( '{
	"$version": "1.0.0",
	"CCExample_OnOff": "on",
	"CCExample_String": "carried across both hops"
}' );

		$this->migrateTo( null );

		$this->assertEquals( (object)[
			'$version' => '1.2.0',
			// ExampleSchema_Converter_1_1_0 turned the "on" enum into a boolean.
			'CCExample_OnOff' => true,
			'CCExample_String' => 'carried across both hops',
			'CCExample_FavoriteColors' => [],
			'CCExample_Numbers' => (object)[
				'IntegerNumber' => 0,
				'DecimalNumber' => 0.6,
			],
			'CCExample_RelevantPages' => [],
			'CCExample_CustomControl' => 0,
			// ExampleSchema_Converter_1_2_0 folded CCExample_ValueA and CCExample_ValueB,
			// which only exist from 1.1.0 onwards, into a single object. Its presence proves
			// the second hop ran.
			'CCExample_Values' => (object)[
				'a' => 0,
				'b' => '',
			],
			'CCExample_ValueC' => '',
		], $this->getStoredConfig() );
	}

	/**
	 * 1.2.0 -> 1.0.0 runs both converters in reverse.
	 */
	public function testDowngradeAcrossTwoVersions(): void {
		$this->storeConfig( '{
	"$version": "1.2.0",
	"CCExample_OnOff": true,
	"CCExample_String": "carried across both hops",
	"CCExample_Values": { "a": 7, "b": "seven" },
	"CCExample_ValueC": "no home in 1.1.0"
}' );

		$this->migrateTo( '1.0.0' );

		$this->assertEquals( (object)[
			'$version' => '1.0.0',
			'CCExample_OnOff' => 'on',
			'CCExample_String' => 'carried across both hops',
			'CCExample_FavoriteColors' => [],
			'CCExample_Numbers' => (object)[
				'IntegerNumber' => 0,
				'DecimalNumber' => 0.6,
			],
			'CCExample_RelevantPages' => [],
		], $this->getStoredConfig() );
	}

	/**
	 * ExampleSchema_Converter_1_2_0 only reshapes CCExample_ValueA and CCExample_ValueB, so
	 * 1.1.0 data must survive a trip to 1.2.0 and back unchanged. CCExample_ValueC is the one
	 * thing the round trip cannot keep, because 1.1.0 has nowhere to put it.
	 */
	public function testRoundTripThroughLatestPreservesValues(): void {
		$this->storeConfig( '{
	"$version": "1.1.0",
	"CCExample_OnOff": true,
	"CCExample_ValueA": 7,
	"CCExample_ValueB": "seven"
}' );

		$this->migrateTo( '1.2.0' );

		$upgradedConfig = $this->getStoredConfig();
		$this->assertEquals(
			(object)[ 'a' => 7, 'b' => 'seven' ],
			$upgradedConfig->CCExample_Values,
			'the upgrade must fold both values into CCExample_Values'
		);
		$this->assertObjectNotHasProperty( 'CCExample_ValueA', $upgradedConfig );
		$this->assertObjectNotHasProperty( 'CCExample_ValueB', $upgradedConfig );

		$this->migrateTo( '1.1.0' );

		$this->assertObjectNotHasProperty(
			'CCExample_ValueC',
			$this->getStoredConfig(),
			'a property the older schema does not define must not survive the downgrade'
		);

		// Both values come back under their original names, and nothing else moved. The
		// defaults are spelled out because migrating stores a complete configuration, not
		// the sparse one the test started from.
		$this->assertEquals( (object)[
			'$version' => '1.1.0',
			'CCExample_OnOff' => true,
			'CCExample_String' => '',
			'CCExample_FavoriteColors' => [],
			'CCExample_Numbers' => (object)[
				'IntegerNumber' => 0,
				'DecimalNumber' => 0.6,
			],
			'CCExample_RelevantPages' => [],
			'CCExample_CustomControl' => 0,
			'CCExample_ValueA' => 7,
			'CCExample_ValueB' => 'seven',
		], $this->getStoredConfig() );
	}
}
