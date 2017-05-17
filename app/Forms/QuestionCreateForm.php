<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Model\Level as Level;

class QuestionCreateForm extends Form {

    public function buildForm() {
        $levels = \App\Model\Level::all();
        $levelsArray = [];
        foreach ($levels as $l) {
            $levelsArray[$l->id] = $l->name;
        }

        $this
                ->add('level', 'choice', [
                    'choices' => $levelsArray,
                    'choice_options' => [
                        'wrapper' => ['class' => 'choice-wrapper'],
                        'label_attr' => ['class' => 'label-class'],
                    ],
                    'label' => 'Poziom',
                ])
                ->add('school_subject', 'choice', [
                    'choices' => ['' => 'Wybierz z listy'],
                    'choice_options' => [
                        'wrapper' => ['class' => 'choice-wrapper'],
                        'label_attr' => ['class' => 'label-class'],
                    ],
                    'label' => 'Przedmiot',
                ])
                ->add('section', 'choice', [
                    'choices' => [],
                    'choice_options' => [
                        'wrapper' => ['class' => 'choice-wrapper'],
                        'label_attr' => ['class' => 'label-class'],
                    ],
                    'label' => 'Dział',
                ])
                ->add('tittle', 'text', [
                    'attr' => ['class' => 'form-control '
                        , 'placeholder' => 'Tytuł...',
                    ],
                    'label' => 'Szukana fraza',
                    'label_show' => false,
                    'label_attr' => ["style" => "display:none;"]
                ])
                ->add('content', 'textarea', [
                    'attr' => ['class' => 'form-control '
                        , 'placeholder' => 'Zawartość...',
                    ],
                    'label' => 'Szukana fraza',
                    'label_show' => false,
                    'label_attr' => ["style" => "display:none;"]
                ])
                ->add('file', 'file', [
                    'attr' => ['class' => 'col-md-2 '
                        , 'placeholder' => 'Pliki...',
                    ], 'label' => 'Dodaj plik',
                  'label_attr' => ["class"=>"file-button" ,"style"=>"color: black;"]
                ])
                ->add('submit', 'submit', [
                    'label' => 'Zadaj pytanie',
                    'attr' => [
                        'class' => 'btn btn-info col-md-12 btn-xl']]);
    }

}
