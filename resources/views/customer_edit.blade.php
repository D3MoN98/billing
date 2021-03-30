@extends('layout.dashboard')

@section('content')

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
                        <h4>Edit Customer</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('customer.update', $customer->id)}}" class="needs-validation"
                            method="post" novalidate>
                            @csrf

                            @method('put')

                            <div class="form-group">
                                <label>Name*</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    value="{{old('name') ?? $customer->name}}" required>

                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @else
                                <div class="invalid-feedback">
                                    Name is required
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email*</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{old('email') ?? $customer->email}}" required>

                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @else
                                <div class="invalid-feedback">
                                    Email is required
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Contact No*</label>
                                <input type="tel" class="form-control @error('contact_no') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="10" name="contact_no"
                                    value="{{old('contact_no') ??  $customer->contact_no}}" required>

                                @error('contact_no')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @else
                                <div class="invalid-feedback">
                                    Contact is required
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="address" class="form-control"
                                    value="{{old('address') ?? $customer->address }}" name="address">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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


@endpush
