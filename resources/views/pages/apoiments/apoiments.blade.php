@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      @if (Session::has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          {{Session::get('message')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
  </div>
  <h5 class="card-header">Citas activas</h5>
  <div class="pt-3 px-4">
    <a href="{{ url('/add_apoiment_form')}}"><i class='bx bxs-book-add'></i> Agregar una nueva cita</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Fecha de la cita</th>
        <th>Doctor</th>
        <th>Paciente</th>
        <th>Enfermera</th>
        <th>Descripcion</th>
        <th>Completada</th>
        <th>Hora de la cita</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($apoiments as $apoimentItem)
        <tr>
          <td>{{ $apoimentItem->apoiment_date }}</td>
          <td>{{ $apoimentItem->doctor_name. ' '.$apoimentItem->doctor_surname }}</td>
          <td>{{ $apoimentItem->patient_name. ' '.$apoimentItem->patient_surname }}</td>
          <td>{{ $apoimentItem->nursing_name. ' '.$apoimentItem->nursing_surname }}</td>
          <td>{{ $apoimentItem->description }}</td>
          <td>{{ $apoimentItem->completed == 1 ? 'Si' : 'No' }}</td>
          <td>{{ $apoimentItem->apoiment_hour }}</td>
          <td>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCita{{ $apoimentItem->id }}">Editar cita</button>
            <form action="{{ route('form_medical', $apoimentItem->id)}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success">Registrar consulta</button>
            </form>
          </td>
        </tr>

      <!--Modal-->
      <div class="modal fade" id="ModalCita{{ $apoimentItem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar cita para: {{ $apoimentItem->patient_name. ' '.$apoimentItem->patient_surname }} </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update_apoiment', $apoimentItem->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="modal-body">
                @csrf
                <label for="">Fecha de la cita: </label>
                <input type="date" class="form-control" name="dateApoimentEdit" min="2024-01-01" max="2024-12-31" value="{{ $apoimentItem->apoiment_date }}" required>

                <label for="">Doctor: </label>
                <input type="text" class="form-control" name="doctorEdit" value="{{ $apoimentItem->doctor_name. ' '.$apoimentItem->doctor_surname }}" disabled>

                <label for="">Description</label>
                <input type="text" class="form-control" name="descriptionApoimentEdit" value="{{ $apoimentItem->description }}" required>

                <label for="">Hora: </label>
                <input type="time" class="form-control" name="timeEdit" min="08:00" max="18:00" value="{{ $apoimentItem->apoiment_hour }}" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar cita</button>
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
