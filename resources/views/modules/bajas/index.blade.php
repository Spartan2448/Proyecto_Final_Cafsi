@extends('layouts.admin.app')
@section('title','Listado Bajas')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('baja.create')}}" class="btn btn-primary">Crear Baja</a>
                            @if(session('message'))
                                <div class="alert alert-{{session('type')}} mt-2" role="alert">
                                    {{session('message')}}
                                </div>
                            @endif

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Tipo de Baja</th>
                                    <th>Activo</th>
                                    <th>Observación</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($bajas as $baja)
                                        <tr>
                                            <td>{{$baja->fecha_baja}}</td>
                                            @foreach($tiposbaja as $tipo)
                                                @if($baja->tipo_baja_id == $tipo->id)
                                                    <td>{{$tipo->tipo}}</td>
                                                @endif
                                            @endforeach
                                            @foreach($activos as $activo)
                                                @if($activo->id == $baja->activo_id)
                                                    <td>{{$activo->numero_serie}}</td>
                                                @endif
                                            @endforeach
                                            <td>{{$baja->observacion}}</td>
                                            <td>
                                                <form action="{{route('baja.destroy', $baja->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('baja.show', $baja->id)}}" class="btn btn-outline-info"><img src="/eye.svg"></a>
                                                    <a href="{{route('baja.edit', $baja->id)}}" class="btn btn-outline-warning"><img src="/pencil-square.svg"></a>
                                                    <button type="submit" class="btn btn-outline-danger"><img src="/trash.svg"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
