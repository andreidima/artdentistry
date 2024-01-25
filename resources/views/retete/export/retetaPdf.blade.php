<!DOCTYPE  html>
<html lang="ro">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Rețeta</title>
    <style>
        /* html {
            margin: 0px 0px;
        } */
        /** Define the margins of your page **/
        @page {
            margin: 0px 0px;
        }

        /* header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 0px;
        } */

        body {
            font-family: DejaVu Sans, sans-serif;
            /* font-family: Arial, Helvetica, sans-serif; */
            font-size: 12px;
            /* margin-top: 10px; */
            margin-top: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 1cm;
        }

        * {
            /* padding: 0; */
            text-indent: 0;
        }

        table{
            border-collapse:collapse;
            margin: 0px;
            padding: 5px;
            margin-top: 0px;
            border-style: solid;
            border-width: 0px;
            width: 100%;
            word-wrap:break-word;
        }

        th, td {
            padding: 1px 10px;
            border-width: 1px;
            border-style: solid;

        }
        tr {
            border-style: solid;
            border-width: 0px;
        }
        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 0.5px;
        }
    </style>
</head>

<body>
    {{-- <header class="text-center">
        <img src="{{ asset('images/logo.png') }}" width="400px">
    </header> --}}

    <main>

        {{-- <div style="page-break-after: always"> --}}
        <div>

            <table style="">
                <tr valign="" style="">
                    <td colspan="2" style="text-align: center; border-width:0px;">
                        <img src="{{ asset('imagini/logo.png') }}" width="400px">
                    </td>
                </tr>
                <tr>
                    {{-- <td style="border-width:0px;">
                        <b>Unitatea sanitară</b>
                        <br>
                        Denumire: {{ $reteta->unitate_sanitara_denumire }}
                        <br>
                        Adresă: {{ $reteta->unitate_sanitara_adresa }}
                        <br>
                        Număr de telefon: {{ $reteta->unitate_sanitara_telefon }}
                    </td>
                    <td valign="top" style="border-width:0px; text-align:right;">
                        Serie <b>{{ $reteta->serie }}</b> Număr <b>{{ $reteta->numar }}</b>
                    </td> --}}
                    <td colspan="2" style="text-align: center; border-width:0px;">
                        CLINICA MEDICALĂ ART DENTISTRY FOCȘANI
                        <br>
                        CIF 36993096 &nbsp;&nbsp;&nbsp; J39/58/2017
                        <br>
                        Str. Ștefan cel Mare nr. 14, bl. 14B
                        <br>
                        CABINET STOMATOLOGIE/ IMPLANTOLOGIE
                        <br>
                        Tel.: 0337.40.45.19 / 0766.63.63.62
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; border-width:0px;">
                        <br>
                        <br>
                        <h2 style="margin:0%">REȚETĂ</h2>
                        Serie <b>{{ $reteta->serie }}</b> Număr <b>{{ $reteta->numar }}</b>
                    </td>
                </tr>
            </table>

            <br>

            <div style="margin:0px 15px;">
                <b>Datele pacientului:</b>
                <br>
                Nume, prenume: {{ $reteta->pacient_nume }}, vârsta {{ $reteta->pacient_varsta }}
                <br>
                CNP/ CID / număr Card EU(CE): {{ $reteta->pacient_cnp }}
                <br>
                Adresa: {{ $reteta->pacient_adresa }} {{ $reteta->pacient_localitate }}
                <br>
                Diagnostic: {{ $reteta->pacient_diagnostic }}
                <br>
                Diagnostic descriptiv: {{ $reteta->pacient_diagnostic_descriptiv }}
            </div>

            <br>

            <div style="margin:15px 15px;">
                @foreach ($reteta->medicamente as $medicament)
                    <div style="page-break-inside: avoid">
                        <b>Detalii Medicament {{ $loop->iteration }}:</b>
                        <br>
                        Denumire comercială și/sau denumire comună internațională:
                        {{ $medicament->denumire }}.
                        <br>
                        Concentrație: {{ $medicament->concentratie }}, formă farmaceutică {{ $medicament->forma_farmaceutica }}.
                        <br>
                        Mod de administrare: {{ $medicament->mod_administrare }}.
                        <br>
                        Cantitate (exprimată în unități terapeutice): {{ $medicament->cantitate }}.
                        <br>
                        Durata tratamentului (nr zile/luni): {{ $medicament->durata_tratament }}.
                        <br>
                        <br>
                    </div>
                @endforeach
            </div>



            <table style="page-break-inside: avoid;">
                <tr>
                    <td valign="top" style="border-width:0px; width:60%">
                        Data eliberării prescripției medicale,
                        <br>
                        <b>{{ $reteta->data ? \Carbon\Carbon::parse($reteta->data)->isoFormat('DD.MM.YYYY') : '' }}</b>
                    </td>
                    <td style="border-width:0px; text-align:center;">
                        {{ $reteta->medic_nume }}
                        <br>
                        <img src="{{ asset('imagini/StampilaSemnatura.png') }}" width="150px">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border-width:0px; color:red; text-align:center; font-size:16px;">
                        ART DENTISTRY FOCȘANI - ne onorează alegerea
                        <br>
                        dumneavoastră!
                    </td>
                </tr>
            </table>

        </div>


        {{-- Here's the magic. This MUST be inside body tag. Page count / total, centered at bottom of page --}}
        <script type="text/php">
            if (isset($pdf)) {
                $text = "Pagina {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("helvetica");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width) / 2;
                $y = $pdf->get_height() - 20;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>


    </main>
</body>

</html>
