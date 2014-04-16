<?php
namespace App\Controller;

class AppController extends \Cake\Controller\Controller {

	use \Crud\Controller\ControllerTrait;

	public $viewClass = 'CrudView\View\CrudView';

	public $components = [
		'RequestHandler',
		'Crud.Crud' => [
			'actions' => ['Crud.Index', 'Crud.Add', 'Crud.Edit', 'Crud.View', 'Crud.Delete'],
			'listeners' => ['Crud.Api', 'Crud.ApiQueryLog', 'CrudView.View', 'Crud.RelatedModels']
		]
	];

}
