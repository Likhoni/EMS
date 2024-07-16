@extends('frontend.master')
@section('content')
<div style="padding-top: 150px; padding-right:30px; padding-left:30px; padding-bottom:30px;">
    <h5>Your Appointment Details</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date(mm/dd/yy)</th>
                <th scope="col">Time</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointmentDetails as $key => $data)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ \Carbon\Carbon::parse($data->date)->format('m/d/y') }}</td>
                <td>{{ $data->time }}</td>
                <td>
                    @if($data->status == 'Cancelled')
                    Cancelled
                    @endif
                </td>
                <td>
                    @if($data->status != 'Cancelled')
                    <a class="btn-sm btn-danger" href="{{ route('cancel.appointment', $data->id) }}">Cancel Appointment</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$appointmentDetails->links()}}
</div>
@endsection
