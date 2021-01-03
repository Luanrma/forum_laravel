@extends('layout')

@section('main')

    <div class="container">
        <div class="mt-5 row">
            <div class="topic-master-list col-sm-12">
             
                <article class="topic">
                    <header>
                        <h3>{{ $topic->title }}</h3>
                        <small>By: Nome da pessoa aqui</small>
                    </header>
                    <p>{{ $topic->question }}</p>
                </article>
            </div>
        </div>
        
        <div class="topic-page mt-3">  
                            
            <div class="row topic-answers">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10">
                    <article>
                        <header>
                            
                            <h5>Zé Ramalho</h5>
                            <small>08/12/2020</small>
                        </header>
                        <p>texto</p>
                    </article>
                </div>
                <div class="col-sm-1 answer-edit">
                    <a href="../public/select-answer">Editar</a>
                </div>
            </div>  
                
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

                <form id="userData" action="createAnswer" method="post" onsubmit="saveTopic(event)">
                    <div class="form-group">
                        <label for="answer">Resposta</label>
                        <textarea class="form-control body-answer inputData" placeholder="Publique sua resposta" name="answer" rows="5"></textarea>
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
