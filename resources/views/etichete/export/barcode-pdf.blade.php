<!DOCTYPE  html>
<html lang="ro">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Barcode</title>
    <style>
        html {
            margin: 0px 0px 0px 0px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            /* font-family: Arial, Helvetica, sans-serif; */
            font-size: 7px;
            margin: 0px;
        }

        * {
            /* padding: 0; */
            text-indent: 0;
        }

        table{
            border-collapse:collapse;
            margin: 0px;
            padding: 0px;
            margin-top: 0px;
            border-style: solid;
            border-width: 0px;
            width: 100%;
            word-wrap:break-word;
        }

        th, td {
            padding: 0px 0px;
            border-width: 0px;
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
    {{-- <div style="width:730px; height: 1030px; border-style: dashed ; border-width:2px; border-radius: 15px;"> --}}
    {{-- <div style="width:730px; height: 1030px; margin:10px 40px;"> --}}
    {{-- <div style="
        width:320px;
        margin:0px 0px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        "> --}}
        {{-- <table> --}}
            {{-- <tr> --}}
                {{-- @for ($i = 1; $i <= $cantitate; $i++) --}}
                    {{-- <td> --}}
                        {{-- <br><br><br><br><br> --}}
                        <div style="
                            width:170px;
                            padding:0px 0px 0px 0px;
                            margin:0px 0px;
                                -moz-border-radius: 0px;
                                -webkit-border-radius: 0px;
                                border-radius: 0px;
                        ">
                            {!!DNS1D::getBarcodeHTML($eticheta->cod_de_bare, 'C128',2.45 ,20)!!}
                            {{-- {!!DNS1D::getBarcodeHTML($produse->cod_de_bare, 'C39E', 1.95,55)!!} --}}
                            <div style="float:left; line-height:6px;">
                                Cod bare:<b>{{ $eticheta->cod_de_bare }}</b>
                                <br>
                                Op.:<b>{{ $eticheta->operator }}</b>
                            </div>
                            <div style="float:right; text-align:right; line-height:6px;">
                                Sterilizare:<b>{{ $eticheta->data ? \Carbon\Carbon::parse($eticheta->data)->isoFormat('DD.MM.YYYY') : '' }}</b>
                                <br>
                                Expirare:<b>{{ $eticheta->data ? \Carbon\Carbon::parse($eticheta->data)->addDays(60)->isoFormat('DD.MM.YYYY') : '' }} </b>
                            </div>
                        </div>
                        {{-- <br><br><br> --}}
                    {{-- </td> --}}

                    {{-- @if($i%2 == 0)
                        </tr>
                        <tr>
                    @endif
                @endfor --}}
            {{-- </tr> --}}
    {{-- </div> --}}
</body>
</html>
