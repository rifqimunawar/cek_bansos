<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <style type="text/css">
        /* Styling for normal view */
        .print-preview {
            display: none;
        }

        /* Styling specifically for print preview */
        @media print {
            body {
                font-size: 12pt;
            }

            .no-print {
                display: none;
            }

            .print-preview {
                display: block;
            }
        }

        fieldset {
            border: 0px solid #ddd !important;
            margin: 0;
            xmin-width: 0;
            padding: 10px;
            position: relative;
            border-radius: 4px;
            background-color: #f5f5f5;
            padding-left: 10px !important;
        }

        legend {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0px;
            width: 35%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 5px 5px 10px;
            background-color: #ffffff;
        }

            {
            box-sizing: border-box;
        }

        .header {
            border: 1px solid gray;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        tr,
        td:not(.header_text) {
            text-align: justify;
            vertical-align: top;
        }

        .table_td {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            border-left: 1px solid gray;
            border-right: 1px solid gray;
        }

        input[type="checkbox"][readonly] {
            pointer-events: none;
        }

        tr,
        td {
            padding-left: 5px;
            padding-right: 5px;
        }

        td,
        tr,
        div {
            font-family: calibri;
        }

        /* } */
    </style>
</head>

<body>
    <div class="card-body">
        <div class="box-border">
            <fieldset>
                <div class="row">
                    <!-- HEADER -->

                    @include('settings::layouts.kopSurat')

                    <table border="0" style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                        <tr style="text-align: center;">
                            <td style="font-size: 16px; padding: 5px; text-align: center;">
                                <p style="margin: 5px 0 0; font-weight: bold; font-size:18px">{{ $title }}</p>
                            </td>
                        </tr>
                    </table>


                    <!-- ISI KONTEN -->
                    <table style="width: 100%; border-collapse: collapse; margin-top:1rem">
                        <thead class="table_td">
                            <tr>
                                <th width="5%">Nomor</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table_td">
                            @foreach ($data as $item)
                                <tr>
                                    <td width="1%">{{ $loop->iteration }}</td>
                                    <td>{{ $item->role_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <!-- TTD -->
                    {{-- <table width="100%" style="margin-top: 1rem;">
                        <tr>
                            <td width="50%">
                            </td>
                            <td width="50%">
                                <table width="100%" border="0"
                                    style="text-align: center; border-collapse: collapse;">
                                    <tr>
                                        <td style="border: 1px solid gray; padding: 0; text-align: center; ">Penerima
                                        </td>
                                        <td style="border: 1px solid gray; padding: 0; text-align: center; ">TU Keuangan
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid gray; padding: 20px 0;">&emsp;</td>
                                        <td style="border: 1px solid gray; padding: 20px 0;">&emsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid gray; padding: 0;"></td>
                                        <td style="border: 1px solid gray; padding: 0; text-align: center; ">
                                            @if (isset($data->users) && !empty($data->users))
                                                ({{ $data->users->name }} )
                                            @else
                                                Nama pengguna tidak tersedia
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table> --}}

                </div>
            </fieldset>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
