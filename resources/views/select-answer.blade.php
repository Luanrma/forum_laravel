@extends('layouts.layout')

@section('main') 

    <div class="container">
        <div class="row mt-3">
            <div class="col-12 topic-create">
                
                <div id="msg"></div>
            
                <form id="userData" action="edit-answer" method="post" onsubmit="saveTopic(event)">
                    <div class="form-group">
                        <label for="answer">Resposta</label>
                        <textarea class="form-control body-answer inputData" placeholder="Publique sua resposta" name="answer" rows="5">Texto</textarea>
                        <input type="hidden" class="idAnswer inputData" name="idAnswer" value="">
                        <input type="hidden" class="idUser inputData" name="idUser" value="">
                        <input type="hidden" class="idTopic inputData" name="idTopic" value="">
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