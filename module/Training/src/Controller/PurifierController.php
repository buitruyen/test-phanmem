<?php
	/**
	 * Zend Framework (http://framework.zend.com/)
	 *
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Training\Controller;
	
	use Zend\Filter\StaticFilter;
	
	use Zend\Mvc\Controller\AbstractActionController;
	
	class PurifierController extends AbstractActionController{
		public function index01Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('HTML.AllowedElements' , 'div,p,h4');
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<h3>Hello</h3>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index02Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			
			// CHo phép tất cả các class
			// $config->set('Attr.AllowedClasses', null);
			
			// Chỉ cho phép một số class
			$config -> set('Attr.AllowedClasses' , [ 'content1' , 'abc1' ]);
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<h3 class="abc">Hello<p class="content"> ZendVN</p></h3>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index03Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('Attr.EnableID' , TRUE);
			
			// CHo phép tất cả các class
//			 $config->set('Attr.AllowedClasses', null);
			
			// Không cho phép có ID
//			 $config->set('Attr.EnableID', false);
			
			// Cho phép có ID
//			$config->set('Attr.EnableID', true);
			
			// Cấm một số ID
//			 $config->set('Attr.IDBlacklist', array('ABc'));
			
			// Namespacing IDs: bổ sung namespace (prefix) cho ID
			$config -> set('Attr.IDPrefix' , 'user_');
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<h3 id="abc">Hello<p id="content"> ZendVN</p></h3>';
			$input  .= '<p id="content-p"> ZendVN</p>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index04Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('Attr.EnableID' , TRUE);
			
			$config -> set('Attr.DefaultImageAlt' , 'zendvn');
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<img src="image/abc.png" alt="abc" />';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index05Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('Attr.EnableID' , TRUE);
			
			$config -> set('AutoFormat.DisplayLinkURI' , TRUE);
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<a href="www.zend.vn">ZendVN</a>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index06Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('Attr.EnableID' , TRUE);
			
			$config -> set('AutoFormat.RemoveEmpty' , TRUE);
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<div><a href="www.zend.vn">     </a></div';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index07Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('Attr.EnableID' , TRUE);
			
			$config -> set('HTML.Allowed' , 'div,span,h3');
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<h1>Span tag</h1>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index08Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('Attr.EnableID' , TRUE);
			
			$config -> set('HTML.AllowedAttributes' , 'style');
			$config -> set('CSS.AllowImportant' , FALSE);
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<h3 style="color: red !important;">Span tag</h3>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index09Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('Attr.EnableID' , TRUE);
			
			$config -> set('HTML.AllowedAttributes' , 'style,class,id');
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<h3 style="color: red !important;" class="abc" id="anc">Span tag</h3>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index10Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			$config -> set('Attr.EnableID' , TRUE);
			
			$config -> set('HTML.AllowedAttributes' , 'style,class,id');
			$config -> set('Output.SortAttr' , TRUE);
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<h3 style="color: red !important;" class="abc" id="anc">Span tag</h3>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index11Action(){
			$config = \HTMLPurifier_Config ::createDefault();
			
			$purifier = new \HTMLPurifier_HTMLPurifier($config);
			
			$input  = '<a href="&#106;&#97;&#118;&#97;&#115;&#99;&#114;&#105;&#112;&#116;&#58;&#97;&#108;&#101;&#114;&#116;&#40;&#39;&#88;&#83;&#83;&#39;&#41;">XSS</a>';
			$output = $purifier -> purify($input);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
		
		public function index12Action(){
			$input  = '<h3 style="color: red !important;" class="abc" id="anc">Span tag</h3>';
			$config = [
				[ 'Attr.EnableID' , TRUE ] ,
				[ 'Output.SortAttr' , TRUE ] ,
				[ 'Attr.IDPrefix' , 'zf2_' ],
			];
			
//			$filter		= new \ZendVN\Filter\Pufifer();
//			$output		= $filter->filter($input);
			
			$output = StaticFilter ::execute($input , 'Pufifer' , $config);
			
			echo '<h3 style="color:red;font-weight:bold">Input</h3>'.$input;
			echo '<h3 style="color:red;font-weight:bold">Output</h3>'.$output;
			
			return $this -> response;
		}
	}
