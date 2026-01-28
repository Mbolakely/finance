<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; }
        h1 { text-align: center; }
    </style>
</head>
<body>

<h1>DÉCISION</h1>

<p><strong>Dossier :</strong> {{ $folder->matricule }}</p>
<p><strong>Type :</strong> {{ $decision->type_decision }}</p>
<p><strong>Date :</strong> {{ $decision->date_decision }}</p>

</body>
</html>
