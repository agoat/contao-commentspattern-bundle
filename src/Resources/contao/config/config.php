<?php
/**
 * Contao Open Source CMS Extension
 *
 * @package  	 Teaser (Content block pattern)
 * @author   	 Arne Stappen
 * @license  	 LGPL-3.0+ 
 * @copyright	 Arne Stappen (2016)
 */
 
 
/**
 * Content pattern
 */
$GLOBALS['TL_CTP']['system']['comments'] = 'Agoat\CommentsPattern\PatternComments';


/**
 * Content pattern not allowed in sub pattern
 */
$GLOBALS['TL_CTP_NA']['multipattern'][] = 'comments';


/**
 * HOOK
 */
$GLOBALS['TL_HOOKS']['listComments'][] = array('Agoat\\CommentsPattern\\Comments', 'listPatternComments'); 

