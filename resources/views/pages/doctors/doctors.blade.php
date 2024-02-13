@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
  <h5 class="card-header">Doctores activos</h5>
  <div class="pt-3 px-4">
    <a href="{{ url('/add_doctor_form')}}"><i class='bx bxs-book-add'></i> Agregar Doctor</a>
  </div>
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
        <th></th>
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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCita{{ $doctorItem->id }}">Editar información</button>
            <form action="{{route('desactivar_doctor', $doctorItem->id)}}" method="POST">
              @csrf
              @method('PUT')
              <button type="submit" class="btn btn-danger">Cambiar Estado</button>
          </form>
          </td>
          <td>
            <form id="borrarFiledata{{ $doctorItem->id }}" action="{{ route('delete_doctor', $doctorItem->id) }}" method="POST">
              @csrf 
              @method('delete')
          </form><button type="button" class="btn btn-success bx bxs-trash" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $doctorItem->id }}"></button>
          </td>
        </tr>
        <!-- Modal Delete-->
        <div class="modal fade" id="ModalDelete{{ $doctorItem->id }}" tabindex="-1" aria-labelledby="borrarBaseLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-gradient-danger ">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar información del doctor: {{ $doctorItem->name. ' '.$doctorItem->surname }} </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-left">
                <label for="">¿Dese eliminar este registro?</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#borrarFiledata{{ $doctorItem->id }}" 
                id="confirmarBorrar" onclick="event.preventDefault(); document.getElementById('borrarFiledata{{ $doctorItem->id }}').submit();">Borrar</button>
          </div>
      </div>
  </div>
</div>
      <!--Modal Editar-->
      <div class="modal fade" id="ModalCita{{ $doctorItem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar información del doctor: {{ $doctorItem->name. ' '.$doctorItem->surname }} </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update_doctor', $doctorItem->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="modal-body">
                @csrf
                <label for="">Nombre: </label>
                <input type="text" class="form-control" name="nameEdit" value="{{$doctorItem->name}}"required>

                <label for="">Apellido: </label>
                <input type="text" class="form-control" name="surnameEdit" value="{{$doctorItem->surname}}"required>

                <label for="">Correo Electrónico: </label>
                <input type="text" class="form-control" name="emailEdit" value="{{$doctorItem->email}}"required>

                <label for="">Número Telefonico: </label>
                <input type="text" class="form-control" name="phone_numberEdit" value="{{$doctorItem->phone_number}}"required>

                <label for="">Contraseña: </label>
                <input type="text" class="form-control" name="passwordEdit" value="{{$doctorItem->password}}"required>

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
