@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
  <h5 class="card-header">Pacientes</h5>
  <div class="pt-3 px-4">
    <a href="{{ url('add_patient')}}"><i class='bx bxs-book-add'></i> Agregar paciente</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Número telefonico</th>
        <th>Contraseña</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($patient as $patientItem)
        <tr>
          <td>{{ $patientItem->id }}</td>
          <td>{{ $patientItem->name}}</td>
          <td>{{ $patientItem->surname}}</td>
          <td>{{ $patientItem->email}}</td>
          <td>{{ $patientItem->phone_number}}</td>
          <td>{{ $patientItem->password}}</td>
          <td>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCita{{ $patientItem->id }}">Editar información</button>
          </td>
          <td>
            <form id="borrarFiledata{{ $patientItem->id }}" action="{{ route('delete_patient', $patientItem->id) }}" method="POST">
              @csrf 
              @method('delete')
          </form><button type="button" class="btn btn-success bx bxs-trash" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $patientItem->id }}"></button>
          </td>
        </tr>
        <!-- Modal Delete-->
        <div class="modal fade" id="ModalDelete{{ $patientItem->id }}" tabindex="-1" aria-labelledby="borrarBaseLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-gradient-danger ">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar información del paciente: {{ $patientItem->name. ' '.$patientItem->surname }} </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-left">
                <label for="">¿Dese eliminar este registro?</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#borrarFiledata{{ $patientItem->id }}" 
                onclick="event.preventDefault(); document.getElementById('borrarFiledata{{ $patientItem->id }}').submit();">Borrar</button>
          </div>
      </div>
  </div>
</div>
      <!--Modal Editar-->
      <div class="modal fade" id="ModalCita{{ $patientItem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar información del paciente: {{ $patientItem->name. ' '.$patientItem->surname }} </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update_patient', $patientItem->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="modal-body">
                @csrf
                <label for="">Nombre: </label>
                <input type="text" class="form-control" name="nameEdit" value="{{$patientItem->name}}"required>

                <label for="">Apellido: </label>
                <input type="text" class="form-control" name="surnameEdit" value="{{$patientItem->surname}}"required>

                <label for="">Correo Electrónico: </label>
                <input type="text" class="form-control" name="emailEdit" value="{{$patientItem->email}}"required>

                <label for="">Número Telefonico: </label>
                <input type="text" class="form-control" name="phone_numberEdit" value="{{$patientItem->phone_number}}"required>

                <label for="">Contraseña: </label>
                <input type="text" class="form-control" name="passwordEdit" value="{{$patientItem->password}}"required>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
