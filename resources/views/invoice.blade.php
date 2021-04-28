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

            <td align="left">
                <h3>P M Heavy Earth</h3>
                <p style="margin-bottom: 2px;line-height: 1.1;">Company representative name</p>
                <p style="margin-bottom: 2px;line-height: 1.1;">Uttar Para, Mirjapur Sankrail Howrah - 711302</p>
                <p style="margin-bottom: 2px;line-height: 1.1;">Mobile - 9674210051, 9831342466</p>
                <p style="margin-bottom: 2px;line-height: 1.1;">Email - pmheavyearth@gmail.com</p>
                <p style="margin-bottom: 2px;line-height: 1.1;">Website - www.pmheavyearth.com</p>
                @if ($bill->is_gst)
                <p style="margin-bottom: 2px;line-height: 1.1;"><b>Gstn - 19BAJPM6276LIZX</b></p>
                @endif
            </td>
            <td valign="top" align="right">
                {{-- <img src="{{asset('images/meteor-logo.png')}}" alt="" width="150" /> --}}
                <h3>Invoice No {{$bill->id}}</h3>
                <p>Dated - {{$bill->created_at->format('d/m/Y')}}</p>
                <p>Due Dated - 23-06-2019</p>
                <p>Purches Order No - {{$bill->id}}</p>
                <p>Purches Order Date - {{$bill->created_at->format('d/m/Y')}}</p>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>

            <td align="left">
                <h3>Bill To</h3>
                <p style="">{{ucwords(strtolower($bill->user->name))}}</p>
                <p style="">{{$bill->user->address}}</p>
                @if ($bill->is_gst)
                <p style=""><b>Gstn - {{$bill->user->gstn}}</b></p>
                @endif
            </td>
            <td valign="top" align="right">
                {{-- <img src="{{asset('images/meteor-logo.png')}}" alt="" width="150" /> --}}
                <h3>Ship To</h3>
                <p>{{$bill->user->shipping_address}}</p>
            </td>
        </tr>

    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Description</th>
                {{-- <th>HSN/SAF</th> --}}
                <th>Quantity</th>
                <th>UOM</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <th scope="row">1</th>
                <td>
                    <p>JCB Machine Charges</p>
                    <p>On Date : 02-05-2016 to 20-05-2016</p>
                    <p>Diiver Fooding Charges</p>
                </td>
                <td align="right">997313</td>
                <td align="right">59:45:00</td>
                <td align="right">Hours</td>
                <td align="right">725</td>
                <td align="right">83318</td>
            </tr> --}}

            @php $subtotal=0; @endphp
            @foreach ($bill->service_id as $key => $service)
            <tr>
                <th scope="row">1</th>
                <td>
                    {{App\Service::find($service)->name}}
                    <p>On Date :
                        {{$bill->service_date[$key]['start_date'] .'-'. $bill->service_date[$key]['end_date'] }}
                    </p>
                </td>
                <td align="right">{{$bill->service_time[$key]}}</td>
                <td align="right">{{App\Service::find($service)->service_time_uom}}</td>
                <td align="right">{{$bill->service->cost}} /{{$bill->service->service_time}}
                    {{$bill->service->service_time > 1 ? 'hour' : 'hours'}}
                </td>
                <td align="right">
                    {{$cost = $bill->service_time[$key] * $bill->service->cost / $bill->service->service_time}}
                    @php $subtotal += $cost; @endphp
                </td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="4"></td>
                <td align="right">Subtotal Rs</td>
                <td align="right">
                    {{$subtotal}}
                </td>
            </tr>
            @if ($bill->is_gst)
            <tr>
                <td colspan="4"></td>
                <td align="right">Gst 28% Rs</td>
                <td align="right">{{$gst_price = ($subtotal) * 28 /100}}</td>
            </tr>
            @endif

            @php
            $total = $subtotal + $gst_price
            @endphp

            @if ($total > $bill->price)
            <tr>
                <td colspan="4"></td>
                <td align="right">Discount Rs</td>
                <td align="right"> - {{$total - $bill->price }}</td>
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
