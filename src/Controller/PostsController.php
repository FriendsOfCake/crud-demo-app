<?php
declare(strict_types=1);

namespace App\Controller;

class PostsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Search.Search', [
            'actions' => ['index'],
        ]);
    }

    /**
     * Index action.
     *
     * @return \Cake\Http\Response
     */
    public function index()
    {
        $this->Crud->addListener('search', 'Crud.Search');
        $this->Crud->addListener('viewSearch', 'CrudView.ViewSearch');

        $this->Crud->action()->setConfig('scaffold.fields_blacklist', ['id']);
        $this->Crud->action()->setConfig('scaffold.fields', ['name', 'is_active', 'comment_count']);

        return $this->Crud->execute();
    }

    /**
     * Add action.
     *
     * @return \Cake\Http\Response
     */
    public function add()
    {
        $this->Crud->action()->setConfig('scaffold.fields_blacklist', ['comment_count', 'created', 'modified']);

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
        $this->Crud->action()->setConfig('scaffold.fields_blacklist', ['comment_count', 'created', 'modified']);

        return $this->Crud->execute();
    }
}
