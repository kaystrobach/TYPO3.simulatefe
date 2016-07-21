<?php
namespace KAYSTROBACH\Simulatefe\Domain\Repository;

use KAYSTROBACH\Simulatefe\Utilities\Utilities;
use TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2012
 *  (c) 2016 Markus Gerdes <markus@madaxel.de>, MadaXel IT Solutions UG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
class UserRepository extends FrontendUserRepository {

	/**
	 * @param $settings
	 */
	function findBySettings($settings) {
		$query = $this->createQuery();
		$query->getQuerySettings()->setStoragePageIds(Utilities::getPidList($settings['storagePid'], $settings['recursive']));
		$query->setOrderings(array(
			'username' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		));
		return $query->execute();
	}

}