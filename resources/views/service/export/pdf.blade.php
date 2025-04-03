<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Liste des services</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date de création</th>
                <th>Date de dernière MAJ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{   $service->created_at->format('d/m/Y H:i')}}</td>
                    <td>{{  $service->updated_at -> format('d/m/Y H:i')}}}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>