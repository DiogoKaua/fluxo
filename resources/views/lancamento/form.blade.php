@extends('layouts.base')

@section('content')

    <h1 class="mx-3 my-4">

        <i class="bi bi-wallet2"></i>

        @if ($lancamento)

            Editar lançamento:

            Nº {{$lancamento->id_lancamento}}

        @else

            Novo lançamento

        @endif

    </h1>

    <form

    action="{{

        $lancamento?

        route('lancamento.update',['id'=>$lancamento->id_lancamento]):

        route('lancamento.store')

    }}"

       method="post" enctype="multipart/form-data" class="row g-3">

        @csrf

        <div class="col-md-2">

            <label for="id_tipo" class="form-label">Tipo*</label>

            <select id="id_tipo" class="form-select" required>

                <option>Escolha...</option>

                @foreach ($tipos::orderBy('tipo')->get() as $tipo )

                    <option value="{{$tipo->id_tipo}}"

                   @selected(

                      ($lancamento &&

                      $lancamento->id_tipo == $tipo->id_tipo)

                      ||

                      old('id_tipo') == $tipo->id_tipo

                   )

                    >

                        {{$tipo->tipo}}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="col-md-3">

            <label for="id_centro_custo" class="form-label">Centro de Custo*</label>

            <select id="id_centro_custo" class="form-select" required>

                <option value="">Escolha...</option>

                @foreach($centrosDeCusto::orderBy('centro_custo')->get() as $centro )

                       <option value="{{ $centro->id_centro_custo}}"

                        @selected(

                            (

                               $lancamento &&

                               $lancamento->id_centro_custo == $centro->id_centro_custo

                            )

                            ||

                            old('id_centro_custo') == $centro->id_centro_custo

                            )

                        >

                        {{$centro->centro_custo}}

                       </option>

                    @endforeach



            </select>

        </div>

        <div class="col-md-4">

            <label class="form-label" for="valor">Valor*</label>

            <input class="form-control"

            type="number" id="valor" name="valor"

            value="{{

            $lancamento?

            $lancamento->valor :

            old('valor')

            }}"

            required>

        </div>
        <div class="col-md-3">
            <label for="anexo" class="from-label">
                Anexo
            </label>
            <input type="file" class="form-control" name="anexo" id="anexo" value="{{old('anexo')}}">
        </div>

        <div class="col-md-12">

            <label class="form-label" for="descricao">Descrição*</label>

            <input class="form-control"

            type="text" id="descricao" name="descricao"

            value="{{

                $lancamento?

                $lancamento->valor :

                old('descricao')

                }}"

            required>

        </div>

        <div class="col-md-2 offset-md-9">

            <input class="btn btn-primary" type="submit"

        value="{{

            $lancamento?

            'Atualizar' :

            'Cadastrar'

            }}">

        </div>





    </form>

@endsection

@section('scripts')

    @parent

@endsection


