<?php
	/**
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Training;
	
	use Zend\Router\Http\Literal;
	use Zend\Router\Http\Segment;
	use Zend\ServiceManager\Factory\InvokableFactory;
	
	return [
		'router'       => [
			'routes' => [
				'home'       => [
					'type'    => Literal::class ,
					'options' => [
						'route'    => '/' ,
						'defaults' => [
							'controller' => Controller\IndexController::class ,
							'action'     => 'index' ,
						] ,
					] ,
				] ,
				'training'   => [
					'type'    => Segment::class ,
					'options' => [
						'route'    => '/training/index[/:action]' ,
						'defaults' => [
							'controller' => Controller\IndexController::class ,
							'action'     => 'index' ,
						] ,
					] ,
				] ,
				'config'     => [
					'type'    => Segment::class ,
					'options' => [
						'route'    => '/training/config[/:action]' ,
						'defaults' => [
							'controller' => Controller\ConfigController::class ,
							'action'     => 'index' ,
						] ,
					] ,
				] ,
				'autoloader' => [
					'type'    => Segment::class ,
					'options' => [
						'route'    => '/training/autoloader[/:action]' ,
						'defaults' => [
							'controller' => Controller\EscaperController::class ,
							'action'     => 'index' ,
						] ,
					] ,
				] ,
				'serializer' => [
					'type'    => Segment::class ,
					'options' => [
						'route'    => '/training/serializer[/:action]' ,
						'defaults' => [
							'controller' => Controller\JsonController::class ,
							'action'     => 'index' ,
						] ,
					] ,
				] ,
			] ,
		] ,
		'controllers'  => [
			'factories' => [
				Controller\IndexController::class      => InvokableFactory::class ,
				Controller\ConfigController::class     => InvokableFactory::class ,
				Controller\EscaperController::class    => InvokableFactory::class ,
				Controller\PurifierController::class => InvokableFactory::class ,
				Controller\JsonController::class => InvokableFactory::class ,
			] ,
		] ,
		'view_manager' => [
			'template_path_stack' => [
				__DIR__.'/../view' ,
			] ,
		] ,
	];
