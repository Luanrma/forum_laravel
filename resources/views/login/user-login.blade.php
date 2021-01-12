@extends('layouts.layout')

@section('main')   

    <div class="container">
        <div class="row justify-content-center">
            <div class="topic-create">
        
                <div id="msg"></div>

                <form id="userData" class="topic-content" action="{{ route('login.user') }}" method="post" >
                    @csrf

                    @if($errors->all())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <div class="form-group">                    
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control inputData" id="email" name="email" placeholder="email">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control inputData" id="password" name="password" placeholder="password">
                    </div>
        
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a style="font-size: 1rem" href="{{ route('showRegister.user') }}" >Cadastrar</a>
                </form>

            </div>
        </div>     
    </div>
    
    @section('js')
        <script src="/scripts/searchTopics.js"></script>
    @endsection
   
@endsection
