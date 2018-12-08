<?php
	
	namespace Started\Controller;
	
	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	
	class UserController extends AbstractActionController{
		public function loginAction(){
			$checkMethod = $this -> getRequest();
			
			if($checkMethod -> isGet()){
				$action = $this -> params() -> fromRoute('action' , 'abc');
				$id     = $this -> params() -> fromRoute('id' , '1');
				
				
				
			}else{
				$action='index';
				$id=-1;
			}
			if($id >=0){
//				$this->getResponse() ->setStatusCode(404);
//				return;
				throw new \Exception("id $id khong duoc tim thay");
			
			}
			return new ViewModel([
				'id' =>$id,
				'action' =>$action
			                     ]);
		}
		
		public function logoutAction(){
			echo 'Logout Page';
			return FALSE;
		}
	}