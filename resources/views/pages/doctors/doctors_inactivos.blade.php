@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
  <h5 class="card-header">Doctores Inactivos</h5>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Número telefonico</th>
        <th>Estado</th>
        <th>Contraseña</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($doctors as $doctorItem)
        <tr>
          <td>{{ $doctorItem->id }}</td>
          <td>{{ $doctorItem->name}}</td>
          <td>{{ $doctorItem->surname}}</td>
          <td>{{ $doctorItem->email}}</td>
          <td>{{ $doctorItem->phone_number}}</td>
          <td>{{ $doctorItem->state}}</td>
          <td>{{ $doctorItem->password}}</td>
          <td>
            <form action="{{route('activar_doctor', $doctorItem->id)}}" method="POST">
              @csrf
              @method('PUT')
              <button type="submit" class="btn btn-danger">Cambiar Estado</button>
          </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection