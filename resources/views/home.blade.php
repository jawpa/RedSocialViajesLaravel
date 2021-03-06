@extends('layouts.layout_principal')

@section('contenido')
<style type="text/css">
  div,h4,p {color:black}
  
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Bienvenido {{ Auth::user()->name }} </h1>
                    <img src="{{ Auth::user()->avatar }}" alt="" style="width: 100px">
                    <br>
                    <a href="/users/{{ Auth::user()->id }}/edit" class="btn btn-primary">Editar</a>
                    <br>
                    <a href="{{ url('/') }}">Página Principal</a>
                    <ul>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">
                            Logout</a>
                            <li><a href="{{route('users.index')}}" class="btn"><h3>Ver Otros Viajeros</h3></a></li>
                            <li><a href="/indexado/{{Auth::user()->id}}">Crud Posteos</a></li>
                            <li><a href="posts/create">Escribir un Posteo</a></li>
                            <li><p><a href="/users/{{Auth::user()->id}}">Mi página pública</a></li>
                            <li><a href="/categorias">Crud Categorias</a></li>
                            <li><a href="/etiquetas">Crud Etiquetas</a></li>
                        </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
