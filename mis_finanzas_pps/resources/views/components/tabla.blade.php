<div>
    <table class="border-collapse:collapse">
        <thead>
        @foreach ($tableData["cabecera"] as $cabecera) 
            <th class="border border-gray-300">{{$cabecera}}</th>
        @endforeach
        <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($tableData["data"] as $dato)
                <tr class="{{$loop->odd ? 'bg-blue-200' : 'bg-green-200'}}">
                    
                    @foreach ($dato as $valor)
                        <td class="border border-gray-300">{{$valor}}</td>
                    @endforeach
                     <td>
                    <form method="post" action="{{route('incomes.destroy', $dato[0])}}">
                    @csrf
                    @method('DELETE') 
                    <button type="submit">Borrar</button>
                    </form>
                    <a href="{{route('incomes.edit', $dato[0])}}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a style="color: red;" href="{{route('incomes.create')}}">Crear</a>
</div>