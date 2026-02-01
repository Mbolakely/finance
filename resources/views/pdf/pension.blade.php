<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        h1 { text-align: center; text-transform: uppercase; font-size: 16px; }
        .center { text-align: center; }
        .mt { margin-top: 20px; }
    </style>
</head>
<body>

<div class="center">
    <strong>REPOBLIKAN’I MADAGASIKARA</strong><br>
    Fitoviana – Tanindrazana – Fandrosoana
</div>

<h1 class="mt">Décision d’octroi de secours aux décès</h1>

<p><strong>N° :</strong> {{ $decision->numero_decision }}</p>

<p>
    Octroyant un secours aux décès au nom de :
    <strong>{{ $folder->beneficiaires->first()?->name }}</strong>,
    veuve du défunt <strong>{{ $folder->deceased_name }}</strong>
</p>

<hr>

<p><strong>DÉCIDE :</strong></p>

<p>
    Article 1 :  
    Un secours aux décès de
    <strong>{{ number_format($decision->allocated_amount, 0, ',', ' ') }} Ar</strong>
    est accordé.
</p>

<p>
    Article 2 :  
    La dépense est imputée au budget {{ $decision->code_imputation }}.
</p>

<p class="mt">
    Fait à Ihosy, le {{ \Carbon\Carbon::parse($decision->date_decision)->format('d/m/Y') }}
</p>

<p class="mt">
    <strong>{{ $decision->decision_agent }}</strong><br>
    Directeur de la Solde et des Pensions
</p>

</body>
</html>