<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    h1{
        color:darkgreen;
        text-align: center;
    }
</style>
<body>
    <h1>Lista de Enfermeras</h1>
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Número telefonico</th>
            <th>Área designada</th>
        </thead>
        <tbody>
            @foreach ($nurse as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->surname}}</td>
                    <td>{{$item->phone_number}}</td>
                    <td>{{$item->designated_area}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>