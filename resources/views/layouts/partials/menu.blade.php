<ul>
    <li>
        Ola {{Auth::user()->name}}
    </li>
    <li>
        <a href="{{ route('lancamento.index')}}">
            Lançsmentos
        </a>
    </li>
    <li>
        <a href="{{ route('centro.index')}}">
         Centro de Custo
        </a>
    </li>
    <li>
        <a href="{{route('logout')}}">
            Sair
        </a>
    </li>
</ul>