<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aloha!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            text-align: center;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #000;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 3px;
        }
    </style>

</head>

<body>

    <table width="100%">
        <thead>
            <tr>
                <th style="text-transform: uppercase;font-size:11px;" colspan="5">Log-Sheet</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="text-transform: uppercase;font-size: 18px;" colspan="5">PM Heavy Earth</th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td colspan="5">All type of Heavy Earth Equipment.All type of Heavy Earth Equipment.</td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td colspan="5">Uttarpara , Mirzapur , Sakhrail , Howrah - 700302 <br />
                    Contact No : 9674210051 , 9831342466 . Email : pmheavyearth@gmail.com
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Company Name</td>
                <td colspan="2">{{$bill->user->name}}</td>
                <td>Invoice No</td>
                <td>{{$bill->id .'-'. $bill->created_at->format('d/m/Y')}}</td>
            </tr>
        </tbody>
        {{-- <tbody>
            <tr>
                <td>Service</td>
                <td colspan="2">Hydra Crane Working Details</td>
                <td>Date</td>
                <td>20-21-25</td>
            </tr>
        </tbody> --}}
        <tbody>
            <tr>
                <td style="font-weight: bold;">Date</td>
                <td style="font-weight: bold;">Time-In</td>
                <td style="font-weight: bold;">Time-Out</td>
                <td style="font-weight: bold;">Lunch Time</td>
                {{-- <td style="font-weight: bold;">Day</td> --}}
                <td style="font-weight: bold;">Total Time</td>
            </tr>
        </tbody>
        <tbody>
            @foreach ($bill->bill_logs as $log)
            <tr>
                <td>{{$log->date}}</td>
                <td>{{$log->time_in}}</td>
                <td>{{$log->time_out}}</td>
                <td>{{$log->lunch_time}}</td>
                {{-- <td>{{$log->day}}</td> --}}
                <td>{{$log->total_time}}</td>
            </tr>
            @endforeach
        </tbody>


        {{-- <tbody>
            <tr>
                <td>--</td>
                <td colspan="3" style="text-transform: uppercase; font-weight: bold;">Total Working Time</td>
                <td>37.30hrs</td>
            </tr>
        </tbody> --}}

    </table>

</body>

</html>
