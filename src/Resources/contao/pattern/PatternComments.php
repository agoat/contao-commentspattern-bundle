<?php
/**
 * Contao Open Source CMS Extension
 *
 * @package  	 Teaser (Content block pattern)
 * @author   	 Arne Stappen
 * @license  	 LGPL-3.0+ 
 * @copyright	 Arne Stappen (2016)
 */

namespace Agoat\ContentBlocks;

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
		$objConfig->perPage = $this->com_perPage;
		$objConfig->order = $this->com_order;
		$objConfig->template = $this->com_template; // comments template
		$objConfig->requireLogin = $this->com_requireLogin;
		$objConfig->disableCaptcha = $this->com_disableCaptcha;
		$objConfig->bbcode = $this->com_bbcode;
		$objConfig->moderate = $this->com_moderate;
		
		$objCommentOutput = new \FrontendTemplate();
		
		
		
		// pattern
		// sorting, totalitems, perpage; allowcommetnsform >> moderate, bbcode, reqlogin, disablesecure, frmTemplate
		
		
		// custom template: cb_comments (example)
		// custom com_standard
		// custom 
		
		
		// add (and save) comments to new frontend template
		
		// take the comments array and set to new array['comments']
		// take the form tempalte and render the submit form 'mod_comment_form
		// take the result to the array['form']
		
		// take the tl_article as source table
		// pattern has multiple modes: 1. show only the count , 2. show count and a number of comments, 3. show comments and form
		
		// count directly
		// load comments from model
		
		// if form submit
		
		
		
		
		// maybe use custom comment class to use or use not the function renderCommentForm directly
		$this->Comments->addCommentsToTemplate($objCommentOutput, $objConfig, $this->ptable, $this->pid, $GLOBALS['TL_ADMIN_EMAIL']);
		
		$this->writeToTemplate($objCommentOutput->getData());
		
	}


	
}
