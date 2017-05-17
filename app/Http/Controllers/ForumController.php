<?php

namespace App\Http\Controllers;

use \App\Model\SchoolSubject as SchoolSubject;
use Kris\LaravelFormBuilder\FormBuilder as FormBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Question as Question;
use App\Model\Level as Level;
use App\Model\Media as Media;
use App\Model\Section as Section;
use App\Model\Answer as Answer;
use App\Forms\QuestionSearchForm as QuestionSearchForm;
use App\Forms\QuestionCreateForm as QuestionCreateForm;
use App\Forms\AnswerCreateForm as AnswerCreateForm;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Json;

class ForumController extends Controller {

    /**
     * Creates form to create question.
     *
     * @param FormBuilder $formBuilder
     *
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function createCreateForm(FormBuilder $formBuilder) {
        return $formBuilder->create(QuestionCreateForm::class, [
                    'method' => 'POST',
                    'url' => route('forum.create_question')
        ]);
    }

    /**
     * Creates form to search question
     *
     * @param FormBuilder $formBuilder
     *
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function createSearchForm(FormBuilder $formBuilder) {
        return $formBuilder->create(QuestionSearchForm::class, [
                    'method' => 'GET',
                    'url' => route('forum.search')
        ]);
    }

    /**
     * Creates form to search question
     *
     * @param FormBuilder $formBuilder
     * @param int $id
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function createAnswerForm(FormBuilder $formBuilder,$id=null) {
        return $formBuilder->create(AnswerCreateForm::class, [
            'method' => 'POST',
            'url' => route('forum.create_answer')
        ],['id'=>$id]);
    }
    /**
     * Adds/remove point to/from answer
     *
     * @param Request $request
     * @return Json
     */
    public function goodBadAnswer(Request $request) {
        $id = $request->get('id');
        $add = $request->get('add')=== 'true'?true:false;
        $answer = Answer::find($id);
        if ($request->session()->has('voted_on_answers')) {
            $votedAnswersArray = session('voted_on_answers');
        }
        else {
            $votedAnswersArray = [];
        }
        if(!in_array($id,$votedAnswersArray)) {
            $votedAnswersArray[] = $id;
            session(['voted_on_answers' => $votedAnswersArray]);
            $pointsActual = $answer->points;
            if ($add) {
                $pointsNew = $pointsActual + 1;
            } else {
                $pointsNew = $pointsActual - 1;
            }
            $answer->points = $pointsNew;
            $answer->save();
            debug($add,session('voted_on_answers'));
            return response()->json([
                'points'=>$pointsNew,
                'status'=>200,
                'id' => $id
            ]);
        }

        debug($add,session('voted_on_answers'));
        return response()->json([
            'message'=>'Nie możesz zagłosować dwukrotnie na jedną odpowiedź.',
            'status'=>201,
            'id' => $id
        ]);
    }
    /**
     *
     * Finds school subjects depending on level
     * @param Request $request
     * @return array
     */
    public function ssFind(Request $request) {
        $id = $request->input('id');
        $subjects = Level::find($id)->schoolSubjects()->get()->toArray();
        debug($subjects);
        return response()->json([
                    'subjects' => $subjects]);
    }

    /**
     *
     * Finds school subjects depending on level
     * @param Request $request
     * @return array
     */
    public function sectionFind(Request $request) {
        $id = $request->input('id');
        $sections = SchoolSubject::find($id)->sections()->get()->toArray();
        return response()->json([
                    'sections' => $sections]);
    }

