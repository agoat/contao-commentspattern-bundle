<?php

/**
 * Contao Open Source CMS Extension
 *
 * @package  	 Teaser (Content block pattern)
 * @author   	 Arne Stappen
 * @license  	 LGPL-3.0+ 
 * @copyright	 Arne Stappen (2016)
 */

namespace Agoat\CommentsPattern;

use Contao\Database;


class Comments extends \Contao\Comments
{
	// listComments Hook
	public function listPatternComments($arrRow) 
	{
		if ($arrRow['source'] == 'tl_article')
		{
			$db = Database::getInstance();
			
			$objParent = 	$db->prepare("SELECT id, title FROM tl_article WHERE id=?")
							   ->execute($arrRow['parent']);
			
			if ($objParent->numRows)
			{
				return ' (<a href="contao/main.php?do=article&amp;table=tl_content&amp;id=' . $objParent->id . '&amp;rt=' . REQUEST_TOKEN . '">' . $objParent->title . '</a>)';
			}
		}
	}
}

