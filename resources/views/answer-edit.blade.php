@extends('layouts.layout')

@section('main') 

    <div class="container">
        <div class="row mt-3">
            <div class="col-12 topic-create">
                
                <div id="msg"></div>
            
                <form id="userData" action="{{ route('update.answer') }}" method="post" onsubmit="saveTopic(event)">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="answer">Resposta</label>
                        <textarea class="form-control body-answer inputData" placeholder="Publique sua resposta" name="response" rows="5">{{ $answer->response }}</textarea>
                        <input type="hidden" class="idAnswer inputData" name="id" value="{{ $answer->id }}">
                        <input type="hidden" class="idTopic inputData" name="id_topic" value="{{ $answer->topic_id }}">
                        <button type="submit" class="btn-lg btn-primary my-3">Enviar</button>
                    </div>
                </form>

            </div>
        </div>     
    </div>
@endsection

@section('js')
    <script src="../resources/scripts/create.js"></script>
@endsection