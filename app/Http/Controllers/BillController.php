<?php

namespace App\Http\Controllers;

use App\Bill;
use App\RoleUser;
use App\Service;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use PDO;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bills = Bill::with('user');

        if (!is_null($request->name)) {
            $keyword = $request->name;
            $bills->whereHas('user', function (Builder $query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            });
        }

        if (!is_null($request->date_range)) {
            $date_range = explode('-', trim($request->date_range));
            $start = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date_range[0])));
            $end =  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date_range[1])));
            $bills->whereBetween('created_at', [$start, $end]);
        }


        if (!is_null($request->price)) {
            $price = $request->price;
            echo $price_comp = $request->price_comp;
            $bills->where('price', $price_comp, $price);
        }


        if (!is_null($request->is_gst)) {
            $is_gst = $request->is_gst;
            $bills->where('is_gst', $is_gst);
        }


        return view('bills')->with('bills', $bills->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'customer');
            }
        )->get();
        $services = Service::all();

        return view('bill_create')->with([
            'customers' => $customers,
            'services' => $services,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'service_time' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if (!is_numeric($request->user_id)) {
            $user_id = User::create($request->user)->id;
            RoleUser::create([
                'role_id' => $request->role == 'customer' ? 2 : 3,
                'user_id' => $user_id
            ]);
        } else {
            $user_id = $request->user_id;
        }

        $bill_id = Bill::create([
            'added_by' => Auth::id(),
            'user_id' => $user_id,
            'service_id' => $request->service_id,
            'service_time' => $request->service_time,
            'price' => $request->price,
            'is_gst' => $request->is_gst,
        ]);

        return redirect()->route('bill.edit', $bill_id)->withSuccess('Bill Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        $customers = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'customer');
            }
        )->get();
        $services = Service::all();

        return view('bill_edit')->with([
            'bill' => $bill,
            'customers' => $customers,
            'services' => $services,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::find($id);
        $customers = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'customer');
            }
        )->get();
        $services = Service::all();

        return view('bill_edit')->with([
            'bill' => $bill,
            'customers' => $customers,
            'services' => $services,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required',
            'service_time' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        Bill::find($id)->update([
            'service_id' => $request->service_id,
            'service_time' => $request->service_time,
            'price' => $request->price,
            'is_gst' => $request->is_gst,
        ]);


        return redirect()->route('bill.edit', $id)->withSuccess('Bill Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bill::destroy($id);
        return redirect()->back()->withSuccess('Bill deleted');
    }

    public function print($id)
    {
        $bill = Bill::find($id);

        $file = 'storage/invoice/' . uniqid() . '.pdf';

        $pdf = PDF::loadView('invoice', ['bill' => $bill]);
        Storage::put('public/' . $file, $pdf->output());

        if (file_exists($bill->invoice))
            unlink($bill->invoice);

        $bill->update([
            'invoice' => $file
        ]);

        return $pdf->download('invoice.pdf');
    }
}