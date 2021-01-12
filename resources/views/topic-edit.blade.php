@extends('layouts.layout')

@section('main')   

    <div class="container">
        <div class="row">
            <div class="col-12 topic-create">
                
                <div id="msg"></div>

                <form id="userData" class="topic-content" action="{{ route('update.topic') }}" method="post" onsubmit="saveTopic(event)">
                    @csrf
                    @method('put')
                    <div class="form-group topic-title">
                        <label for="title">Título</label>
                        <input type="text" class="form-control inputData" name="title" id="title" value="{{ $topic->title }}">
                    </div>                  
                    <div class="form-group topic-text mt-3">
                        <label for="text">Conteúdo</label>
                        <textarea class="form-control inputData" id="question" name="question" rows="10">{{ $topic->question }}</textarea>
                    </div>
                    <input type="hidden" name="id" value={{ $topic->id }}>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </div>     
    </div>
    
    @section('js')
        <script src="../resources/scripts/create.js"></script>
    @endsection
   
@endsection
