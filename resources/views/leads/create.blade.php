@extends ('layouts.master')

@section ('content')
<div class="container">
    <div class="py-5 text-center">
        <h2>Lead Form</h2>
    </div>

    <div class="row">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Lead Information</h4>
            <form method="POST" action="/leads" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" name="fname" required>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lname" required>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>

            <div class="mb-3">
                <label for="telephone">Telephone Number</label>
                <input type="text" class="form-control" id="telephone" placeholder="8885551212" name="phone" required>
                <div class="invalid-feedback">
                    Please enter your telephone number.
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                <label for="zip">Postal Code</label>
                <input type="text" class="form-control" id="postal" name="postal" required>
                <div class="invalid-feedback">
                    Postal code required.
                </div>
                </div>
            </div>
            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit Lead</button>
            </form>

            @include ('layouts.errors')

            @include ('layouts.footer')
        </div>
    </div>
</div>
@endsection
