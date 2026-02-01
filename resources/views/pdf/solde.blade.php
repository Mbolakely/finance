<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans; font-size: 11px; }
        h1 { text-align: center; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; }
        td, th { border: 1px solid #000; padding: 5px; }
    </style>
</head>
<body>

<h1>DÉCISION D’ATTRIBUTION DE SECOURS AU DÉCÈS SUR SOLDE</h1>

<p><strong>N° Décision :</strong> {{ $decision->numero_decision }}</p>

<table>
    <tr>
        <th>Ancienne position</th>
        <th>Nouvelle position</th>
    </tr>
    <tr>
        <td>
            Budget : Général<br>
            Imputation : {{ $decision->code_imputation }}
        </td>
        <td>
            Budget : Général
        </td>
    </tr>
</table>

<p class="mt">
    Montant accordé :
    <strong>{{ number_format($decision->allocated_amount, 0, ',', ' ') }} Ar</strong>
</p>

<p>
    Décès de : <strong>{{ $folder->deceased_name }}</strong><br>
    Date de décès : {{ \Carbon\Carbon::parse($folder->date_death)->format('d/m/Y') }}
</p>

<p class="mt">
    Signature :
</p>

</body>
</html>