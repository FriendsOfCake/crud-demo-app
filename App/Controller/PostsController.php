<?php

namespace App\Controller;

use App\Model\Entity\Posts;
use Cake\Event\Event;

class PostsController extends AppController {

	public $paginate = ['limit' => 5];

	/**
	 * beforeFilter.
	 *
	 * @param Cake\Event\Event $event Event instance
	 * @return \Cake\Network\Response
	 */
	public function beforeFilter(Event $event) {
		return parent::beforeFilter($event);
	}

	/**
	 * Add action.
	 *
	 * @param void
	 * @return \Cake\Network\Response
	 */
	public function index() {
		$this->Crud->action()->config('scaffold.fields_blacklist', ['id']);
		$this->Crud->action()->config('scaffold.fields', ['name', 'is_active', 'comment_count']);

		$this->Crud->on('beforePaginate', function(Event $event) {
			$event->subject->object = $this->Posts->find('search', $this->request->query);
		});

		return $this->Crud->execute();
	}

	/**
	 * Add action.
	 *
	 * @param void
	 * @return \Cake\Network\Response
	 */
	public function add() {
		return $this->Crud->execute();
	}

}
