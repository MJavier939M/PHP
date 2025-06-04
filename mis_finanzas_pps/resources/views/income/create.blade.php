<form action="{{route('incomes.store')}}" method="post">
    @csrf
    <select name="categoria" required>
        <option value="Salario">Salario</option>
        <option value="Inversiones">Inversiones</option>
    </select>
    <input type="number" name="cantidad" required>
    <input type="date" name="fecha" required>
    <button type="submit">Enviar</button>
</form>