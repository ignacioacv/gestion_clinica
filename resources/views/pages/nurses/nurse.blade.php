@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
  <h5 class="card-header">Enfermeras</h5>
  <div class="pt-3 px-4">
    <a href="{{ url('add_nurses')}}"><i class='bx bxs-book-add'></i> Agregar enfermera</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Número telefonico</th>
        <th>Email</th>
        <th>Contraseña</th>
        <th>Área designada</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($nurse as $nurseItem)
        <tr>
          <td>{{ $nurseItem->id }}</td>
          <td>{{ $nurseItem->name}}</td>
          <td>{{ $nurseItem->surname}}</td>
          <td>{{ $nurseItem->phone_number}}</td>
          <td>{{ $nurseItem->email}}</td>
          <td>{{ $nurseItem->password}}</td>
          <td>{{ $nurseItem->designated_area}}</td>
          <td>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCita{{ $nurseItem->id }}">Editar información</button>
          </td>
          <td>
            <form id="borrarFiledata{{ $nurseItem->id }}" action="{{ route('delete_nurse', $nurseItem->id) }}" method="POST">
              @csrf 
              @method('delete')
          </form><button type="button" class="btn btn-success bx bxs-trash" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $nurseItem->id }}"></button>
          </td>
        </tr>
        <!-- Modal Delete-->
        <div class="modal fade" id="ModalDelete{{ $nurseItem->id }}" tabindex="-1" aria-labelledby="borrarBaseLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-gradient-danger ">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar información de la enfermera: {{ $nurseItem->name. ' '.$nurseItem->surname }} </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-left">
                <label for="">¿Desea eliminar este registro?</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#borrarFiledata{{ $nurseItem->id }}" 
                onclick="event.preventDefault(); document.getElementById('borrarFiledata{{ $nurseItem->id }}').submit();">Borrar</button>
          </div>
      </div>
  </div>
</div>
      <!--Modal Editar-->
      <div class="modal fade" id="ModalCita{{ $nurseItem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar información del paciente: {{ $nurseItem->name. ' '.$nurseItem->surname }} </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update_nurse', $nurseItem->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="modal-body">
                @csrf
                <label for="">Nombre: </label>
                <input type="text" class="form-control" name="nameEdit" value="{{$nurseItem->name}}"required>

                <label for="">Apellido: </label>
                <input type="text" class="form-control" name="surnameEdit" value="{{$nurseItem->surname}}"required>

                <label for="">Número Telefonico: </label>
                <input type="text" class="form-control" name="phone_numberEdit" value="{{$nurseItem->phone_number}}"required>

                <label for="">Correo Electrónico: </label>
                <input type="text" class="form-control" name="emailEdit" value="{{$nurseItem->email}}"required>

                <label for="">Contraseña: </label>
                <input type="text" class="form-control" name="passwordEdit" value="{{$nurseItem->password}}"required>

                <label for="">Área designada: </label>
                <input type="text" class="form-control" name="designatedEdit" value="{{$nurseItem->designated_area}}"required>

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
