<html>

<head>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.0/css/bootstrap.min.css' />
        <title>Relatório Professor</title>
    <style type="text/css">
        body {
            font-size: 10px;
            margin: 0;
        }

        .myh1 {
            text-align:center;
            font-size:20px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 0.5cm;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .row:before {
            display: table;
            content: " ";
        }

        .row:after {
            display: table;
            content: " ";
            clear: both;
        }

        .col-md-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
            float: left;
            width: 100%;
        }

        .col-md-9 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
            float: left;
            width: 75%;
        }

        .col-md-3 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
            float: left;
            width: 25%;
        }

        .pull-right {
            float: right !important;
            margin-right: 60px;
        }

        hr.line {
            border: 1px solid;
        }

        .logo {
            width: -4342px;
        }

    </style>
</head>

<!-- 
    Agendamentos somente finalizados
    Redicerionar para o professor logado.
    E professor como responsável.
 -->

<body>
    
    <img class="img" src="{{ public_path('img/icon_unitins.png') }}" alt="Logo Unitins Branca" />
    <h1 class="myh1">Agendamentos</h1>

    <table class="table table-bordered" style="text-align:center;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Solicitante</th>
                <th>Data</th>
                <th>Início</th>
                <th>Término</th>
                <th>Ambiente</th>
                <th>Curso</th>
                <th>Disciplina</th>
                <th>Motivo</th>
            </tr>
        </thead>
        <tbody>
        @forelse($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->users->name }}</td>
            <td>{{ brDate($item->data )}}</td>
            <td>{{ $item->horainicio }}</td>
            <td>{{ $item->horafim }}</td>
            <td>{{ $item->ambientes->nome }}</td>
            <td>{{ $item->cursos->nome }}</td>
            <td>{{ $item->disciplinas->nome }}</td>
            <td>{{ $item->motivos->motivo }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="9" style="text-align:center">
                Não foram encontrados registros
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>

</body>

</html>