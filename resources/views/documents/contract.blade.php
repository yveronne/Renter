<style>
    div {
        margin-bottom: 19px;
    }
    .article{
        text-align: justify;
    }
</style>

<div style="text-align: center;"><h2><u>CONTRAT DE BAIL A DUREE INDETERMINEE</u></h2></div>
<div>
    Entre les soussignés : <br>
    Monsieur <strong>{{strtoupper(Auth::user()->lastName)}} {{ucfirst(Auth::user()->firstName)}}</strong> désigné dans ce qui suivra Le Bailleur d'une part; <br>
    {{$civility}} <strong>{{strtoupper($tenantLastName)}} {{ucfirst($tenantFirstName)}}</strong> désigné(e) dans ce qui suivra Locataire d'autre part; <br>
    Avant la conclusion de leur contrat, les parties entendent faire les déclarations suivantes :
</div>

<div class="article">
    <strong><u>Article 1er:</u> Désignation</strong> <br>
    Le Bailleur loue par les présentes au Locataire qui accepte un appartement composé de : <br>
    <ul>
        <li>{{$apartment->livingRoomsNumber}} salon(s)</li>
        <li>{{$apartment->bedroomsNumber}} chambre(s) à coucher</li>
        <li>{{$apartment->kitchensNumber}} cuisine(s)</li>
        <li>{{$apartment->bathroomsNumber}} salle(s) d'eau</li>
    </ul>
</div>

<div class="article">
    <strong><u>Article 2:</u></strong> <br>
    {{$civility}} <strong>{{strtoupper($tenantLastName)}} {{ucfirst($tenantLastName)}}</strong> déclare avoir parfaitement pris connaissance de l’état des lieux et
    n’émet aucune réserve.
</div>

<div class="article">
    <strong><u>Article 3:</u> Entretien des lieux</strong> <br>
    Le Preneur jouira en bon père de famille. L’appartement doit être gardé propre. En cas de casse ou bris
    des installations ou des matériaux provenant du Locataire, les réparations sont à sa charge. Un constat d’état
    des lieux précèdera la remise des clés. Une caution de {{$caution}} Francs
    CFA sera versée avant l’occupation des lieux. Cette caution sera remboursée au moment de quitter
    l’appartement s’il a été gardé à l’état initial. <br>
</div>

<div class="article">
    <strong><u>Article 4:</u> Durée du bail</strong> <br>
    Le présent contrat est consenti pour une durée d’un an à compter du {{$tenureDate->format('d-m-Y')}} au
    {{($tenureDate->add(new \DateInterval('P1Y')))->format('d-m-Y')}} <br>
    Il sera renouvelé par tacite reconduction sauf dénonciation de l’une de ses parties. <br>
</div>

<div class="article">
    <strong><u>Article 5:</u> Electricité et eau</strong> <br>
    Elles sont à la charge du locataire. <br>
</div>

<div class="article">
    <strong><u>Article 6:</u> Prix</strong> <br>
    Une avance de loyers de {{$advance}} mois est versée à l’occupation des lieux ; le présent bail est conclu
    pour un loyer mensuel de {{$apartment->monthlyRent}} Francs CFA payable par avance et au plus tard le
    10 (dix) de chaque mois. <br>
</div>

<div class="article">
    <strong><u>Article 7:</u> Défaut de paiement</strong> <br>
    A défaut de paiement d’un seul terme du loyer à son échéance d’exécution d’une quelconque des
    clauses du bail, le présent contrat sera résilié de plein droit sans formalités judiciaires 8 (huit) jours après une
    simple mise en demeure par lettre recommandée ou sommation d’huissier de payer ou de remplir les clauses du
    bail. L’expulsion sera ensuite prononcée par simple ordonnance de référé. <br>
</div>

<div style="text-align: right">
    <strong>Fait en trois exemplaires dont un pour l’enregistrement.</strong><br><br>
    Yaoundé le .....................................
</div>

<table style="width: 100%">
    <tr>
        <td style="font-weight: bold; text-decoration: underline">Le Locataire</td>
        <td style="text-align: right">
            <strong><u>Le Bailleur</u></strong>
        </td>
    </tr>
</table>

