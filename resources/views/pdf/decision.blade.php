<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Décision d'octroi de secours aux décès</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            font-weight: bold;
        }

        .sub-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .left-block {
            width: 48%;
            float: left;
        }

        .right-block {
            width: 48%;
            float: right;
            text-align: right;
        }

        .clear {
            clear: both;
        }

        .title {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            margin: 30px 0;
        }

        .content {
            text-align: justify;
        }

        .articles {
            margin-top: 20px;
        }

        .article {
            margin-bottom: 15px;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
        }

        .underline {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    {{-- EN-TÊTE --}}
    <div class="header">
        REPUBLIKAN’I MADAGASIKARA
    </div>
    <div class="sub-header">
        Fitiavana – Tanindrazana – Fandrosoana
    </div>

    <div class="left-block">
        MINISTÈRE DE L’ÉCONOMIE ET DES FINANCES<br>
        <strong>SECRETARIAT GÉNÉRAL</strong><br>
        DIRECTION GÉNÉRALE DU BUDGET ET DES FINANCES<br>
        DIRECTION DE LA SOLDE ET DES PENSIONS<br>
        SERVICE RÉGIONAL DE LA SOLDE ET DES PENSIONS<br>
        {{ $decision->region ?? 'IHOROMBE' }}
    </div>

    <div class="right-block">
        Décision d’octroi de secours aux décès<br><br>
        <strong>N° {{ $decision->numero_decision }}</strong><br>
        {{ $decision->annee }}
    </div>

    <div class="clear"></div>

    {{-- TITRE --}}
    <div class="title">
        Décision d’octroi de secours aux décès
    </div>

    {{-- CONTENU --}}
    <div class="content">
        Octroyant un secours aux décès au nom de
        <strong>Mme {{ $beneficiaire->name }}</strong>,
        veuve du défunt <strong>{{ $folder->deceased_name }}</strong>,
        instituteur en retraite à pension n° <strong>{{ $folder->deceased_pension }}</strong>,
        décédé le {{ \Carbon\Carbon::parse($decision->date_death)->format('d/m/Y') }},
        affilié à la Caisse de Retraite Civile et Militaire (CRCM).
    </div>

    {{-- VISAS --}}
    <div class="articles">
        <p><strong>LE DIRECTEUR DE LA SOLDE ET DES PENSIONS</strong></p>

        <p>- Vu la Constitution ;</p>
        <p>- Vu le Décret n° 2024-1456 du 12 janvier 2024 portant nomination du Premier Ministre, Chef du Gouvernement ;</p>
        <p>- Vu le Décret n° 2024-1612 du 22 août 2024 modifié et complété par le Décret n° 2025-812 du 29 juillet 2025 ;</p>
        <p>- Vu le Décret n° 89-094 du 12 avril 1989 modifiant certaines dispositions du Décret n° 62-144 du 21 mars 1962 ;</p>
        <p>- Vu la demande de l’intéressé(e) ;</p>
    </div>

    {{-- DÉCIDE --}}
    <div class="title">
        DÉCIDE
    </div>

    <div class="articles">
        <div class="article">
            <strong class="underline">Article 1 :</strong><br>
            Un secours aux décès de
            <strong>
                {{ $decision->allocated_amount }}
            </strong>
            Ariary
            (<strong>{{ number_format($decision->allocated_amount, 0, ',', ' ') }} Ar</strong>)
            est concédé à Mme/Mr {{ $beneficiaire->name }} {{ $beneficiaire->firstname }},
            demeurant à {{ $beneficiaire->adresse }}.
        </div>

        <div class="article">
            <strong class="underline">Article 2 :</strong><br>
            La présente dépense est payable sur le compte de commerce CRCM ou CPR,
            ligne budgétaire du Service (6521) intitulée
            Caisse de Retraite Civile et Militaire (CRCM).
        </div>

        <div class="article">
            <strong class="underline">Article 3 :</strong><br>
            L’Ordonnateur de la caisse (CRCM ou CPR) et le Comptable Payeur
            sont chargés chacun en ce qui le concerne de l’exécution
            de la présente décision.
        </div>
    </div>

    {{-- SIGNATURE --}}
    <div class="signature">
        Ihosy, le {{ \Carbon\Carbon::parse($decision->date_decision)->format('d/m/Y') }}<br><br>

        P. Le Directeur de la Solde et des Pensions<br>
        par Délégation<br><br>

        <strong>{{ $decision->decision_agent }}</strong>
    </div>

</body>
</html>