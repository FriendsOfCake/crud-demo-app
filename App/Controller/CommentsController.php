<?php

namespace App\Controller;

use App\Model\Entity\Comments;
use Cake\Event\Event;

class CommentsController extends AppController {

	/**
	 * Add action.
	 *
	 * @param void
	 * @return \Cake\Network\Response
	 */
	public function add() {
		$this->Crud->listener('relatedmodels')->relatedModels(['posts']);
		return $this->Crud->execute();
	}

	/**
	 * Edit action.
	 *
	 * @param string $id Entity id
	 * @return \Cake\Network\Response
	 */
	public function edit($id) {
		$this->Crud->listener('relatedmodels')->relatedModels(['posts']);
		return $this->Crud->execute();
	}

	/**
	 * View action.
	 *
	 * @param string $id Entity id
	 * @return \Cake\Network\Response
	 */
	public function view($id) {
		$this->Crud->on('beforeFind', function(Event $event) {
			$event->subject->query->contain('Posts');
		});

		return $this->Crud->execute();
	}

}
