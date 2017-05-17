
<div class="card card-block " >
    <div class="row">
        <div class="col-md-10">
            <h4 class="headerCenter">{{$q->tittle}}</h4>
            <hr>
            @if ($q->medias()->get()->count() >0)
            @foreach  ($q->medias()->get() as $m)
            @if ($m->type === 'jpg')
                <div class="col-md-4">
            <a data-fancybox="gallery" href="{{asset($m->path)}}"><img src="{{asset($m->path)}}" alt="Obraz" height="400" width="400"> </a>
                </div>
                <!--@endif-->
            @endforeach
            @endif 
            <div class="foundQuestionContent">{!!$q->content!!}</div>
        </div>
        <div class="col-md-2">
            <!--<div class = " searchQuestionSectionContainer">-->
            <!--<div class = "card">-->
            @if ($q->section()->get() !== null)
            <span class="tag label label-warning label-important">{{$q->section()->get()[0]->schoolSubject()->getResults()->name}}</span>
            </br>
            <span class="tag label label-success label-important">  {{$q->section()->get()[0]->name}}</span>
            @else
            brak kategorii pytania
            @endif

            @if  ($q->user()->get()->count() >0)
            <div class = "searchQuestionAuthorContainer">
                <div class = "">                   
                    <p> Autor:{{$q->user()->get()[0]->name}}
                        {{$q->created_at->format('Y-m-d')}}</p>
                </div>
            </div>
            @else
                <p>Brak autora </p>
            @endif
        </div>
    </div>

    <div class="mdl-card__title">
       @if (Auth::check()) <button type="button" class="btn btn-primary" id="addAnswer"><i class="fa fa-plus-circle addAnswerIcon" aria-hidden="true"></i></button> @endif
        <h2 class="mdl-card__title-text">Odpowiedzi</h2>
    </div>
    @if (Auth::check())
     <div class="mdl-card__actions mdl-card--border" id="createAnswerFormContainer" style="display:none">
        <div class="createAnswerFormContainer">
            {!! form($createAnswerForm) !!}
        </div>
     </div>
    @endif

@foreach  ($answers as $a)
    <div class="mdl-card__actions mdl-card--border">
        <div class="answerContainer row">
            <div class="col-md-2">
                <div class="">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    {{ $a->user()->getResults()->name }}
                    <i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: 12px;">
                        ({{ $a->user()->getResults()->points}})
                    </i>
                </div>
                <div class="row" style="margin-bottom: 0px;">
                    <div class="col-md-3" style="margin: auto;">
                    @if ($a->is_helpfull)
                         <i class="fa fa-heart " style="font-size:30px ; margin:auto; color:red" aria-hidden="true"></i>
                    @endif
                    </div>
                    <div class="answer-points-container col-md-4" id="pointsContainer{{$a->id}}">
                    {{ $a->points }}
                    </div>
                    <div class="col-md-3 answer-arrow" style="margin:auto;">
                    <i class="fa fa-chevron-up answer-good" data-id="{{$a->id}}" aria-hidden="true"></i>
                        @if ($a->points !== 0 )
                    <i class="fa fa-chevron-down answer-bad" data-id="{{$a->id}}" aria-hidden="true"></i>
                        @endif
                    </div>
                    <div class="col-md-12">{{$a->created_at->format('Y-m-d H:i')}}</div>
                    <div id="rateMessageContainer{{$a->id}}" style="display:none;"></div>
                </div>
            </div>
            <div class="col-md-8">
                {{ $a->content }}
            </div>
            </div>
    </div>
    @endforeach
</div>
<script>
    $(document).ready(function(){
        $('.answer-good').on('click',function()
        {
            goodAnswerAjax($(this).attr('data-id'),true);
        });
        $('.answer-bad').on('click',function()
        {
            goodAnswerAjax($(this).attr('data-id'),false);
        });
    });
    function goodAnswerAjax(id,add)
    {
        $.ajax({
            method: 'POST',
            url: "{!! route('forum.good_bad_answer') !!}",
            data: {
                id: id,
                "_token": "{{ csrf_token() }}",
                add: add},
            context: document.body
        }).done(function (data) {
            if (data.status === 200) {
                console.log($('#pointsContainer'+data.id));
                $('#pointsContainer'+data.id).text(data.points);
                $('#rateMessageContainer'+data.id).html('<div class="alert alert-success alert-custom-answer-rate alert-dismissable" style="padding-bottom: 3px;padding-top: 3px;margin-bottom: 0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  Oceniono odpowiedź. </div>').fadeIn('slow');
                removeMessageAfterVote(data.id)
            }
            else
            {
                $('#rateMessageContainer'+data.id).html('<div class="alert alert-warning alert-dismissable" style="padding-bottom: 3px;padding-top: 3px;margin-bottom: 0px;"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data.message+'</div>').fadeIn('slow');
                removeMessageAfterVote(data.id);
            }

        });
    }
    function removeMessageAfterVote(id)
    {

                setTimeout(function(){
                    $('#rateMessageContainer'+id).children().hide('slow', function(){
                        $('#rateMessageContainer'+id).children().remove();
                    });
                }, 4000);

    }
</script>
