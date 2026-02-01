<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { 
            font-family: 'DejaVu Sans', sans-serif; 
            font-size: 12px;
            line-height: 1.4;
        }
        .header { width: 100%; margin-bottom: 20px; }
        .left-header { width: 50%; float: left; text-align: center; font-size: 10px; }
        .republique { text-align: center; margin-bottom: 40px; }
        
        .title { 
            text-align: center; 
            font-weight: bold; 
            font-size: 16px; 
            margin: 30px 0;
            text-decoration: underline;
        }

        .content { margin: 20px 0; text-align: justify; }
        
        .amounts-table { 
            width: 60%; 
            margin: 20px auto; 
            border-collapse: collapse; 
        }
        .amounts-table td { padding: 3px; }
        .dotted-line { border-bottom: 1px dotted #000; width: 100%; display: inline-block; }
        
        .footer { margin-top: 40px; float: right; width: 300px; text-align: center; }
        .stamp-area { height: 100px; }

        .watermark {
            position: absolute;
            top: 30%;
            left: 20%;
            transform: rotate(-45deg);
            font-size: 80px;
            color: rgba(150, 150, 150, 0.2);
            z-index: -1;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="left-header">
        MINISTERE DE L'ECONOMIE ET DES FINANCES<br>
        -----------------------<br>
        SECRETARIAT GENERAL<br>
        DIRECTION GENERALE DU BUDGET ET DES FINANCES<br>
        DIRECTION DE LA SOLDE ET DES PENSIONS<br>
        SERVICE REGIONAL DE LA SOLDE ET DES PENSIONS<br>
        <strong>{{ $folder->deceased_poste ?? 'IHOROMBE' }}</strong>
    </div>
    
    <div class="republique">
        <!-- <img src="path/to/logo_madagascar.png" width="80"><br> -->
        REPOBLIKAN'I MADAGASIKARA<br>
        <small>Fitiavana - Tanindrazana - Fandrosoana</small>
    </div>
</div>

<div class="title">
    CERTIFICAT DE DECOMPTE D'EMISSION DES<br>
    TITRES DE PAIEMENT DE PENSIONS
</div>

<div class="content">
    Le Chef du Service Régional de la Solde et des Pensions d''Ihorombe soussigné certifie que l'agent :<br>
    <strong>Monsieur {{ $folder->deceased_name }}, Corps : {{ $folder->deceased_job }}, Grade : {{ $folder->matricule }}, Indice : {{ $folder->matricule }}</strong> retraité est titulaire de 
    la pension <strong>CRCM N° {{ $folder->deceased_pension }}</strong>, Payable à la <strong>trésorerie</strong> et décédé le 
    <strong>{{ $folder->date_death }}</strong>.
</div>

<table class="amounts-table">
    <tr>
        <td></td>
        <td>Montant :</td>
        <td style="text-align: right;">{{ $decompte->amount }}</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right; font-weight: bold; padding-top: 10px;">TOTAL :</td>
        <td style="border-top: 1px solid #000; text-align: right; font-weight: bold; padding-top: 10px;">
            {{ $decompte->amount }}
        </td>
    </tr>
</table>

<p>ARRETE A LA SOMME DE : <strong>{{ $decompte->amount }} ARIARY.</strong></p>

<div class="footer">
    <strong>Ihosy</strong>, le
</body>
</html>