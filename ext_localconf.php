<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'User' => 'list,switch,logout',
	),
	// non-cacheable actions
	array(
		'User' => 'list,switch,logout',
	),
	Tx_Extbase_Utility_Extension::PLUGIN_TYPE_CONTENT_ELEMENT
);

?>