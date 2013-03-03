<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 
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


/**
 *
 *
 * @package simulatefe
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_Simulatefe_Controller_UserController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * userRepository
	 *
	 * @var Tx_Simulatefe_Domain_Repository_UserRepository
	 */
	protected $userRepository;

	/**
	 * injectUserRepository
	 *
	 * @param Tx_Simulatefe_Domain_Repository_UserRepository $userRepository
	 * @return void
	 */
	public function injectUserRepository(Tx_Simulatefe_Domain_Repository_UserRepository  $userRepository) {
		$this->userRepository = $userRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$users = $this->userRepository->findBySettings($this->settings);
		$this->view->assign('users', $users);
		$this->view->assign('currentUser', $GLOBALS["TSFE"]->fe_user->user);
		$this->view->assign('allUsersMaySwitchUser', $this->checkPermissions());
	}
	/**
	 * switch to the specific user
	 *
	 * @param Tx_Simulatefe_Domain_Model_User $user
	 *
	 * return void
	 */
	public function switchAction(Tx_Simulatefe_Domain_Model_User $user) {
		if($this->checkPermissions()) {
			$fe_user = t3lib_BEfunc::getRecord('fe_users', $user->getUid());
			$GLOBALS['TSFE']->fe_user->createUserSession($fe_user);
		} else {
			$this->flashMessageContainer->add('You´re not allowed to switch to a different user.', 'Access denied', t3lib_FlashMessage::ERROR);
		}
		$this->redirect('list');
		$this->view->assign('user', $user);
	}

	public function logoutAction() {
		$GLOBALS['TSFE']->fe_user->logoff();
		$this->redirect('list');
	}

	protected function checkPermissions() {
		switch($this->settings['securityConcept']) {
			case 'group':
				foreach($GLOBALS['TSFE']->fe_user->groupData['uid'] as $groupUid) {
					if(t3lib_div::inList($groupUid, $this->settings['securityGroupList'])) {
						return true;
					}
				}
			break;
			case 'admin':
			default:
				return $GLOBALS['BE_USER'] && $GLOBALS['BE_USER']->isAdmin();
			break;
		}
	}

}
?>