@extends('theme.base')

@section('content')

    <div class="container  py-5 text-center">
        <h1>Listado de Clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Cliente</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
               {{ Session::get('mensaje')}}     
            </div>            
        @endif

        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </thead>
            
            <tbody>
                @forelse ($clients as $r)
                <tr>
                    <td>{{$r->name}}</td>
                    <td>{{$r->due}}</td>
                    <td>
                       <a href="{{ route('client.edit', $r)}}" class="btn btn-warning">Editar</a>
                       <form action="{{route('client.destroy', $r)}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Estas Seguro de eliminar este registro')">Eliminar</button>
                        </form>

                    </td>
                </tr>
                @empty
                    <td colspan="3">No hay Registros</td>
                @endforelse
                
            </tbody>
        </table>
       
            @if ($clients->count())
                    {{ $clients->links()}}
            @endif



    </div>
@endsection