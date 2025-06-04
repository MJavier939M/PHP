<x-layouts.main :title="$title">
    <p>El body de incomes:</p>
    <x-tabla :tableData="$tableData"/>
    <x-boton :nombreEnlace="$nombreEnlace"/>
    @if (session("success"))
        <p>{{session("success")}}</p>
    @endif
</x-layouts.main>
