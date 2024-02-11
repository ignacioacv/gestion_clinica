@extends('template_admin')

@section('contenido-dinamico')
<div class="content-wrapper">
    <h3>Registrar un nueva conulta medica</h3>
        @foreach ($apoiments as $apoimentItem)
            <div class="card w-75 mb-3">
                <div class="card-body">
                    <h5 class="card-title">Datos de la cita para el paciente:
                        <b>{{ $apoimentItem->patient_name . ' ' . $apoimentItem->patient_surname }}</b>
                    </h5>
                    <p class="card-text">Fecha de la cita:
                        <b>{{ $apoimentItem->apoiment_date }}</b>
                    </p>
                    <p class="card-text">Doctor encargado:
                        <b>{{ $apoimentItem->doctor_name . ' ' . $apoimentItem->doctor_surname }}</b>
                    </p>
                    <p class="card-text">Enfermera responsable:
                        <b>{{ $apoimentItem->nursing_name . ' ' . $apoimentItem->nursing_surname }}</b>
                    </p>
                    <p class="card-text">Descripcion del padecimiento:
                        <b>{{ $apoimentItem->description }}</b>
                    </p>
                    <p class="card-text">Hora de la cita:
                        <b>{{ $apoimentItem->apoiment_hour }}</b>
                    </p>
                </div>
            </div>
        @endforeach
        <br>
        <h3>Registra informacion de la consulta realizada al paciente: </h3>
        <br>
        <form action="{{ route('save_medical')}}" method="post">
            @csrf
            <input type="hidden" name="apoiment_id" value="{{ $id }}">

            @foreach ($apoiments as $item)
                <input type="hidden" name="patient_id" value="{{ $item->patient_id}}">
            @endforeach

            @foreach ($apoiments as $item)
                <input type="hidden" name="medical_consultation_date" value="{{ $item->apoiment_date }}">
            @endforeach

            <br>
            <label for="">Enfermedad que presenta el paciente: </label>
            <select class="form-select" name="diseases_select">
                @foreach ($diseases as $diseaseItem)
                    <option value="{{ $diseaseItem->id }}">{{ $diseaseItem->disease }}</option>
                @endforeach
            </select>

            <label for="">Descripcion de la consulta: </label>
            <textarea class="form-control" name="medical_consultation_description" rows="3" cols="3" maxlength="255" required></textarea>

            <label for="">Fecha y hora de inicio: </label>
            @foreach ($apoiments as $item)
                <input type="datetime-local" class="form-control" name="start_date" value="{{ $item->apoiment_date.' '.$item->apoiment_hour}}" readonly>
            @endforeach

            <label for="">Fecha y hora de finalizacion de la consulta: </label>
            <input type="datetime-local" class="form-control" name="end_date" required>
            <br>

            <input type="submit" class="btn btn-primary my-4" value="Guardar consulta medica">
        </form>
</div>
@endsection
