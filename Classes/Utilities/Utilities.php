<?php
namespace KAYSTROBACH\Simulatefe\Utilities;
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

class Utilities {
	public static function getPidList($pid_list, $recursive) {
		$recursive = \TYPO3\CMS\Core\Utility\MathUtility::forceIntegerInRange($recursive, 0);

		$pid_list_arr = array_unique(\TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $pid_list, 1));
		$pid_list = array();

		/** @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $cObj */
		$cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer::class);

		foreach($pid_list_arr as $val) {
			$val = \TYPO3\CMS\Core\Utility\MathUtility::forceIntegerInRange($val, 0);
			if($val) {
				$_list = $cObj->getTreeList(-1 * $val, $recursive);
				if($_list) {
					$pid_list[] = $_list;
				}
			}
		}
		return $pid_list;
	}
}