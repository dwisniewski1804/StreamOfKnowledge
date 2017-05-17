<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'Zapisz i stwórz nowy obiekt',
    'save_action_save_and_edit' => 'Zapisz i edytuj ten obiekt',
    'save_action_save_and_back' => 'Zapisz i cofnij',
    'save_action_changed_notification' => 'Domyślne zachowanie po zapisie zostało zmienione.',

    // Create form
    'add'                 => 'Dodaj',
    'back_to_all'         => 'Wróć do listy ',
    'cancel'              => 'Anuluj',
    'add_a_new'           => 'Dodaj nowy ',

    // Edit form
    'edit'                 => 'Edytuj',
    'save'                 => 'Zapisz',

    // Revisions
    'revisions'            => 'Rewizje',
    'no_revisions'         => 'Nie znaleziono rewizji',
    'created_this'          => 'Stworzono to',
    'changed_the'          => 'Zmieniono to',
    'restore_this_value'   => 'Odnów tę wartość',
    'from'                 => 'Z',
    'to'                   => 'Na',
    'undo'                 => 'Wróć',
    'revision_restored'    => 'Rewizja zakończona powodzeniem',

    // CRUD table view
    'all'                       => 'Wszystkie',
    'in_the_database'           => 'W bazie danych',
    'list'                      => 'Lista',
    'actions'                   => 'Akcje',
    'preview'                   => 'Pokaż',
    'delete'                    => 'Usuń',
    'admin'                     => 'Admin',
    'details_row'               => 'To jest wiersz szczegółów. Modyfikuj wg potrzeb.',
    'details_row_loading_error' => 'Wystąpił błąd w trakcie ładowania wiersza. Ponów próbę.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Czy na pewno chcesz usunąć ten obiekt?',
        'delete_confirmation_title'                   => 'Obiekt usunięty',
        'delete_confirmation_message'                 => 'Obiekt został pomyślnie usunięty.',
        'delete_confirmation_not_title'               => 'Nieusunięty',
        'delete_confirmation_not_message'             => "Wystąpił błąd. Obiekt mógł nie zostać usunięty.",
        'delete_confirmation_not_deleted_title'       => 'Nieusunięty',
        'delete_confirmation_not_deleted_message'     => 'Nic się nie stało . Obiekt jest bezpieczny.',

        // DataTables translation
        'emptyTable'     => 'Brak dancyh w tabeli',
        'info'           => 'Showing _START_ to _END_ of _TOTAL_ entries',
        'infoEmpty'      => 'Showing 0 to 0 of 0 entries',
        'infoFiltered'   => '(filtered from _MAX_ total entries)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '_MENU_ records per page',
        'loadingRecords' => 'Ładowanie...',
        'processing'     => 'Przetwarzanie...',
        'search'         => 'Wyszukaj: ',
        'zeroRecords'    => 'Nie znaleziono pasujących rekordów',
        'paginate'       => [
            'first'    => 'Pierwsza',
            'last'     => 'Ostatnia',
            'next'     => 'Następna',
            'previous' => 'Poprzednia',
        ],
        'aria' => [
            'sortAscending'  => ': aktywuj aby posortować rosnąco',
            'sortDescending' => ': aktywuj aby posortować malejąco',
        ],

    // global crud - errors
        'unauthorized_access' => 'Nieautoryzowany dostęp - nie masz dostępnych uprawnień do przeglądania tej strony.',
        'please_fix' => 'Proszę naprawić następujące błędy:',

    // global crud - success / error notification bubbles
        'insert_success' => 'Obiekt został pomyślnie dodany.',
        'update_success' => 'Obiekt został pomyślnie zaktualizowany.',

    // CRUD reorder view
        'reorder'                      => 'Przesortuj',
        'reorder_text'                 => 'Uzyć sortowania drag & drop.',
        'reorder_success_title'        => 'Zrobione',
        'reorder_success_message'      => 'Twoja kolejność została zachowana.',
        'reorder_error_title'          => 'Błąd',
        'reorder_error_message'        => 'Twoja kolejność nie została zachowana.',

    // CRUD yes/no
        'yes' => 'Tak',
        'no' => 'Nie',

    // Fields
        'browse_uploads' => 'Przeglądaj przesłane',
        'clear' => 'Wyczyść',
        'page_link' => 'Link do strony',
        'page_link_placeholder' => 'http://example.com/your-desired-page',
        'internal_link' => 'Wewnętrzny  link',
        'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
        'external_link' => 'Zewnętrzny link',
        'choose_file' => 'Wybierz plik',

    //Table field
        'table_cant_add' => 'Cannot add new :entity',
        'table_max_reached' => 'Maksymalna liczba :max osiągnięta',

    // File manager
    'file_manager' => 'Menadżer plików',
];
