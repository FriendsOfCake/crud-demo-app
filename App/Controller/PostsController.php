<?php

namespace App\Controller;

use App\Model\Entity\Posts;
use Cake\Event\Event;

class PostsController extends AppController {

	public $paginate = ['limit' => 5];

	public function beforeFilter(Event $event) {
		return parent::beforeFilter($event);
	}

	public function index() {
		$this->Crud->action()->config('scaffold.fields_blacklist', ['id']);
		$this->Crud->action()->config('scaffold.fields', ['name', 'is_active', 'comment_count']);

		$this->Crud->on('beforePaginate', function(Event $event) {
			$event->subject->object = $this->Posts->find('search', $this->request->query);
		});

		return $this->Crud->execute();
	}

	public function add() {
		return (new \Crud\Action\AddAction($this))->handle();
	}

}
