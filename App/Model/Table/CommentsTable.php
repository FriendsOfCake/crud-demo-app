<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table {

	public function initialize(array $config) {
		$this->belongsTo('Posts');
		$this->addBehavior('CounterCache', ['Posts' => ['comment_count']]);

		parent::initialize($config);
	}

	public function validationDefault(Validator $validator) {
		$validator
			->validatePresence('name')
			->add('name', 'notEmpty', [
				'rule' => 'notEmpty',
				'message' => 'You need to provide a title'
			])
			->validatePresence('body')
			->add('body', 'notEmpty', [
				'rule' => 'notEmpty',
				'message' => 'A body is required'
			]);

			return $validator;
    }

}
