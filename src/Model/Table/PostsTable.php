<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \App\Model\Table\CommentsTable&\Cake\ORM\Association\HasMany $Comments
 * @method \App\Model\Entity\Post newEmptyEntity()
 * @method \App\Model\Entity\Post newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Post findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Post[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PostsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('posts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');

        $this->hasMany('Comments', [
            'foreignKey' => 'post_id',
        ]);

        $this->searchManager()
            ->value('is_active')
            ->like('name', [
                'before' => true,
                'after' => true,
            ])
            ->like('content', [
                'before' => true,
                'after' => true,
                'fields' => ['name', 'body'],
            ])
            ->finder('active', [
                'form' => false,
            ])
            ->callback('id', [
                'callback' => [$this, 'onlyThisId'],
            ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('comment_count')
            ->allowEmptyString('comment_count');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->boolean('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmptyString('is_active');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmptyString('body');

        return $validator;
    }

    /**
     * Custom finder that will enforce is_active=1
     *
     * @param \Cake\ORM\Query $query Query instance
     * @param array $options
     * @return \Cake\ORM\Query
     */
    public function findActive(Query $query, array $options)
    {
        $query->where(['is_active' => 1]);

        return $query;
    }

    /**
     * Custom callback that will force ID to the value
     * passed from HTTP get
     *
     * @param \Cake\ORM\Query $query The existing Query object
     * @param array $args The HTTP GET args
     * @param \Search\Type\Base $filter The filter class
     * @return void
     */
    public function onlyThisId(Query $query, array $args, \Search\Model\Filter\Base $filter)
    {
        $query->where(['id' => $args['id']]);
    }
}
