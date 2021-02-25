@extends('layouts.app')

@section('content')

<div class='container'>
            <div class='row'>
                <div class="col-sm-8 mx-auto">

                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <form action="{{  route('users.store')  }}" method="POST">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="col-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-primary mb-2">Enviar</button>
                                    </div> 
                                </div>
                            </form>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                - {{ $error }} <br>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                         
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user-> id }}</td>
                                <td>{{ $user-> name }}</td>
                                <td>{{ $user-> email }}</td>
                                <td>
                                    <form action="{{  route('users.destroy', $user ) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar a {{ $user->name  }} ?')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
@endsection

