<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class QuestionSearchForm extends Form {

    public function buildForm() {
        $this
                ->add('word', 'text', [
                    'attr' => ['class' => 'form-control col-md-10'
                        , 'placeholder' => 'Szukam...',
                    ],
                    'label' => 'Szukana fraza',
                    'label_show' => false,
                    'label_attr' => ["style" => "display:none;"]
                ])
                ->add('submit', 'submit', [
                    'label' => 'Szukaj',
                    'attr'=>[
                    'class'=>'btn btn-info btn-circle btn-xl search-button']]);
    }

}
