<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Model\Level as Level;

class AnswerCreateForm extends Form {

    public function buildForm() {
        $this
                ->add('content', 'textarea', [
                    'attr' => ['class' => 'form-control '
                        , 'placeholder' => 'Odpowiedź...',
                    ],
                    'label' => 'Odpowiedź',
                    'label_show' => false,
                    'label_attr' => ["style" => "display:none;"]
                ])
                ->add('file', 'file', [
                    'attr' => ['class' => 'col-md-2 '
                        , 'placeholder' => 'Pliki...',],
                    'label' => 'Dodaj plik',
                    'label_attr' => ["class"=>"file-button" ,"style"=>"color: black;"]
                ])
                 ->add('question_id', 'hidden', [
                'attr' => ['class' => 'col-md-2 '
                    , 'placeholder' => 'question_id',],
                     'value' => $this->getData('id')
                     ])
                ->add('submit', 'submit', [
                    'label' => 'Odpowiedz',
                    'attr' => [
                        'class' => 'btn btn-info col-md-12 btn-xl']]);

    }


}
