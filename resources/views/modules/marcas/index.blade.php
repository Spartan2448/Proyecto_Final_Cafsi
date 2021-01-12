<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado Marcas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <a href="{{route('marca.create')}}" class="btn btn-primary">Crear Marca</a>
                            @if(session('message'))
                                <div class="alert alert-{{session('type')}} mt-2" role="alert">
                                    {{session('message')}}
                                </div>
                            @endif
                            <table-responsive>
                                <table class="table table-bordered mt-3">
                                    <thead>
                                    <tr>
                                        <th>Marca</th>
                                        <th>Estado</th>
                                        <th>Fecha Creación</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($marcas as $marca)
                                        <tr>
                                            <td>{{$marca->marca}}</td>
                                            @foreach($estados as $estado)
                                                @if($marca->estado_id == $estado->id)
                                                    <td>{{$estado->estado}}</td>
                                                @endif
                                            @endforeach
                                            <td>{{$marca->created_at}}</td>
                                            <td>
                                                <form action="{{route('marca.destroy',$marca->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('marca.show',$marca->id)}}" class="btn btn-info">Detalle</a>
                                                    <a href="{{route('marca.edit',$marca->id)}}" class="btn btn-warning">Editar</a>
                                                    <button class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </table-responsive>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
