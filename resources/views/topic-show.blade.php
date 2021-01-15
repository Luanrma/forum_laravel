@extends('layouts.layout')

@section('main')

    <div class="container">
        <div class="mt-5 row">
            <div class="topic-master-list col-sm-12">
             
                <article class="topic">
                    <small>{{ $topic->updated_at }}</small>
                    <header>
                        <h3>{{ $topic->title }}</h3>
                        <small>{{ $user->name }}</small>
                    </header>
                    <p>{{ $topic->question }}</p>

                    @if (Auth::user() !== null)
                        @if(Auth::user()->id === $user->id)
                            <div class="justify-content-end">
                                <hr>
                                <a href={{ route('edit.topic', ['id' => $topic->id]) }}>Editar</a>
                            </div>
                        @endif
                    @endif
                </article>
            </div>
        </div>
        
        <div class="topic-page mt-3">
            @foreach($answers as $answer)

                <div class="row topic-answers">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-10">
                        <article>
                            <header>
                                <h5>{{ $answer['user']->name }}</h5>
                                <small>{{ $answer->updated_at }}</small>
                            </header>
                            <div>{!! $answer->response !!}</div>
                        </article>
                    </div>
                    
                    @if (Auth::user() !== null)
                        @if (Auth::user()->id === $answer['user']->id)
                        
                            <div class="col-sm-1 answer-edit">
                                <a href="{{ route('edit.answer', ['id' => $answer->id]) }}">Editar</a>
                            </div>
                        @endif
                    @endif
                </div> 

            @endforeach 
        </div>
       
        <div class="mt-3 row justify-content-center">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="">Back</a></li>
                <li class="page-item"><a class="page-link" href="">Next</a></li>
            </ul>   
        </div>

        <div class="row answers">
            <div class="col-sm-12">
                <div id="msg" class="text-center"></div>

                <form id="userData" action="{{ route('store.answer') }}" method="post" onsubmit="saveTopic(event)">
                    @csrf
                    <div class="form-group">
                        <label for="answer">Resposta</label>
                        <textarea class="form-control body-answer inputData description" name="response" ></textarea>
                        
                        <input type="hidden" name="topic_id" value={{ $topic->id }}>
                        <button type="submit" class="btn-lg btn-primary my-3">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.tiny.cloud/1/mixyp04e5jr9q82xsbklx8wgespjdcx18q7oamu22rscb4a7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.description',
            height: 500,
        
            paste_data_images: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste imagetools wordcount',
                
            ],
            toolbar: 'forecolor backcolor emoticons | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
           
        });
    </script>
                
@endsection

@section('js')
    <script src="../resources/scripts/create.js"></script>
@endsection
