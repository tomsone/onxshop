<?php
	/**
	 * Supported Translations for phpPgAdmin
	 *
	 * $Id: translations.php,v 1.4 2007/02/10 03:48:34 xzilla Exp $
	 */
	
	
	// List of language files, and encoded language name.
	
	$appLangFiles = array(
		'afrikaans' => 'Afrikaans',
		'arabic' => '&#1593;&#1585;&#1576;&#1610;',
		'catalan' => 'Catal&#224;',
		'chinese-tr' => '&#32321;&#39636;&#20013;&#25991;',
		'chinese-sim' => '&#31616;&#20307;&#20013;&#25991;',
		'chinese-utf8-zh_TW' => '&#27491;&#39636;&#20013;&#25991;&#65288;UTF-8&#65289;', 
		'chinese-utf8-zh_CN' => '&#31616;&#20307;&#20013;&#25991;&#65288;UTF-8&#65289;', 
		'czech' => '&#268;esky',
		'danish' => 'Danish',
		'dutch' => 'Nederlands',
		'english' => 'English',
		'french' => 'Fran&ccedil;ais',
		'galician' => 'Galego',
		'german' => 'Deutsch',
        'greek' => '&#917;&#955;&#955;&#951;&#957;&#953;&#954;&#940;',
		'hebrew' => 'Hebrew',
		'italian' => 'Italiano',
		'japanese' => '&#26085;&#26412;&#35486;',
		'hungarian' => 'Magyar',
		'mongol' => 'Mongolian',
		'polish' => 'Polski',
		'portuguese-br' => 'Portugu&ecirc;s-Brasileiro',
		'romanian' => 'Rom&acirc;n&#259;',
		'russian' => '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;',
		'russian-utf8' => '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081; (UTF-8)',
		'slovak' => 'Slovensky',
		'swedish' => 'Svenska',
		'spanish' => 'Espa&ntilde;ol',
		'turkish' => 'T&uuml;rk&ccedil;e',
		'ukrainian' => '&#1059;&#1082;&#1088;&#1072;&#9558;&#1085;&#1089;&#1100;&#1082;&#1072;'
	);
	
	
	// ISO639 language code to language file mapping.
	// See http://www.w3.org/WAI/ER/IG/ert/iso639.htm for language codes
	
	// If it's available 'language-country', but not general
	// 'language' translation (eg. 'portuguese-br', but not 'portuguese')
	// specify both 'la' => 'language-country' and 'la-co' => 'language-country'.
	
	$availableLanguages = array(
		'af' => 'afrikaans',
		'ar' => 'arabic',
		'ca' => 'catalan',
		'zh' => 'chinese-tr',
		'zh-cn' => 'chinese-sim',
		'utf8-zh-cn' => 'chinese-utf8-cn',
		'utf8-zh-tw' => 'chinese-utf8-tw',
		'cs' => 'czech',
		'da' => 'danish',
		'nl' => 'dutch',
		'en' => 'english',
		'fr' => 'french',
		'gl' => 'galician',
		'de' => 'german',
        'el' => 'greek',
		'he' => 'hebrew',
		'it' => 'italian',
		'ja' => 'japanese',
		'hu' => 'hungarian',
		'mn' => 'mongol',
		'pl' => 'polish',
		'pt' => 'portuguese-br',
		'pt-br' => 'portuguese-br',
		'ro' => 'romanian',
		'ru' => 'russian',
		'sk' => 'slovak',
		'sv' => 'swedish',
		'es' => 'spanish',
		'tr' => 'turkish',
		'uk' => 'ukrainian'
	);
?>
