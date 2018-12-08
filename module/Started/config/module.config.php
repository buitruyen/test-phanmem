<?php
	/**
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Started;
	
	use Zend\Router\Http\Literal;
	use Zend\Router\Http\Segment;
	use Zend\ServiceManager\Factory\InvokableFactory;
	
	return [
		'router'       => [
			'routes' => [
//            'started' => [ //Name router
//                'type'    => Segment::class, //type router
//                'options' => [
//                    'route'    => '/started[/:action]',
//                    'defaults' => [
//                        'controller' => Controller\IndexController::class,
//                        'action'     => 'index',
//                    ],
//                ],
//            ],

'started' => [
	'type'    => Literal::class ,
	'options' => [
		'route'    => '/started' ,
		'defaults' => [
			'controller' => Controller\IndexController::class ,
			'action'     => 'index' ,
		] ,
	] ,
] ,

'started-edit' => [
	'type'    => Literal::class ,
	'options' => [
		'route'    => '/started/edit' ,
		'defaults' => [
			'controller' => Controller\IndexController::class ,
			'action'     => 'edit' ,
		] ,
	] ,
] ,
			] ,
		] ,
		'controllers'  => [
			'factories' => [
				Controller\IndexController::class => InvokableFactory::class ,
			] ,
		] ,
		'view_manager' => [
			
			'template_path_stack' => [
				__DIR__.'/../view' ,
			] ,
		] ,
	];
