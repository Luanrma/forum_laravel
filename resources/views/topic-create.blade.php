@extends('layouts.layout')

@section('main')   

    <div class="container">
        <div class="row">
            <div class="col-12 topic-create">
                
                <div id="msg"></div>

                <form id="userData" class="topic-content" action="{{ route('store.topic') }}" method="post" onsubmit="saveTopic(event)">
                    @csrf
                   
                    <div class="form-group topic-title">
                        <label for="title">Título</label>
                        <input type="text" class="form-control inputData" name="title" id="title" placeholder="Título">
                    </div>                  
                    <div class="form-group topic-text mt-3">
                        <label for="text">Conteúdo</label>
                        <textarea class="form-control inputData" id="question" name="question" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </div>     
    </div>
    
    @section('js')
        <script src="../resources/scripts/create.js"></script>
    @endsection
   
@endsection
