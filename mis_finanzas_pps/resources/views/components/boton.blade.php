<div>
    @foreach ($nombreEnlace as $key => $valor)
        @if ($key == "enlace")
            <a href="{{$valor}}">Visitar</a>
        @else
            <button class="bg-black text-white">{{$valor}}</button>
        @endif
    @endforeach
</div>