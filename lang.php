<?php
/*$tab = ['fr', 'en', 'de'];
function autoSelectLanguage(  $tab, $sDefault = 'fr') {
	if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		$aBrowserLanguages = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
		foreach($aBrowserLanguages as $sBrowserLanguage) {
			$sLang = strtolower(substr($sBrowserLanguage,0,2));
			if(in_array($sLang, $aLanguages)) {
				return $sLang;
      			}
    		}
  	}
	return $sDefault;
}

echo autoSelectLanguage();*/

$lang = strtolower(substr(explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0], 0,2)); echo $lang;

?>