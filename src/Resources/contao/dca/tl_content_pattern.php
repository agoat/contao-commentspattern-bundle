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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content_pattern']['palettes']['comments'] = '{type_legend},type;{comments_legend},comOrder,comPerPage,comModerate,comBbcode,comRequireLogin,comDisableCaptcha,comTemplate,comFormTemplate;{pattern_legend},alias;{invisible_legend},invisible';

// Fields
$GLOBALS['TL_DCA']['tl_content_pattern']['fields']['comOrder'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content_pattern']['comOrder'],
	'default'                 => 'ascending',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('ascending', 'descending'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content_pattern']['fields']['comPerPage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content_pattern']['comPerPage'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content_pattern']['fields']['comModerate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content_pattern']['comModerate'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content_pattern']['fields']['comBbcode'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content_pattern']['comBbcode'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content_pattern']['fields']['comDisableCaptcha'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content_pattern']['comDisableCaptcha'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content_pattern']['fields']['comRequireLogin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content_pattern']['comRequireLogin'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content_pattern']['fields']['comTemplate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content_pattern']['comTemplate'],
	'default'                 => 'com_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_pattern_comments', 'getCommentsTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content_pattern']['fields']['comFormTemplate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content_pattern']['comFormTemplate'],
	'default'                 => 'com_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_pattern_comments', 'getCommentFormTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);




/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @author Arne Stappen (aGoat) <https://github.com/agoat>
 */
class tl_content_pattern_comments extends Backend
{
	/**
	 * Return all comments templates as array
	 *
	 * @return array
	 */
	public function getCommentsTemplates()
	{
		return $this->getTemplateGroup('com_');
	}


	/**
	 * Return all comments templates as array
	 *
	 * @return array
	 */
	public function getCommentFormTemplates()
	{
		return $this->getTemplateGroup('mod_comment');
	}

}


