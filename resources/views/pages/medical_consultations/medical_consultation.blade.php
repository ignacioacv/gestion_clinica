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
        <h5>Listado de consultas medicas realizadas</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>ID de la cita</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Fecha y hora de inicio</th>
                    <th>Fecha y hora de finalizacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medical_consultations as $medicalItem)
                    <tr>
                        <td>{{ $medicalItem->apoiment_id }}</td>
                        <td>{{ $medicalItem->medical_consultation_date }}</td>
                        <td>{{ $medicalItem->description}}</td>
                        <td>{{ $medicalItem->start_date}}</td>
                        <td>{{ $medicalItem->end_date}}</td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalMedical{{ $medicalItem->id }}">Editar</button>
                        </td>
                    </tr>

                    <!--Modal-->
                    <div class="modal fade" id="ModalMedical{{ $medicalItem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar consulta medica:

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('update_medical', $medicalItem->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        @csrf
                                        <label for="">Descripcion de la consulta</label>
                                        <textarea class="form-control" name="medicalConsultationDescriptionEdit" rows="3" maxlength="255">{{ $medicalItem->description }}</textarea>

                                        <label for="">Fecha y hora de inicio</label>
                                        <input type="datetime-local" class="form-control" name="start_dateEdit" value="{{ $medicalItem->start_date }}" readonly
                                            required>

                                        <label for="">Fecha y hora de finalizacion</label>
                                        <input type="datetime-local" class="form-control" name="end_dateEdit" value="{{ $medicalItem->end_date }}"
                                            required>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary"data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Actualizar consulta medica</button>
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

















