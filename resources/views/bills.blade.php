@extends('layout.dashboard')

@push('styles')
<!--Bootstrap-daterangepicker css-->
<link rel="stylesheet" href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}">
@endpush

@section('content')
<div class="app-content">
    <section class="section">

        <!--page-header open-->
        @include('include.breadcrum')
        <!--page-header closed-->

        <!--row open-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Bills</h4>
                        <span class="table-add float-right">
                            <a href="{{route('bill.create')}}" class="btn btn-icon"><i class="fa fa-plus fa-1x"
                                    aria-hidden="true"></i></a>
                        </span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bill.index')}}" method="GET">
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Filter</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="text" placeholder="Name" name="name"
                                        class="form-control form-control-sm" value="{{request()->name}}">
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" placeholder="Date Range" name="date_range"
                                        class="form-control form-control-sm" value="{{request()->date_range}}"
                                        id="daterange">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <input type="text" placeholder="Price" name="price" value="{{request()->price}}"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-1 form-group">
                                    <select name="price_comp" id="" class="form-control form-control-sm">
                                        <option value="=" {{request()->price_comp == '=' ? 'selected' : ''}}> =
                                        </option>
                                        <option value="<" {{request()->price_comp == '<' ? 'selected' : ''}}>
                                            < </option> <option value=">"
                                                {{request()->price_comp == '>' ? 'selected' : ''}}> >
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <select name="is_gst" id="" class="form-control form-control-sm">
                                        <option value=""> Gst / Non Gst </option>
                                        <option value="0" {{request()->is_gst == '0' ? 'selected' : ''}}> non gst
                                        </option>
                                        <option value="1" {{request()->is_gst == '1' ? 'selected' : ''}}> gst </option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                </div>
                            </div>

                        </form>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered border-t0 text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">Customer</th>
                                        <th class="wd-20p">Service</th>
                                        <th class="wd-20p">Service Time</th>
                                        <th class="wd-20p">Price</th>
                                        <th class="wd-20p">Gst/Non Gst</th>
                                        <th class="wd-15p">Created At</th>
                                        <th class="wd-10p">Updated At</th>
                                        <th class="wd-25p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bills as $bill)
                                    <tr>
                                        <td>{{$bill->user->name}}</td>
                                        <td>{{$bill->service->name}}</td>
                                        <td>{{$bill->service_time }} {{$bill->service_time > 1 ? 'hours' : 'hour'}}
                                        </td>
                                        <td>{{$bill->price}}</td>
                                        <td class="text-center">
                                            @if ($bill->is_gst)
                                            <span class="badge badge-primary">Gst</span>
                                            @else
                                            <span class="badge badge-info">Non Gst</span>
                                            @endif
                                        </td>
                                        <td>{{$bill->created_at->format('d/m/Y')}}</td>
                                        <td>{{$bill->updated_at->format('d/m/Y')}}</td>
                                        <td>
                                            <form class="delete-form" method="POST"
                                                action="{{route('bill.destroy', $bill->id)}}">
                                                @csrf
                                                @method('delete')
                                                <a href="{{route('bill.edit', $bill->id)}}"
                                                    class="btn btn-action btn-info"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i></a>
                                                <button class="btn btn-action btn-danger delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                                <a href="{{route('bill.print', $bill->id)}}"
                                                    class="btn btn-action btn-primary"><i class="fa fa-print"
                                                        aria-hidden="true"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--row closed-->
    </section>
</div>
@endsection


@push('scripts')

<!--DataTables js-->
<script src="{{asset('plugins/Datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/Datatable/js/buttons.colVis.min.js')}}"></script>

<script>
    $('#example').DataTable();
</script>


<script>
    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        var _this = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                _this.closest('form').submit();
            }
        })
    })
</script>

<!--Moment js-->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>

<!--Bootstrap-daterangepicker js-->
<script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script>
    $(function() {

        $('#daterange').daterangepicker({
            autoUpdateInput: false,
            autoApply: true,
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            }
        });

        $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });

        $('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });
</script>

@endpush
