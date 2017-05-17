
<div class = "card card-block " >
    <h2> Znaleziono {{count($foundedQuestions)}}
        @if (count($foundedQuestions)==1 )
        pytanie
        @elseif (count($foundedQuestions)>1 && count($foundedQuestions)<5)
        pytania
        @else
        pytań
        @endif
    </h2>
    @foreach ($foundedQuestions as $question)
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
    <!--   </div>-->



    @endforeach
</div>