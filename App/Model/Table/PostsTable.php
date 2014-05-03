<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

class PostsTable extends Table {

	public function initialize(array $config) {
		$this->hasMany('Comments');
		return parent::initialize($config);
	}

	public function validationDefault(Validator $validator) {
		$validator
			->validatePresence('name')
			->add('name', [
				'length' => [
					'rule' => ['minLength', 10],
					'message' => 'Name need to be at least 10 characters long',
				]
			])
			->add('body', [
				'length' => [
					'rule' => ['minLength', 10],
					'message' => 'Body need to be at least 10 characters long',
				]
		]);

		return $validator;
	}

/**
 * Construct search configuration
 *
 * @return Search\Manager
 */
	public function searchConfiguration() {
		$search = new Manager($this);
		$search
			->value('is_active')
			->like('name', [
				'before' => true,
				'after' => true,
				'field' => 'name'
			])
			->like('content', [
				'before' => true,
				'after' => true,
				'field' => ['name', 'body']
			])
			->finder('active', [
				'form' => false
			])
			->callback('id', [
				'callback' => [$this, 'onlyThisId']
			]);

		return $search;
	}

/**
 * Callback fired from the controller
 *
 * @param  array $args 			The GET arguments
 * @return \Cake\ORM\Query 	The Query object used in pagination
 */
	public function findSearch(Query $query, array $args) {
		foreach ($this->searchConfiguration()->all() as $config) {
			$config->args($args);
			$config->query($query);
			$config->process();
		}

		// debug($query);die;
		return $query;
	}

/**
 * Custom finder that will enforce is_active=1
 *
 * @param  \Cake\ORM\Query 	$query
 * @param  array  					$options
 * @return void
 */
	public function findActive(Query $query, array $options) {
		$query->where(['is_active' => 1]);
	}

/**
 * Custom callback that will force ID to the value
 * passed from HTTP get
 *
 * @param  \Cake\ORM\Query 		$query  The existing Query object
 * @param  array 							$args   The HTTP GET args
 * @param  \Search\Type\Base 	$search The search class
 * @return void
 */
	public function onlyThisId(Query $query, array $args, \Search\Type\Base $search) {
		$query->where(['id' => $args['id']]);
	}

}
