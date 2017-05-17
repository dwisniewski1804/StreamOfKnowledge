@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card card-block forumSearchBackground " >
        <div class="col-md-10 col-md-offset-1 questionSearchForm">
            {!! form($form) !!}
        </div>

    <div class="row">
        <div class="col-md-3 col-md-offset-1  add-question-icon
             "><i class="fa fa-question-circle-o" aria-hidden="true"></i>Jak szukać
        </div>
        @if (Auth::check())
        <div class="col-md-3 col-md-offset-1 add-question-icon
             " id="addQuestion"> <p> <i class="fa fa-plus" aria-hidden="true"></i> Dodaj pytanie
            </p>
        </div>
        @endif
        </div>
        <div class="preloader-wrapper big" id="findQuestionSpinner">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-block forumSearchBackground" id="addQuestionFormContainer" style="display: none;" >
        <i  data-toggle="tooltip" data-placement="right" title="ZWIŃ" class="fa fa-arrow-up" id="arrowHideFormContainer" aria-hidden="true" style="
            font-size: 48px;
            width: 5%;
            color: darkcyan;
            cursor:pointer;
            position: absolute;"></i>
        <div class="col-md-10 col-md-offset-1 questionSearchForm">
            {!! form($createForm) !!}
        </div>
    </div>
    @if (!empty($foundedQuestions))
    @include('forum.forum_search')
    @elseif (!empty($foundQuestion))
    @include('forum.forum_found_question',['q'=>$foundQuestion,'createAnswerForm'=>$createAnswerForm])
    @else
        <div class = "card card-block " >
            <h2>Z ostatniej chwili</h2>
        @foreach ($lastQuestions as $question)
            <div class = "card card-block  searchQuestionContainer" style = "display:inline-block" onclick = "location.href = ' {!! route('forum.question',['id'=>$question->id])!!}'">
                <div class="row">
                    <div class = "col-md-9" style = "max-height: 100%;">
                        <div class = "col-md-1">
                            @if($question->is_accepted)
                                <i class = "fa fa-check" aria-hidden = "true" style = "color:green; font-size: 30px;" data-toggle = "tooltip" data-placement = "bottom" title = "Pytanie zostało zaakceptowane"></i>
                            @endif
                        </div>
                        <div class = "col-md-1">

                            <i data-badge = "{{$question->answers()->count()}}" class = "mdl-badge mdl-badge--overlap fa fa-bullhorn" aria-hidden = "true" style = "color:#13bbc4; font-size: 30px;" data-toggle = "tooltip" data-placement = "bottom" title = "Ilość odpowiedzi"></i>
                        </div>

                        <div class = "questionTittle col-md-8"> <strong>{{ $question->tittle }}</strong></div>


                        <div class = "questionContent col-md-12">{!!($question->content)!!}</div>
                    </div>
                    <div class="col-md-3">
                        <!--<div class = " searchQuestionSectionContainer">-->
                        <!--<div class = "card">-->
                        @if (!empty($question->section()->getResults()) && !empty($question->section()->getResults()->schoolSubject()))
                            <span class="tag label label-warning label-important">{{$question->section()->get()[0]->schoolSubject()->getResults()->name}}</span>
                            </br>
                            <span class="tag label label-success label-important">  {{$question->section()->get()[0]->name}}</span>
                        @else
                            brak kategorii pytania
                        @endif

                        <div class = "searchQuestionAuthorContainer">
                            <div class = "">
                                @if(!empty($question->user()->getResults()))
                                    <p> Autor:{{$question->user()->get()[0]->name}}
                                        {{$question->created_at->format('Y-m-d')}}</p>
                                @else
                                    <p> Brak autora</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endif
    <div class="card card-block " >
        <h4 class="headerCenter">Przedmioty</h4>
        <div class="subjectsListContainer">
            @foreach ($subjects as $subject)
            <a href="" class="forumStartSubjectsListItem" style=" background: url(/Pictures/subjects/icon_{{$subject->id}}.svg);" data-toggle="tooltip" data-placement="top" title="{{$subject->name}}"> 
            </a>
            @endforeach
        </div>
    </div>
</div>
<script>
    $('.search-button').html('<i class="fa fa-search" aria-hidden="true"></i>').wrap('<span class="input-group-btn search-question-button"></span>');
    $('.search-question-button').appendTo('#questionSearchForm .form-group');
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    $(document).ready(function () {
        $(".file-button").html('<i class="fa fa-cloud-upload"></i> Dodaj plik');
        $('.search-button').on('click', function () {
            $('#findQuestionSpinner').addClass('active');
        });
        $('#level').on('change', function () {
            updateSchoolSubjectSelectList($(this).val());
        });
        $('#level').trigger('change');
        $('#school_subject').on('change', function () {
            updateSectionSelectList($(this).val());
        });
        $('#addQuestion').click(function(){
            $('#addQuestionFormContainer').slideToggle('slow');
        });
        $('#addAnswer').click(function(){
            $('#createAnswerFormContainer').slideToggle('slow');
        });
        $('#arrowHideFormContainer').on('click',function(){
            $('#addQuestionFormContainer').slideToggle('slow');
        });
        $("input:file").change(function (){
            var fileName = $(this).val().split('\\')[2];
            console.log(fileName);
            $(".file-button").html(fileName);
        });

    });
    function updateSchoolSubjectSelectList(id)
    {
        $.ajax({
            method: 'POST',
            url: "{!! route('forum.ss_update') !!}",
            data: {id: id,
                "_token": "{{ csrf_token() }}", },
            context: document.body
        }).done(function (data) {
            var selectValues = data.subjects;
            $.each(selectValues, function (key, value) {
                console.log(value);
                $('#school_subject')
                        .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.name));
            });
        });
    }
    function updateSectionSelectList(id)
    {
        $.ajax({
            method: 'POST',
            url: "{!! route('forum.section_update') !!}",
            data: {id: id,
                "_token": "{{ csrf_token() }}", },
            context: document.body
        }).done(function (data) {
             $('#section').empty();
            var selectValues = data.sections;
            $.each(selectValues, function (key, value) {
                console.log(value);
                $('#section')
                        .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.name));
            });
        });
    }
</script>
@endsection
