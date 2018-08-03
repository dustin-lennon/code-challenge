@extends ('layouts.master')

@section ('content')
<form class="form-signin" method="POST" action="/login">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  @csrf
  <label for="inputEmail" class="sr-only">Username</label>
  <input type="text" id="inputEmail" class="form-control" name="email" placeholder="Email Address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  @include ('layouts.errors')
  @include ('layouts.footer')
</form>
@endsection
