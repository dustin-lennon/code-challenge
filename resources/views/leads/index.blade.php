@extends ('layouts.master')

@section ('content')
<div class="container">
    <div class="table-responsive">
    @if (! Auth::check())
        <table class="table">
            <thead>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Phone Number</th>
            </thead>
            <tbody>
                @foreach($leads as $lead)
                    <tr>
                        <td>{{ $lead->fname }}</td>
                        <td>{{ $lead->lname }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->postal_code }}</td>
                        <td>{{ $lead->phone_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <table class="table">
            <thead>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Delete</th>
            </thead>
            <tbody>
                @foreach($leads as $lead)
                    <tr>
                        <td>{{ $lead->fname }}</td>
                        <td>{{ $lead->lname }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->postal_code }}</td>
                        <td>{{ $lead->phone_number }}</td>
                        <td><form method="POST" action="/leads/{{ $lead->lead_id }}" class="form-inline">@method('DELETE')@csrf<input type="hidden" name="lead_id" value="{{ $lead->lead_id }}" /><button class="btn btn-danger" type"submit"><i class="fas fa-trash-alt"></i></button></form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>

    @include('layouts.footer')
</div>
@endsection
