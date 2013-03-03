<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Simulate',
	array(
		'User' => 'list,switch,logout',

	),
	// non-cacheable actions
	array(
		'User' => 'list,switch,logout',
	)
);

?>