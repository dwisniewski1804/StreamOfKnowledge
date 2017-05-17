<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\QuestionCrudRequest as StoreRequest;
use App\Http\Requests\QuestionCrudRequest as UpdateRequest;
use Lang;

class QuestionCrudController extends CrudController {

    public function setup() {
        $this->crud->setModel("App\Model\Question");
        $this->crud->setRoute("admin/question");
        $this->crud->setEntityNameStrings('Pytanie', 'Pytania');

        $this->crud->addColumn([
            'name' => 'tittle', // The db column name
            'label' => "Tytuł", // Table column heading
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'content', // The db column name
            'label' => "Zawartość", // Table column heading
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'is_accepted', // The db column name
            'label' => "Zakaceptowane", // Table column heading
            'type' => 'boolean'
        ]);
        $this->crud->addColumn([
            'name' => 'updated_at', // The db column name
            'label' => "Modyfikowane", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'created_at', // The db column name
            'label' => "Utworzone", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'tittle',
            'label' => Lang::get('general.tittle')
        ]);
        $this->crud->addField([// CKEditor
            'name' => 'content',
            'label' => Lang::get('general.content'),
            'type' => 'ckeditor',
                // optional:
                // 'extra_plugins' => ['oembed', 'widget', 'justify']
        ]);
    }

    public function store(StoreRequest $request) {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request) {
        return parent::updateCrud();
    }

}
