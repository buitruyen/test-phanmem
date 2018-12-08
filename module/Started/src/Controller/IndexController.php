<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Started\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        
        return new ViewModel();
    }
	public function editAction()
	{
		echo "Hello action edit1";
		return FALSE;
	}
	
//	public function loginAction(){
//	 echo 'Login Page';
//	 return FALSE;
//	}
	
}
