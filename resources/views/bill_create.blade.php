@extends('layout.dashboard')

@section('content')

<link rel="stylesheet" href="{{asset('plugins/select2/select2.css')}}">

<div class="app-content">
    <section class="section">

        <!--page-header open-->
        @include('include.breadcrum')
        <!--page-header closed-->


        <!--row open-->
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Bill</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bill.store')}}" class="needs-validation" method="post" novalidate>
                            @csrf

                            <div class="form-group">
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

                            <div class="form-group">
                                <label>Customer/Company*</label>
                                <select class="form-control customer-select" name="user_id" id="" required>
                                    <option value="">Select customer</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
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

                            <div class="form-group">
                                <label>Service*</label>
                                <select class="form-control select2 service-select" name="service_id" id="" required>
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

                            <div class="form-group">
                                <label>Service Time By hour*</label>
                                <input type="number" min="1"
                                    class="form-control @error('service_time') is-invalid @enderror" name="service_time"
                                    value="{{old('service_time') ?? 1}}" required>

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

                            <div class="form-group">
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

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--row close-->

    </section>
</div>

@endsection

@push('scripts')
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
        tags: true
    });

    $('.service-select').select2();
</script>

<script>
    $(document).on('change', '#is_gst', function(){
        piceChange()
    });

    $(document).on('change', '.service-select', function(){
        piceChange()
    });

    $(document).on('change', 'input[name="service_time"]', function(){
        piceChange()
    });

    function piceChange() {
        var _this = $('.service-select').find(':selected');
        var cost = _this.data('cost');
        var service_time = _this.data('service_time');
        var total_service_time = $('input[name="service_time"]').val();
        var gst = $('#is_gst').val();

        var price = parseInt((total_service_time * cost)/service_time);

        if (gst == 1) {
            price += (price * 28) / 100;
        }

        console.log(gst, price);

        $('input[name="price"]').val(price);
    }
</script>


@endpush
