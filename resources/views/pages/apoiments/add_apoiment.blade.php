@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
  <h3>Registrar una nueva cita</h3>
  <form action="{{ route('save_apoiment') }}" method="POST">
    @csrf
    <label for="">Fecha de la cita</label>
    <input type="date" class="form-control" name="dateApoiment" min="2024-01-01" max="2024-12-31" required>

    <label for="">Selecciona un doctor: </label>
    <select name="doctorAdd" class="form-select">
      @foreach ($doctors as $doctorItem)
        <option value="{{$doctorItem->id}}">{{$doctorItem->name.' '.$doctorItem->surname }}</option>
      @endforeach
    </select>

    <label for="">Selecciona un paciente: </label>
    <select name="patientAdd" class="form-select">
      @foreach ($patients as $patientItem)
        <option value="{{$patientItem->id}}">{{$patientItem->name.' '.$patientItem->surname}}</option>
      @endforeach
    </select>

    <label for="">Seleccione una enfermera: </label>
    <select name="nursigAdd" class="form-select">
      @foreach ($nursing_staff as $nursingItem)
        <option value="{{ $nursingItem->id}}">{{$nursingItem->name.' '. $nursingItem->surname}}</option>
      @endforeach
    </select>

    <label for="">Descripcion</label>
    <input type="text" class="form-control" name="descriptionApoiment" required>

    <label for="">Hora</label>
    <input type="time" class="form-control" name="timeAdd" min="08:00" max="17:00" required>

    <br>
    <input type="submit" class="btn btn-primary my-4" value="Guardar cita">
  </form>
</div>
@endsection
