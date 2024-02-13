@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
  <h3>Registrar Enfermera</h3>
  <form action="{{ route('save_nurse') }}" method="POST">
    @csrf
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="nameAdd" required>

    <label for="">Apellido</label>
    <input type="text" class="form-control" name="surnameAdd" required>

    <label for="">Número Telefonico</label>
    <input type="number" class="form-control" name="phoneAdd" required>

    <label for="email">Correo Electronico</label>
    <input type="text" class="form-control" name="emailAdd" required>

    <label for="">Contraseña</label>
    <input type="text" class="form-control" name="passwordAdd" required>

    <label for="">Área designada</label>
    <input type="text" class="form-control" name="designatedAdd" required>

    <br>
    <input type="submit" class="btn btn-primary my-4" value="Guardar">
  </form>
</div>
@endsection