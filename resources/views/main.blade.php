@extends('Template.Plantilla')

@section('contenedor')
@role('admin')
<!-- 
<div class="mt-5">
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Rol</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Rol</button>
    </form>
</div> 
-->
<!--Tabla de roles-->
<div class="mt-4">
    <h1>Lista de Usuarios y sus Roles</h1>
    <table class="table">
        <thead class="table-hover table-active">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->roles->isEmpty())
                                Sin rol
                            @else
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}@if (!$loop->last), @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endrole

@endsection