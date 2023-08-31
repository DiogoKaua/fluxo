@extends('layouts.base')
@section('content')
<h1>
     <i class="bi bi-list-check">
        Centro de Custo
     </i>
</h1>
    <h1>INDEX - lancamentos </h1>
    <h2>{{ Auth::user()->name}}</h2>

    {{-- alerts --}}
    @include('layouts.partials.alerts')
    {{-- /alerts --}}

    <div class="table-responsive">
        <table class="table table-striped  table-hover ">
            <thead>
                <caption>LISTA DE</caption>
                <tr>
                    <th class="col-2">#</th>
                    <th>Centro de Custo</th>
                    <th>Total de lancamento</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ( $centroCustos as $centro )         
                <tr>
                    <td scope="row" class="col-1">
                        <div class="flex-column">
                            {{-- ver --}}
                            <a class="btn btn-success" href="#">
                                <i class="bi bi-eye"></i>
                            </a>
                            {{-- editar --}}
                            <a class="btn btn-dark" href="#">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            {{-- excluir --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalExcluir" data-identificacao="" data-url="">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        {{$centro->centro_custo}};
                    </td>
                    <td>
                        {{ $centro->lancamentos()->count() }};
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

{{-- Modal Excluir --}}
@include('layouts.partials.modalExcluir')
{{-- /Modal Excluir --}}
@endsection
@section('scripts')
@parent

@endsection
