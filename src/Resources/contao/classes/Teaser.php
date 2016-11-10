<?php

/**
 * Contao Open Source CMS Extension
 *
 * @package  	 Teaser (Content block pattern)
 * @author   	 Arne Stappen
 * @license  	 LGPL-3.0+ 
 * @copyright	 Arne Stappen (2016)
 */

namespace Agoat\ArticleTeaser;

use Contao\Frontend;



class Teaser extends Frontend
{
	// isVisible Hook
	public function checkVisibility($objElement, $blnIsVisible) 
	{ 
		if ($objElement instanceof \ContentModel && TL_MODE == 'FE')
		{
		dump($objElement);
			// direct article view
			if (($objElement->ptable == "tl_article" && \Input::get('articles')) || 
				($objElement->ptable == "tl_news" && \Input::get('items')))
			{

				if ($objElement->teaser == 'teaser')
				{
					$blnIsVisible = false;
				}

			}
			else
			{
				if ($objElement->teaser == 'article')
				{
					$blnIsVisible = false;
				}
			}
			
		}
		
		return $blnIsVisible;
	}
}
