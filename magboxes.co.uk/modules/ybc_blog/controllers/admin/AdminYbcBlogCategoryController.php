<?php
    /**
     * Copyright YourBestCode.com
     * Email: support@yourbestcode.com
     * First created: 21/12/2015
     * Last updated: NOT YET
    */
    
    if (!defined('_PS_VERSION_'))
    	exit;
    class AdminYbcBlogCategoryController extends ModuleAdminController
    {
       public function __construct()
	   {
	       $context = Context::getContext();
	       $blogLink = $context->link->getAdminLink('AdminModules').'&configure=ybc_blog&module_name=ybc_blog&control=category&list=true';
	       Tools::redirectAdmin($blogLink);
           exit();
       }
    }
