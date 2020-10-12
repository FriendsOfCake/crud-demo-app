<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class CommentsController extends AppController
{
    /**
     * Add action.
     *
     * @return \Cake\Http\Response
     */
    public function add()
    {
        $this->Crud->listener('relatedModels')->relatedModels(['Posts']);
        $this->Crud->action()->setConfig('scaffold.fields_blacklist', ['created', 'modified']);

        return $this->Crud->execute();
    }

    /**
     * Edit action.
     *
     * @param string $id Entity id
     * @return \Cake\Http\Response
     */
    public function edit($id)
    {
        $this->Crud->listener('relatedModels')->relatedModels(['Posts']);
        $this->Crud->action()->setConfig('scaffold.fields_blacklist', ['created', 'modified']);

        return $this->Crud->execute();
    }

    /**
     * View action.
     *
     * @param string $id Entity id
     * @return \Cake\Http\Response
     */
    public function view($id)
    {
        $this->Crud->on('beforeFind', function (EventInterface $event) {
            $event->getSubject()->query->contain('Posts');
        });

        return $this->Crud->execute();
    }
}
