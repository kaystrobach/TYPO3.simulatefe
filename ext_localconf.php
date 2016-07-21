<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'KAYSTROBACH.' . $_EXTKEY,
	'Simulate',
	array(
		'User' => 'list, switch, logout',

	),
	// non-cacheable actions
	array(
		'User' => 'list, switch, logout',
	),
	\TYPO3\CMS\Extbase\Service\ExtensionService::PLUGIN_TYPE_CONTENT_ELEMENT
);

