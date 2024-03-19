<?php
namespace CommunityConfigurationExample\EditorCapabilities;

use MediaWiki\Extension\CommunityConfiguration\Specials\GenericFormEditorCapability;

class GrowthExperimentsEditor extends GenericFormEditorCapability {

	public function execute( ?string $subpage ): void {
		parent::execute( $subpage );
		$out = $this->getContext()->getOutput();
		$rlModules = [ 'ext.communityConfiguration.GrowthExperiments' ];

		// TODO create some helpers to add modules to the config
		$communityConfigurationData = $out->getJsConfigVars()['communityConfigurationData'];
		$communityConfigurationData['config']['modules'] = $rlModules;

		$out->addJsConfigVars( [
			'communityConfigurationData' => $communityConfigurationData
		] );
		$out->addModules( $rlModules );
	}
}
