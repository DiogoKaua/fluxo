@extends('layouts.base')
@section('content')
    <h1>Lançamentos</h1>
    <h2>{{Auth::user()->name}}</h2>
    <hr>

    {{-- alerts --}}
    @include('layouts.partials.alerts')
    {{-- /alerts --}}

    <div class="paginate">
        {!! $lancamentos->links() !!}
    </div>
    

    <div class="table-responsive">
        <table class="table table-striped  table-hover ">
            <thead>
                <caption>LISTA DE</caption>
                <tr>
                    <th class="col-2">#</th>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Centro de Custo</th>
                    <th>Descrição</th>
                    <th>Usuario</th>
                    <th>Data do Lançamento</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

               @forelse ( $lancamentos as $lancamento )

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
                        <td>{{$lancamento->vencimento->format('d/m/y') }}H</td>
                        <td>{{ $lancamento->tipo->tipo}}</td>
                        <td>{{ $lancamento->valor}}</td>
                        <td>{{ $lancamento->centroCusto->centro_custo}}</td>
                        <td>{{ $lancamento->descricao}}</td>
                        <td>{{ $lancamento->usuario->name}}</td>
                        <td>{{$lancamento->created_at->format('d/m/y \a\s H:i') }}</td>
                        <td>
                           
                    </td>
                    </tr>
                @empty
                   <tr>
                        <td colspan="8">
                           Nenhum Registro Encontrado 
                        </td>
                   </tr>
               @endforelse

            </tbody>
        </table>
    </div>

    <style>
        h1{
            text-align: center;
        }
        h2{
            font-family: fantasy;
            font-size: 18px;
            letter-spacing: 1px
                       
        }

        .paginate{
            font-family:Arial, Helvetica, sans-serif;
            font-weight: bolder;
            letter-spacing: 1px;
        }
    </style>

{{-- Modal Excluir --}}
@include('layouts.partials.modalExcluir')
{{-- /Modal Excluir --}}
@endsection
@section('scripts')
@parent

@endsection
