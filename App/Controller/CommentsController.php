<?php

namespace App\Controller;

use App\Model\Entity\Comments;
use Cake\Event\Event;

class CommentsController extends AppController {

	public function add() {
		$this->Crud->listener('relatedmodels')->relatedModels(['posts']);
		return $this->Crud->execute();
	}

	public function edit($id) {
		$this->Crud->listener('relatedmodels')->relatedModels(['posts']);
		return $this->Crud->execute();
	}

	public function view($id) {
		$this->Crud->on('beforeFind', function(Event $event) {
			$event->subject->query->contain('Posts');
		});

		return $this->Crud->execute();
	}

}
