<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $schoolSubjectsArray = [
        'język niemiecki',
        'język angielski',
        'język polski',
        'historia',
        'wiedza o społeczeństwie',
        'geografia',
        'biologia',
        'chemia',
        'fizyka',
        'matematyka',
        'informatyka',
        'wiedza o kulturze',
        'podstawy przedsiębiorczości',
        'wychowanie fizyczne',
        'edukacja dla bezpieczeństwa',
        'religia',
        'historia sztuki',
        'język łaciński i kultura antyczna',
        'filozofia',
        'zajęcia z wychowawcą',
    ];
    private $mathSectionsArray = [
        "algorytm Euklidesa",
        "bryły (stereometria)",
        "bryły obrotowe ",
        "całki ",
        "cechy podzielności liczb ",
        "ciągli liczbowe ",
        "czworokąty ",
        "czytanie zadań tekstowych",
        "diagramy procentowe",
        "dwumian Newtona",
        "działania na liczbach rzeczywistych",
        "działania na ułamkach",
        "działania pisemne",
        "dzielniki liczby",
        "elementy przestrzeni trójwymiarowch",
        "figury geometryczne",
        "figury geometryczne",
        "funkcja jednej zmiennej",
        "funkcja kwadratowa",
        "funkcja liniowa",
        "funkcja logarytmiczna",
        "funkcja potęgowa",
        "funkcja wielomianowa",
        "funkcja wykładnicza",
        "funkcja wymierna",
        "funkcje",
        "funkcje trygonometryczne",
        "geometria analityczna",
        "graniastosłupy",
        "granice funkcji i ciągów",
        "indukcja matematyczna",
        "jednokładność i podobieństwo",
        "jednostki - rodzaje",
        "kąty na płaszczyĽnie",
        "kalendarz i czas",
        "koło i okrąg",
        "kombinatoryka",
        "konstrukcje geometryczne",
        "kwadraty i sześciany liczb",
        "liczby całkowite",
        "liczby naturalne",
        "liczby pierwsze",
        "liczby rzeczywiste",
        "liczby wymierne",
        "liczby zespolone",
        "logarytmy",
        "logika matematyczna",
        "macierze",
        "metoda podstawiania",
        "metoda przeciwnych współczynników",
        "metoda wyznacznikowa",
        "najmniejszy wspólny mianownik",
        "obliczanie liczby z danego jej procentu",
        "obliczanie procentu z danej liczby",
        "odczytywanie informacji",
        "okręgi",
        "ostrosłupy",
        "pamięciowe mnożenie liczb",
        "pierwiastkowanie",
        "planimetria (figury płaskie)",
        "pochodne funkcji",
        "podobieństwo i jednokładność",
        "pola figur płaskich",
        "pola figur",
        "pola i obwody wielokątów",
        "posługiwanie się kalkulatorem",
        "potęgi i pierwiastki",
        "potęgowanie",
        "procenty",
        "promile",
        "prosta na płaszczyźnie",
        "przekształcenia płaszczyzny",
        "rachunek prawodopodobieństwa",
        "rodzaje liczb",
        "rozkład liczby na czynniki pierwsze",
        "równania i nierówności",
        "równania i nierówności",
        "sito Eratostenesa",
        "skala na planach i mapach",
        "statystyka",
        "stereometria - przestrzeń 3D",
        "symetria osiowa i środkowa",
        "symetrie",
        "system dwójkowy",
        "systemy zapisywania liczb",
        "szacowanie",
        "szeregi liczbowe",
        "tabliczka mnożenia",
        "trójkąt Pascala",
        "trójkąt prostokątny",
        "trójkąty",
        "trygonometria",
        "twierdzenie cosinusów (Carnote'a)",
        "twierdzenie Pitagorasa",
        "twierdzenie sinusów (Snelliusa)",
        "twierdzenie Talesa",
        "układ oznaczony",
        "układ nieoznaczony",
        "układ sprzeczny",
        "układ współrzędnych",
        "układy równań liniowych",
        "układy równań",
        "ułamki dziesiętne",
        "ułamki zwykłe",
        "usuwanie niewymierności",
        "wartość bezwględna",
        "wartość bezwzględna",
        "wektory",
        "wielokrotność liczby",
        "wielomiany",
        "wyrażenia algebraiczne",
        "wzajemne położenie okręgów",
        "wzory skróconego mnożenia",
        "zadania tekstowe - metody roz.",
        "zamiana jednostek",
        "zaokrąglanie liczb",
        "zbiory liczbowe",
        "zbiór liczb rzeczywistych",
        "związki miarowe w trójkącie",
    ];
    private $levelsArray = [
        'Szkoła podstawowa',
        'Gimnazjum',
        'Szkoła średnia',
        'Szkoła wyższa',
    ];

    public function run() {

        ////Dodanie poziomów nauczania
        foreach ($this->levelsArray as $levelName) {
            DB::table('levels')->insert([
                'name' => $levelName,
                'updated_at' => new Datetime(),
                'created_at' => new Datetime()
            ]);
        }
        ////Dodanie szkolnych przedmiotów
        foreach ($this->schoolSubjectsArray as $subjectName) {
            DB::table('school_subjects')->insert([
                'name' => $subjectName,
                'updated_at' => new Datetime(),
                'created_at' => new Datetime()
            ]);
        }
        ////Powiązanie szkolnych przedmiotów do poziomów naucznia
        foreach ($this->levelsArray as $levelKey => $levelName) {
            foreach ($this->schoolSubjectsArray as $ssKey => $ssName) {
                DB::table('level_school_subject')->insert([
                    'level_id' => $levelKey + 1,
                    'school_subject_id' => $ssKey +1
                ]);
            }
        }
        ////Dodanie tematów związanych z matamatyką
        foreach ($this->mathSectionsArray as $sName) {
            DB::table('sections')->insert([
                'name' => $sName,
                'updated_at' => new Datetime(),
                'created_at' => new Datetime(),
                'school_subject_id' => 10
            ]);
        }
        ////Utworzenie ról
        DB::table('roles')->insert([//1
            'name' => 'admin',
        ]);
        DB::table('roles')->insert([//2
            'name' => 'teacher',
        ]);
        DB::table('roles')->insert([//3
            'name' => 'student',
        ]);
        DB::table('roles')->insert([//4
            'name' => 'forum_admin',
        ]);
        DB::table('roles')->insert([//5
            'name' => 'knowledge_admin',
        ]);
        DB::table('roles')->insert([//6
            'name' => 'chat_admin',
        ]);
        DB::table('roles')->insert([//7
            'name' => 'competition_admin',
        ]);
        DB::table('ranks')->insert([//7
            'name' => 'Poczatkujący',
            'min' => 1,
            'max' => 100
        ]);
        DB::table('ranks')->insert([//7
            'name' => 'Stały bywalec',
            'min' => 101,
            'max' => 200
        ]);
        DB::table('ranks')->insert([//7
            'name' => 'Zaawansowany',
            'min' => 201,
            'max' => 300
        ]);
        DB::table('ranks')->insert([//7
            'name' => 'Wysoko-zaawansowany',
            'min' => 301,
            'max' => 400
        ]);
        DB::table('ranks')->insert([//7
            'name' => 'Mistrz',
            'min' => 401,
            'max' => 500
        ]);

        ////Utworzenie użytkowników
        DB::table('users')->insert([
            'name' => 'damian123',
            'email' => 'damian.wisniewski1804' . '@gmail.com',
            'password' => bcrypt('Biedkowo'),
            'firstname' => 'Damian',
            'lastname' => 'Wiśniewski',
            'points' => 239,
        ]);
        DB::table('role_users')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'nauczyciel',
            'email' => 'nauczyciel' . '@gmail.com',
            'password' => bcrypt('Biedkowo'),
            'firstname' => 'Mariusz',
            'lastname' => 'Czerepach',
            'points' => 20,
        ]);
        DB::table('role_users')->insert([
            'role_id' => 2,
            'user_id' => 2,
        ]);
        DB::table('role_users')->insert([
            'role_id' => 4,
            'user_id' => 2,
        ]);
        ///dodanie pytań 
    }

}
