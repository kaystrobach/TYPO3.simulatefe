<?php

class Tx_Simulatefe_Utilities_Utilities {
	public static function getPidList($pid_list, $recursive) {
		$recursive = t3lib_div::intInRange($recursive, 0);

		$pid_list_arr = array_unique(t3lib_div::trimExplode(',', $pid_list, 1));
		$pid_list     = array();

		$cObj = t3lib_div::makeInstance('tslib_cObj');

		foreach($pid_list_arr as $val) {
			$val = t3lib_div::intInRange($val, 0);
			if ($val) {
				$_list = $cObj->getTreeList(-1 * $val, $recursive);
				if ($_list) {
					$pid_list[] = $_list;
				}
			}
		}
		return $pid_list;
	}
}