    /**
     * Render forum start page.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function start(FormBuilder $formBuilder) {
        $createForm = $this->createCreateForm($formBuilder);
        $searchForm = $this->createSearchForm($formBuilder);
        $lastQuestions = Question::orderBy('id', 'desc')->take(10)->get();
        $subjects = SchoolSubject::all()->sortBy('name');
        debug($subjects, $searchForm,$lastQuestions);
        debug(session('voted_on_answers'));
        return view('forum.forum_start', ['subjects' => $subjects, 'form' => $searchForm, 'createForm' => $createForm, 'lastQuestions'=>$lastQuestions]);
    }

    /**
     * Creates question.
     *
     * @param FormBuilder $formBuilder
     *
     * @return RedirectResponse
     */
    public function createQuestion(FormBuilder $formBuilder) {
        $createForm = $this->createCreateForm($formBuilder);
        if (!$createForm->isValid()) {
            return redirect()->back()->withErrors($createForm->getErrors())->withInput();
        } else {
            $formRequest = $createForm->getRequest();
            $sectionId = $formRequest->get('section');
            $tittle = $formRequest->get('tittle');
            $content = $formRequest->get('content');
            $file = $formRequest->file('file');
            //Creating new question
            $question = new Question([
                'tittle' => $tittle,
                'content' => $content
            ]);
            $section = Section::find($sectionId);
            $question->section()->associate($section);
            $question->user()->associate(Auth::user());
            $question->save();
                if (!empty($file)) {
                    //Creating new media
                    $fileName = $question->id . '.' .
                        $file->getClientOriginalExtension();
                    $filePath = base_path() . ("\public\uploads\questions\\");
                    $file->move($filePath, $fileName);
                    $media = new Media([
                        'name' => $fileName,
                        'type' => $file->getClientOriginalExtension(),
                        'path' => "uploads/questions/" . $fileName,
                    ]);
                    $media->question()->associate($question);
                    $media->save();
                }
            //Redirect
            return redirect()->action(
                            'ForumController@question', ['id' => $question->id]
            );
        }
    }
    /**
     * Creates answer.
     *
     * @param FormBuilder $formBuilder
     *
     * @return RedirectResponse
     */
    public function createAnswer(FormBuilder $formBuilder) {
        $createForm = $this->createAnswerForm($formBuilder);
        if (!$createForm->isValid()) {
            return redirect()->back()->withErrors($createForm->getErrors())->withInput();
        } else {
            $formRequest = $createForm->getRequest();
            $content = $formRequest->get('content');
            $file = $formRequest->file('file');
            $questionId = $formRequest->get('question_id');
            $question = Question::find($questionId);
            //Creating new question
            $answer = new Answer([

                'content' => $content
            ]);
            $answer->user()->associate(Auth::user());
            $answer->question()->associate($question);
            $answer->tittle='test';
            $answer->points = 0;
            $answer->is_accepted = false;
            $answer->is_helpfull = false;
            $answer->save();
            if (!empty($file)) {
                //Creating new media
                $fileName = $answer->id . '.' .
                    $file->getClientOriginalExtension();
                $filePath = base_path() . ("\public\uploads\answers\\");
                $file->move($filePath, $fileName);
                $media = new Media([
                    'name' => $fileName,
                    'type' => $file->getClientOriginalExtension(),
                    'path' => "uploads/answers/" . $fileName,
                ]);
                $media->question()->associate($answer);
                $media->save();
            }
            //Redirect
            return redirect()->action(
                'ForumController@question', ['id' => $question->id]
            );
        }
    }
    /**
     * Show one question (fully)
     *
     * @param FormBuilder $formBuilder
     * @param int  $id
     *
     * @return Response
     */
    public function question($id, FormBuilder $formBuilder) {
        $searchForm = $this->createSearchForm($formBuilder);
        $createForm = $this->createCreateForm($formBuilder);
        $createAnswerForm = $this->createAnswerForm($formBuilder,$id);
        $question = Question::find($id);
        $answers = $question->answers()->orderByDesc('points')->getResults();
        debug($question->answers()->get());
        $subjects = SchoolSubject::all()->sortBy('name');
        debug($subjects, $searchForm, $question->medias()->get(), $id);
        return view('forum.forum_start', [
            'subjects' => $subjects,
            'form' => $searchForm,
            'foundQuestion' => $question,
            'answers' => $answers,
            'createForm' => $createForm,
            'createAnswerForm' => $createAnswerForm
        ]);
    }

    /**
     * Shows found questions.
     *
     * @param FormBuilder $formBuilder
     * @return RedirectResponse
     */
    public function search(FormBuilder $formBuilder) {
        $form = $this->createSearchForm($formBuilder);
        $createForm = $this->createCreateForm($formBuilder);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            $foundQuestions = [];
            $questionToFind = $form->getRequest()->get('word');
            $foundQuestionsCollection = DB::table('questions')
                    ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
                    ->select('questions.id')
                    ->where('questions.tittle', 'like', '%' . $questionToFind . '%')
                    ->orWhere('questions.content', 'like', '%' . $questionToFind . '%')
                    ->orWhere('answers.tittle', 'like', '%' . $questionToFind . '%')
                    ->orWhere('answers.content', 'like', '%' . $questionToFind . '%')
                    ->get();

            foreach ($foundQuestionsCollection as $key=>$q) {
                if ($key !== 0)
                $foundQuestions[] = Question::find($q->id);
            }
            $subjects = SchoolSubject::all();
            debug($foundQuestionsCollection, $subjects);
            return view('forum.forum_start', ['subjects' => $subjects, 'form' => $form, 'foundedQuestions' => $foundQuestions, 'createForm' => $createForm]);
        }
    }

}
