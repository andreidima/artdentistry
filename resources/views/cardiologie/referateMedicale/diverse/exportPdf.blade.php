<!DOCTYPE html>
<html lang="ro">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Referat medical</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        * {
            /* padding: 0;
            text-indent: 0; */
        }
        table{
            border-collapse:collapse;
            /* margin: 0px 0px; */
            /* margin-left: 5px; */
            margin-top: 0px;
            border-style: solid;
            border-width:0px;
            width: 100%;
            word-wrap:break-word;
            /* word-break: break-all; */
            /* table-layout: fixed; */
            page-break-inside: avoid;
        }
        th, td {
            padding: 0px 5px;
            border-width:1px;
            border-style: solid;
            table-layout:fixed;
            font-weight: normal;
        }
        tr {
            /* text-align:; */
            /* border-style: solid;
            border-width:1px; */
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
        p {
            text-indent: 15;
        }
        /* tr:nth-child(even) {background-color:lightgray;} */
    </style>
</head>

<body>
            <div style="
                width:700px;
                min-height:600px;
                padding: 0px 0px 0px 0px;
                margin:0px 0px;
                    -moz-border-radius: 0px;
                    -webkit-border-radius: 0px;
                    border-radius: 0px;">

                {{-- <div style="border:dashed #999; border-radius: 25px; padding:0px 20px"> --}}
                <div>
                    <table>
                        <tr>
                            <td style="border-width:0px">
                                CLINICA MEDICALA "ART DENTISTRY", FOCŞANI
                                <br>
                                CABINET CARDIOLOGIE
                                <br>
                                0725.170.979
                            </td>
                            <td width="50%" align="right" style="border-width:0px">
                                {{-- <img src="{{url('/imagini/logo_pdf.jpg')}}" alt="Logo PDF" width="100px"/> --}}
                                <img src="{{ asset('imagini/logo.png') }}" width="200px">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" style="border-width:0px; text-align:center">
                                <h2 style="text-align: center; margin-bottom: 0px;">
                                    REFERAT MEDICAL
                                </h2>
                                {{ $referat_medical->numar_inregistrare }}
                                /
                                {{ $referat_medical->programare->data ? \Carbon\Carbon::parse($referat_medical->programare->data)->isoFormat('DD.MM.YYYY') : '' }}
                            </td>
                        </tr>
                    </table>

                    <br><br>

                    <p>Privind pe dl/dna <b>{{ $referat_medical->programare->nume ?? '' }}</b>,
                        CNP {{ $referat_medical->cnp }},
                        cu domiciliul în {{ $referat_medical->adresa }}.
                    </p>

                    <p><b>Diagnostic clinic</b>:
                        <br>
                        {!! nl2br($referat_medical->diagnostic_clinic) !!}
                    </p>

                    <p><b>Simptomatologie</b>:
                        <br>
                        {!! nl2br($referat_medical->simptomatologie) !!}
                    </p>

                    <p style="margin: 0px;"><b>Examen obiectiv detaliat</b>:
                        <b>Î</b>={{ $referat_medical->inaltime }} cm,
                        <b>G</b>={{ $referat_medical->greutate }} Kg,
                        <b>TA</b>={{ $referat_medical->ta }} mmHg,
                        <b>AV</b>={{ $referat_medical->av }} b/min
                        <br>
                        {!! nl2br($referat_medical->examen_obiectiv_detaliat) !!}
                    </p>

                    <p><b>Investigații clinice, paraclinice</b>:
                        <br>
                        {!! nl2br($referat_medical->investigatii_clinice_paraclinice) !!}
                    </p>

                    <p><b>Tratamente urmate</b>:
                        <br>
                        {!! nl2br($referat_medical->tratamente_urmate) !!}
                    </p>

                    <div style="page-break-inside: avoid;">
                        <p style="margin: 0px;"><b>Observații</b>:
                        <br>
                        {!! nl2br($referat_medical->observatii) !!}
                        </p>

                        <br><br>

                        <table style="">
                            <tr>
                                <td style="border-width:0px; width: 500px;">
                                    Data
                                    <br>
                                    {{ $referat_medical->programare->data ? \Carbon\Carbon::parse($referat_medical->programare->data)->isoFormat('DD.MM.YYYY') : '' }}
                                </td>
                                <td style="border-width:0px;">
                                    Dr. Hanţa Crina Mihaela
                                    <br>
                                    Medic Specialist cardiolog
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

                {{-- <br><br><br><br> --}}



                {{-- Here's the magic. This MUST be inside body tag. Page count / total, centered at bottom of page --}}
                <script type="text/php">
                    if (isset($pdf)) {
                        $text = "Pagina {PAGE_NUM} / {PAGE_COUNT}";
                        $size = 10;
                        $font = $fontMetrics->getFont("DejaVu Sans");
                        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                        $x = ($pdf->get_width() - $width) / 2;
                        $y = $pdf->get_height() - 35;
                        $pdf->page_text($x, $y, $text, $font, $size);
                    }
                </script>


            </div>




</body>

</html>
