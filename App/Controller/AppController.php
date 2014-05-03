<?php
namespace App\Controller;

class AppController extends \Cake\Controller\Controller {

	use \Crud\Controller\ControllerTrait;

	public $viewClass = 'CrudView\View\CrudView';

	public $components = [
		'RequestHandler',
		'Search.Prg',
		'Crud.Crud' => [
			'actions' => [
				'Crud.Index',
				'Crud.Add',
				'Crud.Edit',
				'Crud.View',
				'Crud.Delete',
				'Crud.Lookup'
			],
			'listeners' => [
				'Crud.Api',
				'Crud.ApiQueryLog',
				'Crud.RelatedModels',
				'Crud.Redirect',
				'CrudView.View',
				'CrudView.Search',
			]
		]
	];

	public $helpers = [
		'Form' => [
			'templates' => 'CrudView.forms',
			'widgets' => [
				'textarea' => ['CrudView\View\Widget\Textarea'],
				'select' => ['CrudView\View\Widget\SelectBox'],
				'label' => ['CrudView\View\Widget\Label'],
				'datetime' => ['CrudView\View\Widget\DateTime', 'select'],
				'_default' => ['CrudView\View\Widget\Basic'],
			]
		],
		'Paginator' => [
			'templates' => 'CrudView.paginator'
		]
	];

}
