@extends('layout.dashboard')

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
                        <h4>Services</h4>
                        <span class="table-add float-right">
                            <a href="{{route('service.create')}}" class="btn btn-icon"><i class="fa fa-plus fa-1x"
                                    aria-hidden="true"></i></a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered border-t0 text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Name</th>
                                        <th class="wd-20p">Service Time</th>
                                        <th class="wd-20p">Cost</th>
                                        <th class="wd-15p">Created At</th>
                                        <th class="wd-25p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1
                                    @endphp
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>
                                            {{$i}}
                                            @php
                                            $i++
                                            @endphp
                                        </td>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->service_time . ' by ' . $service->service_time_uom }}</td>
                                        <td>{{$service->cost}}</td>
                                        <td>{{$service->created_at->format('d/m/Y')}}</td>
                                        <td>
                                            <form class="delete-form" method="POST"
                                                action="{{route('service.destroy', $service->id)}}">
                                                @csrf
                                                @method('delete')
                                                <a href="{{route('service.edit', $service->id)}}"
                                                    class="btn btn-action btn-info"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i> Edit</a>
                                                <button class="btn btn-action btn-danger delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i> Delete</button>
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

@endpush
