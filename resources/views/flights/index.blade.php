@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Flight Bookings</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('flights.booking') }}">Book a Flight</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Ticket ID</th>
                <th>Flight ID</th>
                <th>Flight Destination</th>
                <th>Ticket Cost</th>
                <th width="300px">Action</th>
            </tr>
            @foreach ($flights as $flight)
                <tr>
                    <td>{{ $flight->id }}</td>
                    <td>{{ $flight->ticket_id }}</td>
                    <td>{{ $flight->flight_id }}</td>
                    <td>{{ $flight->flight_destination}}</td>
                    <td>{{ $flight->ticket_cost }}</td>
                    <td>
                        <form action="{{ route('flights.destroy', $flight->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $flights->links() !!}
    @endsection
