<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Secours</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .section {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid #000;
            padding: 8px;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>ATTESTATION DE SECOURS</h2>
</div>

<div class="section">
    <strong>Dossier :</strong> {{ $folder->matricule }} <br>
    <strong>Numéro de secours :</strong> {{ $secours->numero_secours }}
</div>

<div class="section">
    <h4>Informations du défunt</h4>
    <table>
        <tr>
            <th>Nom</th>
            <td>{{ $folder->deceased_name }}</td>
        </tr>
        <tr>
            <th>Poste</th>
            <td>{{ $folder->deceased_poste }}</td>
        </tr>
        <tr>
            <th>CIN</th>
            <td>{{ $folder->deceased_cin }}</td>
        </tr>
    </table>
</div>

<div class="section">
    <h4>Liste des bénéficiaires</h4>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Rôle</th>
            </tr>
        </thead>
        <tbody>
            @forelse($beneficiaires as $index => $beneficiaire)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $beneficiaire->nom }}</td>
                    <td>{{ $beneficiaire->pivot->role }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center">
                        Aucun bénéficiaire enregistré
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="footer">
    <strong>Ihosy</strong>, le {{ now()->format('d/m/Y') }}
</div>

</body>
</html>