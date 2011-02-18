<?php
function smarty_function_IWmenumenulinks($params, &$smarty)
{
	$dom=ZLanguage::getModuleDomain('IWmenu');
	// set some defaults
	if (!isset($params['start'])) {
		$params['start'] = '[';
	}
	if (!isset($params['end'])) {
		$params['end'] = ']';
	}
	if (!isset($params['seperator'])) {
		$params['seperator'] = '|';
	}
	if (!isset($params['class'])) {
		$params['class'] = 'pn-menuitem-title';
	}

	$menumenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('IWmenu::', "::", ACCESS_ADMIN)) {
		$menumenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWmenu', 'admin', 'newItem', array('m' => 'n'))) . "\">" . __('Add a new option to the menu', $dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('IWmenu::', "::", ACCESS_ADMIN)) {
		$menumenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWmenu', 'admin', 'main')) . "\">" . __('Show the options', $dom) . "</a> ";
	}
	if (SecurityUtil::checkPermission('IWmenu::', "::", ACCESS_ADMIN)) {
		$menumenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('IWmenu', 'admin', 'conf')) . "\">" . __('Configure the module', $dom) . "</a> ";
	}

	$menumenulinks .= $params['end'] . "</span>\n";

	return $menumenulinks;
}
