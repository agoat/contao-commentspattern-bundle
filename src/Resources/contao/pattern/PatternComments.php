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

use Agoat\ContentBlocks\Pattern;
use Contao\Module;



class PatternComments extends Pattern
{

	/**
	 * generate the DCA construct
	 */
	public function construct()
	{
		// nothing to select
		return;
	}
	

	/**
	 * Generate backend output
	 */
	public function view()
	{
		return '<span>Comments</span>';
	}

	/**
	 * Generate data for the frontend template 
	 */
	public function compile()
	{
		$this->import('Comments');
		
		$objConfig = new \stdClass();
		$objConfig->perPage = $this->comPerPage;
		$objConfig->order = $this->comOrder;
		$objConfig->template = $this->comTemplate; // comments template
		$objConfig->requireLogin = $this->comRequireLogin;
		$objConfig->disableCaptcha = $this->comDisableCaptcha;
		$objConfig->bbcode = $this->comBbcode;
		$objConfig->moderate = $this->comModerate;
		
		$objCommentsTemplate = new \FrontendTemplate();
		
		// render the comments and prepare data for comment form
		$this->Comments->addCommentsToTemplate($objCommentsTemplate, $objConfig, $this->Template->ptable, $this->Template->pid, $GLOBALS['TL_ADMIN_EMAIL']);
		
		// render the comment form
		$objCommentFormTemplate = new \FrontendTemplate('mod_comment_form');
		$objCommentFormTemplate->setData($objCommentsTemplate->getData());
		
		
		$arrComments = array
		(
			'ccount' 		=> $objCommentsTemplate->commentsTotal, 
			'comments' 		=> $objCommentsTemplate->comments, 
			'pagination' 	=> $objCommentsTemplate->pagination, 
			'form'			=> (TL_MODE == 'FE') ? $objCommentFormTemplate->parse() : ''
		);
		
		$this->writeToTemplate($arrComments);
		
	}
	
}
