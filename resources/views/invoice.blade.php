<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aloha!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
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
    </style>

</head>

<body>

    <table width="100%">
        <tr>
            <td valign="top" align="left">
                {{-- <img src="{{asset('images/meteor-logo.png')}}" alt="" width="150" /> --}}
                <h3>Invoice No {{$bill->id}}</h3>
                <pre>Dated - {{$bill->created_at->format('d/m/Y')}}
                </pre>
            </td>
            <td align="right">
                <h3>P M Heavy Earth</h3>
                <pre>
                Company representative name
                Uttar Para, Mirjapur Sankrail Howrah - 711302
                Mobile - 9674210051, 9831342466
                Email - pmheavyearth@gmail.com
                Website - www.pmheavyearth.com
                Gstn - 19BAJPM6276LIZX
                </pre>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>
            {{-- <td><strong>From:</strong> Linblum - Barrio teatral</td> --}}
            <td><strong>To:</strong>
                {{$bill->user->name}}
            </td>
        </tr>
        <tr>
            <td>
                {{$bill->user->address}}
            </td>
        </tr>

    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Service</th>
                <th>Quantity</th>
                <th>UOM</th>
                <th>Rate Rs</th>
                <th>Amount Rs</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{$bill->service->name}}</td>
                <td align="right">{{$bill->service->service_time}}</td>
                <td align="right">{{$bill->service->service_time_uom}}</td>
                <td align="right">{{$bill->service->cost}}</td>
                <td align="right">{{$bill->service_time * $bill->service->cost}}</td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="4"></td>
                <td align="right">Subtotal Rs</td>
                <td align="right">{{$bill->service_time * $bill->service->cost}}</td>
            </tr>
            @if ($bill->is_gst)
            <tr>
                <td colspan="4"></td>
                <td align="right">Gst 28% Rs</td>
                <td align="right">{{($bill->service_time * $bill->service->cost) * 28 /100}}</td>
            </tr>
            @endif
            <tr>
                <td colspan="4"></td>
                <td align="right">Total Rs</td>
                <td align="right" class="gray">Rs {{$bill->price}}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
