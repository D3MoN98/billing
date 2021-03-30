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
                        <h4>Create Service</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('service.store')}}" class="needs-validation" method="post" novalidate>
                            @csrf

                            <div class="form-group">
                                <label>Name*</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    value="{{old('name')}}" required>

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
                                <label>Service Time By hour*</label>
                                <input type="number" min="1"
                                    class="form-control @error('service_time') is-invalid @enderror" name="service_time"
                                    value="{{old('service_time')}}" required>

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
                                <label>Cost*</label>
                                <input type="text" class="form-control @error('cost') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="10" name="cost" value="{{old('cost')}}" required>

                                @error('cost')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @else
                                <div class="invalid-feedback">
                                    Cost is required
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
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


@endpush
