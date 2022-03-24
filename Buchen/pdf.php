<?php
ob_start();
require(__DIR__. "/../Funktionen/all.php"); 
session_start();


$rechnungs_nummer = $_SESSION['id'];
$rechnungs_datum = date("d.m.Y");
$pdfAuthor = "schwimmschule-allgaeu.de";

$rechnungs_header = '
<img src="logo.png">
Schwimmschule Allgäu
Alfrd Hartmann
schwimmschule-allgaeu.de';

$rechnungs_empfaenger = 'username: ' . $_SESSION['username'];

$rechnungs_footer = "Wir bitten um eine Begleichung der Rechnung innerhalb von 14 Tagen nach Erhalt. Bitte Überweisen Sie den vollständigen Betrag an:
 
<b>Empfänger:</b> Meine Firma
<b>IBAN</b>: DE85 745165 45214 12364
<b>BIC</b>: C46X453AD";



//Höhe eurer Umsatzsteuer. 0.19 für 19% Umsatzsteuer
$umsatzsteuer = 0.0;

$pdfName = "Rechnung_" . $rechnungs_nummer . ".pdf";


//////////////////////////// Inhalt des PDFs als HTML-Code \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


// Erstellung des HTML-Codes. Dieser HTML-Code definiert das Aussehen eures PDFs.
// tcpdf unterstützt recht viele HTML-Befehle. Die Nutzung von CSS ist allerdings
// stark eingeschränkt.

$html = '
<table cellpadding="5" cellspacing="0" style="width: 100%; ">
 <tr>
 <td>' . nl2br(trim($rechnungs_header)) . '</td>
    <td style="text-align: right">
Rechnungsnummer ' . $rechnungs_nummer . '<br>
Rechnungsdatum: ' . $rechnungs_datum . '<br>
 </td>
 </tr>
 
 <tr>
 <td style="font-size:1.3em; font-weight: bold;">
<br><br>
Rechnung
<br>
 </td>
 </tr>
 
 
 <tr>
 <td colspan="2">' . nl2br(trim($rechnungs_empfaenger)) . '</td>
 </tr>
</table>
<br><br><br>
 
<table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">
<tr style="background-color: #cccccc; padding:5px;">
<td style="padding:5px;"><b>Bezeichnung</b></td>
<td style="text-align: right;"><b>Rabatt</b></td>
</tr>';


$x = 0;
for ($i = 1; $i <= getN("discount"); $i++) {

    $dicount_name = getS("discount", $i, "disc_name");
    $id = $_SESSION["id"];
    $bool = getT("price", $id, $dicount_name);
    if ($bool == 1) {
        $x = $x + getS("discount", $i, "disc");

        $html .= '<tr>
        <td style="text-align: left;">' . getS("discount", $i, "name") . '</td>
        <td style="text-align: right;">' . (getS("discount", $i, "disc") * 100) . '%</td>
        </tr>';
    }
}
$html .= '</table>';



$html .= '
<hr>
<hr>
<table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">
<tr>
    <td colspan="3"><b>Gesamtrabatt: </b></td>
    <td style="text-align: right;"><b>' . (getT("form", $_SESSION["id"], "discount_total") * 100) . '%</b></td>
</tr> 
</table>
<br>
<br>';



if (getT("form", $_SESSION["id"], "einmalzahlung") == "einmalzahlung") {
    $html .= '
    <table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">
    <tr style="background-color: #cccccc; padding:5px;">
    <td style="padding:5px;"><b>Kurs</b></td>
    <td style="text-align: right;"><b>Grundpreis</b></td>
    <td style="text-align: right;"><b>Ges. rabatt</b></td>
    <td style="text-align: right;"><b>Endpreis</b></td>
    <td style="text-align: right;"><b>Laufzeit</b></td>
    <td style="text-align: right;"><b>zu zahlen</b></td>
    </tr>
    <tr>
    <td style="text-align: left;">' . getU("name") . '</td>
    <td style="text-align: right;">' . getU("price") . '€</td>
    <td style="text-align: right;">' . (getU("discount_total") * 100) . '%</td>
    <td style="text-align: right;">' . round(getU("price") * (1 - getU("discount_total")), 2) . '€</td>
    <td style="text-align: right;">' . getU("duration") . ' Monate</td>
    <td style="text-align: right;">' . round(getU("price") * (1 - getU("discount_total")) * getU("duration"), 2) . '€ einmalig</td>
    </tr>
    </table>';
} else {

    $html .= '
    <table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">
    <tr style="background-color: #cccccc; padding:5px;">
    <td style="padding:5px;"><b>Kurs</b></td>
    <td style="text-align: right;"><b>Grundpreis</b></td>
    <td style="text-align: right;"><b>Ges. rabatt</b></td>
    <td style="text-align: right;"><b>Endpreis</b></td>
    <td style="text-align: right;"><b>Laufzeit</b></td>
    <td style="text-align: right;"><b>zu zahlen</b></td>
    </tr>
    <tr>
    <td style="text-align: left;">' . getU("name") . '</td>
    <td style="text-align: right;">' . getU("price") . '€</td>
    <td style="text-align: right;">' . (getU("discount_total") * 100) . '%</td>
    <td style="text-align: right;">' . round((getU("price") * (1 - getU("discount_total"))), 2) . '€</td>
    <td style="text-align: right;">' . getU("duration") . ' Monate</td>
    <td style="text-align: right;">' . round(getU("price") * (1 - getU("discount_total")), 2) . '€ monatlich</td>
    </tr>
    </table>';
}


$html .= '
<br>
<br>';






$html .= nl2br($rechnungs_footer);



//////////////////////////// Erzeugung eures PDF Dokuments \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

// TCPDF Library laden
require_once('tcpdf.php');

// Erstellung des PDF Dokuments
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Dokumenteninformationen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($pdfAuthor);
$pdf->SetTitle('Rechnung ' . $rechnungs_nummer);
$pdf->SetSubject('Rechnung ' . $rechnungs_nummer);


// Header und Footer Informationen
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Auswahl des Font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Auswahl der MArgins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Automatisches Autobreak der Seiten
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Image Scale 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Schriftart
$pdf->SetFont('dejavusans', '', 10);

// Neue Seite
$pdf->AddPage();

// Fügt den HTML Code in das PDF Dokument ein
$pdf->writeHTML($html, true, false, true, false, '');

//Ausgabe der PDF

//Variante 1: PDF direkt an den Benutzer senden:
$pdf->Output($pdfName, 'I');
 
//Variante 2: PDF im Verzeichnis abspeichern:
//$pdf->Output(dirname(__FILE__).'/'.$pdfName, 'F');
//echo 'PDF herunterladen: <a href="'.$pdfName.'">'.$pdfName.'</a>';
