@extends('layouts.layout')

@section('main')  
    <div class="container topic-page my-5">
        <div class="col-12 topic-header">
            <div class="new-topic">
                <a href="{{ route('create.topic') }}"><img src="../resources/icons/plus.png" alt="Novo Tópico"></a>
                <h3>Novo Tópico</h3>
            </div>
            <div class="search-topic">
                <input id="search-topic" class="form-control" type="text" placeholder="Procurar">
            </div>
        </div>        
        
        <div class="col-12 topics">

            @foreach($topics as $topic)
                <a href="{{ route('show.topic', ['id' => $topic->id]) }}">
                    <article class="topic-item">
                        <div class="col-10">
                            <h5>{{ $topic['user']->name }}</h5>
                            <h3>{{ $topic->title }}</h3>
                            <p>{{ $topic->question }}</p>
                            <small>{{ $topic->updated_at }}</small>
                        </div>
                        <div class="col-2 topic-icons">
                            <img src="../resources/icons/message.png" alt="mensagem"><span>5</span>
                        </div>
                    </article>
                </a>
            @endforeach 

        </div>
        
        <div class="mt-5 row justify-content-center">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="">Back</a></li>
                <li class="page-item"><a class="page-link" href="">Next</a></li>
            </ul>   
        </div>
    </div>

    @section('js')
        <script src="/scripts/searchTopics.js"></script>
        <script src="/scripts/create.js"></script>
    @endsection
   
@endsection
