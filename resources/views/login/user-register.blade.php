@extends('layouts.layout')

@section('main')   

    <div class="container">
        <div class="row justify-content-center">
            <div class="topic-create">
        
                <div id="msg"></div>

                <form id="userData" class="topic-content" action="{{ route('store.user') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control inputData" name="name" id="name" placeholder="Nome">
                    
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control inputData" id="email" name="email" placeholder="email">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control inputData" id="password" name="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                    <a style="font-size: 1rem" href="{{ route('showLogin.user') }}">Já tenho cadastro</a>
            </div>
        </div>     
    </div>
    
    @section('js')
        <script src="/scripts/searchTopics.js"></script>
    @endsection
   
@endsection
