<form method="post" action="{{route('incomes.update', $income->id)}}">
@csrf
@method('PUT')
    <select name="categoria" required>
        <option {{$income->categoria == "Salario" ? 'selected' : "" }} value="Salario">Salario</option>
        <option value="Inversiones" {{$income->categoria == "Inversiones" ? 'selected' : "" }} >Inversiones</option>
    </select>
    <input type="number" name="cantidad" value="{{$income->cantidad}}" required>
    <input type="date" name="fecha" value="{{$income->fecha}}" required>
    <button type="submit">Enviar</button>
</form>