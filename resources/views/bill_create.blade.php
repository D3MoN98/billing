@extends('layout.dashboard')

@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/select2.css')}}">
<link rel="stylesheet" href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}">
@endpush

@section('content')


<div class="app-content">
    <section class="section">

        <!--page-header open-->
        @include('include.breadcrum')
        <!--page-header closed-->

        <form action="{{route('bill.store')}}" class="needs-validation" method="post" novalidate>
            @csrf
            <!--row open-->
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Bill</h4>
                        </div>
                        <div class="card-body">


                            <div class="form-row">


                                <div class="form-group col-12">
                                    <label>Gst/Non Gst*</label>
                                    <select class="form-control" name="is_gst" id="is_gst">
                                        <option value="1" selected>Gst</option>
                                        <option value="0">Non Gst</option>
                                    </select>

                                    @error('is_gst')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Gst/Non Gst is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>Customer/Company*</label>
                                    <select class="form-control customer-select" name="user_id" id="" required>
                                        <option value="">Select a customer/company</option>
                                        @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">
                                            {{$customer->name . ' - ' . ucwords(strtolower($customer->roles()->first()->name))}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Customer/Company is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 new-user">
                                    <label>New Customer/Company*</label>
                                    <select class="form-control" name="role" id="">
                                        <option value="company">Company</option>
                                        <option value="customer">customer</option>
                                    </select>
                                </div>

                                <div class="form-group col-12 new-user">
                                    <label>Email*</label>
                                    <input type="email" class="form-control" name="user[email]">
                                    <div class="invalid-feedback">
                                        Email is required
                                    </div>
                                </div>

                                <div class="form-group col-12 new-user">
                                    <label>Contact No*</label>
                                    <input type="tel" class="form-control"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        maxlength="10" name="user[contact_no]">
                                    <div class="invalid-feedback">
                                        Contact is required
                                    </div>
                                </div>

                                <div class="form-group col-12 new-user">
                                    <label>Address*</label>
                                    <input type="address" class="form-control" name="user[address]">
                                    <div class="invalid-feedback">
                                        Address is required
                                    </div>
                                </div>

                                <div class="form-group col-12 new-user">
                                    <label>Shipping Address*</label>
                                    <input type="address" class="form-control" name="user[shipping_address]">
                                    <div class="invalid-feedback">
                                        Shipping Address is required
                                    </div>
                                </div>

                                <div class="form-group col-4 service-otr">
                                    <label>Service*</label>
                                    <select class="form-control select2 service-select" name="service_id[]" id=""
                                        required>
                                        <option value="">Select a service</option>
                                        @foreach ($services as $service)
                                        <option data-cost="{{$service->cost}}"
                                            data-service_time="{{$service->service_time}}" value="{{$service->id}}">
                                            {{$service->name}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('service_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Service is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-4 service-date-otr">
                                    <label>Service Date*</label>

                                    <input type="text" name="service_date[]" class="form-control daterange">

                                    @error('service_date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Service date is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-4 service-time-otr">
                                    <label>Service Time By hour*</label>
                                    <input type="number" min="1"
                                        class="form-control service-time-input @error('service_time') is-invalid @enderror"
                                        name="service_time[]" value="{{old('service_time') ?? 1}}" required>

                                    @error('service_time')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Service Time is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 text-right">
                                    <button type="button" class="btn btn-primary add-service">Add Service</button>
                                </div>

                                <div class="form-group col-12">
                                    <label>Price*</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        maxlength="10" name="price" value="{{old('price')}}" required>

                                    @error('price')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Price is required
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            {{-- <button type="submit" class="btn btn-primary">Create</button> --}}

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bill Log</h4>
                        </div>
                        <div class="card-body">

                            <button type="button" class="btn btn-primary add_row">Add Row</button>

                            <div id="table" class="table-responsive table-editable">
                                <table
                                    class="table table-bordered table-responsive-md table-striped text-center my-4 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Time In</th>
                                            <th class="text-center">Time Out</th>
                                            <th class="text-center">Lunch Time</th>
                                            <th class="text-center">Day</th>
                                            <th class="text-center">Total Time</th>
                                            <th class="text-center">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td contenteditable="true">
                                                15-04-2021Aurelia Vega
                                                <input type="hidden" name="log[date][]" value="15-04-2021Aurelia Vega">
                                            </td>
                                            <td contenteditable="true">
                                                10.20
                                                <input type="hidden" name="log[time_in][]" value="10.20">
                                            </td>
                                            <td contenteditable="true">
                                                1.30
                                                <input type="hidden" name="log[time_out][]" value="1.30">
                                            </td>
                                            <td contenteditable="true">
                                                <input type="hidden" name="log[lunch_time][]" value="">
                                            </td>
                                            <td contenteditable="true">
                                                1
                                                <input type="hidden" name="log[day][]" value="1">
                                            </td>
                                            <td contenteditable="true">
                                                20Hour
                                                <input type="hidden" name="log[total_time][]" value="20Hour">
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger remove_row">Remove</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--row close-->

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </section>
</div>

@endsection

@push('scripts')
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<!--Bootstrap-daterangepicker js-->
<script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<!--Select2 js-->
<script src="{{asset('plugins/select2/select2.full.js')}}"></script>
<script>
    $('.customer-select').select2({
        tags: true,
    });

    // $('.service-select').select2({
    //     placeholder: 'Select services'
    // });
</script>

<script>
    $(document).on('change', '#is_gst', function(){
        piceChange()
    });

    $(document).on('change', '.service-select', function(){
        piceChange()
    });

    $(document).on('change', '.service-time-input', function(){
        piceChange()
    });

    $('.new-user').hide();

    $(document).on('click', '.add-service', function(){
        var service = $(this).val();

        var service_ele = $('.service-otr').first().clone();
        var service_date_ele = $('.service-date-otr').first().clone();
        service_date_ele.find('.daterange').daterangepicker({
            autoUpdateInput: false,
            autoApply: true,
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            }
        });

        service_date_ele.find('.daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            var days = picker.endDate.diff(picker.startDate, 'days') + 1;
            $(this).closest('.service-date-otr').next().find('.service-time-input').val(days * 12).change();
        });

        service_date_ele.find('.daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        var service_time_ele = $('.service-time-otr').first().clone();

        $('.service-time-otr').last().after(service_ele.add(service_date_ele).add(service_time_ele));
    });


    $(document).on('change', '.customer-select', function(){
        var user = $(this).val();

        if(isNaN(user)){
            $('.new-user').show();
            $('.new-user').find('.form-control').attr("required", "");
        } else {
            $('.new-user').hide();
            $('.new-user').find('.form-control').removeAttr("required");
        }
    });

    function piceChange() {
        var price = 0;

        $('.service-select').each(function(i, item) {
            var _this = $(item).find(':selected');
            var cost = _this.data('cost');
            var service_time = _this.data('service_time');
            var total_service_time = parseInt($('.service-time-input').eq(i).val());

            price += parseInt((total_service_time * cost)/service_time);
        })

        var gst = $('#is_gst').val();
        if (gst == 1) {
            price += (price * 28) / 100;
        }

        $('input[name="price"]').val(price);
    }
</script>

<script>
    $(document).on('click', '.add_row', function(){
        var tr = $('tbody > tr').first().clone();
        $('tbody').append(tr);
    })

     $(document).on('click', '.remove_row', function(){
        $(this).closest('tr').remove();
    })

    $(document).on('keyup', 'td[contenteditable="true"]', function() {
        var value = $(this).text();
        $(this).find('input').val(value);
    })

</script>

<script>
    $(function() {
        // $(document).on('focus',".daterange", function(){
        //     $(this).datepicker();
        // });

        $('.daterange').daterangepicker({
            autoUpdateInput: false,
            autoApply: true,
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            }
        });

        $('.daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            var days = picker.endDate.diff(picker.startDate, 'days') + 1;

            $(this).closest('.service-date-otr').next().find('.service-time-input').val(days * 12).change();
        });

        $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });
</script>


@endpush
