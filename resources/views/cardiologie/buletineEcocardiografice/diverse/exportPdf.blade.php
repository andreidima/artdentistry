<!DOCTYPE html>
<html lang="ro">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Buletin ecocardiografic</title>
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
                                    BULETIN ECOCARDIOGRAFIC
                                </h2>
                            </td>
                        </tr>
                    </table>

                    <br><br>

                    <p style="margin-left: 10px">
                        NUME: <span style="font-size: 14px; font-weight:bold">{{ $programare->nume }}</span>
                        <br>
                        VARSTA: {{ $buletin_ecocardiografic->varsta }}
                    </p>

                    <br>
                    <br>

                    <table>
                        <tr>
                            <td style="vertical-align:top; border-width: 0px; width:330px">
                                <table style="border-width:1px">
                                    <tr>
                                        <td style="border-width:0px; width:100px;">
                                            DTDVS(mm)
                                        </td>
                                        <td style="width:80px;">
                                            {{ $buletin_ecocardiografic->dtdvs_1 }}
                                        </td>
                                        <td style="width:80px;">
                                            {{ $buletin_ecocardiografic->dtdvs_2 }}
                                        </td>
                                        <td style="border-width:0px; width:70px;">
                                            &#60;55mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            DTSVS(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->dtsvs_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->dtsvs_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            SIVd(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->sivd_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->sivd_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            5-13mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            SIVs(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->sivs_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->sivs_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            PPVSd(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ppvsd_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ppvsd_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            5-13mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            PPVSs(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ppvss_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ppvss_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            DSM(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->dsm_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->dsm_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            0-7mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            FS(%)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->fs_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->fs_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            25%
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            FE(%)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->fe_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->fe_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            60-70%
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            Fevol(%)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->fevol_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->fevol_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            VTDVS(ml)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->vtdvs_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->vtdvs_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            VTSVS(ml)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->vtsvs_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->vtsvs_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            AS(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->as_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->as_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            25-45mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            AD(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ad_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ad_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            25-45mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            DTDVD(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->dtdvd_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->dtdvd_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            &#60;30mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            PAVDd(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->pavdd_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->pavdd_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            &#60;5mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            VCI-cu colaps
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->vci_cu_colaps_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->vci_cu_colaps_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            RDAP(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->rdap_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->rdap_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            &#60;5mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            AP inel(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ap_inel_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ap_inel_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            Ao inel(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ao_inel_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ao_inel_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            Ao asc(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ao_asc_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ao_asc_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            &#60;45mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            Ao crosa(mm)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ao_crosa_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->ao_crosa_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            Desc. Cusp. AO
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->desc_cusp_ao_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->desc_cusp_ao_2 }}
                                        </td>
                                        <td style="border-width:0px">
                                            16-26mm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            unda E(m/sec)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->unda_e_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->unda_e_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            unda A(m/sec)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->unda_a_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->unda_a_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width:0px">
                                            E/A
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->e_a_1 }}
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->e_a_2 }}
                                        </td>
                                        <td style="border-width:0px">

                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="border-width: 0px;">
                            </td>
                            <td style="border-width: 0px; vertical-align:top; width:260px">
                                <table style="border-width: 1px">
                                    <tr>
                                        <td colspan="3">
                                            <b>
                                                VALVA MITRALA
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Inserție: {{ $buletin_ecocardiografic->valva_mitrala_insertie }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Aspect: {{ $buletin_ecocardiografic->valva_mitrala_aspect }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Mobilitate: {{ $buletin_ecocardiografic->valva_mitrala_mobilitate }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            &Delta;Pmax(mmHg)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_mitrala_dpmax }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            &Delta;Pmediu(mmHg)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_mitrala_dpmediu }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            Vmax(m/s)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_mitrala_vmax }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            SOM(cm<sup>2</sup>)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_mitrala_som }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            PHT(ms)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_mitrala_pht }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            SOM 2D(cm<sup>2</sup>)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_mitrala_som_2d }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="padding-top: 15px">
                                            <b>
                                                VALVA AORTICA
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Inserție: {{ $buletin_ecocardiografic->valva_aortica_insertie }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Aspect: {{ $buletin_ecocardiografic->valva_aortica_aspect }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Mobilitate: {{ $buletin_ecocardiografic->valva_aortica_mobilitate }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            &Delta;Pmax(mmHg)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_aortica_dpmax }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            &Delta;Pmediu(mmHg)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_aortica_dpmediu }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            Vmax(m/s)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_aortica_vmax }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            SOAcont(cm<sup>2</sup>)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_aortica_soacont }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="padding-top: 15px">
                                            <b>
                                                VALVA MITRALA
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Inserție: {{ $buletin_ecocardiografic->valva_tricuspida_insertie }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Aspect: {{ $buletin_ecocardiografic->valva_tricuspida_aspect }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Mobilitate: {{ $buletin_ecocardiografic->valva_tricuspida_mobilitate }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-width: 0px;">
                                            &Delta;Pmax(mmHg)
                                        </td>
                                        <td>
                                            {{ $buletin_ecocardiografic->valva_tricuspida_dpmax }}
                                        </td>
                                        <td style="border-width: 0px;">

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <br>
                    <br>
                    <br>

                    <table style="border-width:1px; width:100px; margin-left:10px;">
                        <tr>
                            <td style="border-width:0px; width:70px;">
                                IM(grad)
                            </td>
                            <td style="width:20px; text-align:center">
                                {{ $buletin_ecocardiografic->im }}
                            </td>
                            <td style="border-width:0px; width:40px; text-align:right">
                                I - IV
                            </td>
                        </tr>
                        <tr>
                            <td style="border-width:0px; width:70px;">
                                IA(grad)
                            </td>
                            <td style="width:20px; text-align:center">
                                {{ $buletin_ecocardiografic->ia }}
                            </td>
                            <td style="border-width:0px; width:40px; text-align:right">
                                I - IV
                            </td>
                        </tr>
                        <tr>
                            <td style="border-width:0px; width:70px;">
                                IP(grad)
                            </td>
                            <td style="width:20px; text-align:center">
                                {{ $buletin_ecocardiografic->ip }}
                            </td>
                            <td style="border-width:0px; width:40px; text-align:right">
                                I - IV
                            </td>
                        </tr>
                        <tr>
                            <td style="border-width:0px; width:70px;">
                                IT(grad)
                            </td>
                            <td style="width:20px; text-align:center">
                                {{ $buletin_ecocardiografic->it }}
                            </td>
                            <td style="border-width:0px; width:40px; text-align:right">
                                I - IV
                            </td>
                        </tr>
                    </table>

                    <br>
                    <br>
                    <br>

                    <table>
                        <tr>
                            <td style="border-width:0px; width: 70%">
                                Data
                                <br>
                                {{ $buletin_ecocardiografic->data ? \Carbon\Carbon::parse($buletin_ecocardiografic->data)->isoFormat('DD.MM.YYYY') : '' }}
                            </td>
                            <td style="border-width:0px;">
                                Dr. Hanţa Crina Mihaela
                                <br>
                                Medic Specialist cardiolog
                            </td>
                        </tr>
                    </table>

                    <div style="page-break-after:always"></div>

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
                    </table>

                    <br>
                    <br>

                    Concluzii:
                    <br>
                    <br>
                    <div style="padding:0px 10px; border: 1px black solid;">
                        {!! $buletin_ecocardiografic->concluzii !!}
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <table>
                        <tr>
                            <td style="border-width:0px; width: 70%">
                                Data
                                <br>
                                {{ $buletin_ecocardiografic->data ? \Carbon\Carbon::parse($buletin_ecocardiografic->data)->isoFormat('DD.MM.YYYY') : '' }}
                            </td>
                            <td style="border-width:0px;">
                                Dr. Hanţa Crina Mihaela
                                <br>
                                Medic Specialist cardiolog
                            </td>
                        </tr>
                    </table>

                </div>

                <br><br><br><br>



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
