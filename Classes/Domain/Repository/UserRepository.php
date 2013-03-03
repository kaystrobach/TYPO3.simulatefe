<?php
class Tx_Simulatefe_Domain_Repository_UserRepository extends Tx_Extbase_Persistence_Repository {
	function findBySettings($settings) {
		$query = $this->createQuery();
		$query->getQuerySettings()->setStoragePageIds(Tx_Simulatefe_Utilities_Utilities::getPidList($settings['storagePid'], $settings['recursive']));
		$query->setOrderings(
			array(
				'username' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING
			)
		);
		return $query->execute();
	}
}
?>