@extends('layouts.app')

@section('content')

    @include('admin.includes.messages')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client email</th>
            <th scope="col">Amount paid</th>
            <th scope="col">Hours / weeks</th>
            <th scope="col">Booked Freelancer</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <?
                    $clientName = 'Visitor' ;
                    $freelancerName = 'Not assigned' ;
                    if($booking->client_id){
                        $clientName = App\Client::where('id',$booking->client_id)->first()->name ;
                    }
                    if($booking->user_id){
                        $freelancer     = App\User::where('id',$booking->user_id)->first();
                        $freelancerName = $freelancer->firstName .' '. $freelancer->lastName ;
                    }
                    ?>
                </th>
                <td scope="row">{{$clientName}}</td>
                <td scope="row">
                    @if($booking->payment_method == 'PayPal')
                        {{$booking->amount_paid}} USD
                    @else
                        {{$booking->amount_paid/100}} USD
                    @endif
                </td>
                <td scope="row">{{$booking->hours}} / {{$booking->weeks}}</td>
                <td scope="row">{{$freelancerName}}</td>
                <td scope="row">
                    @if($booking->canceled)
                        <span class="panelFormLabel">Finished</span>
                    @else
                        <span class="panelFormLabel" style="color: lightgreen;">On going</span>
                    @endif
                    <div>
                        @if($booking->payment_method == 'PayPal')
                            @if($booking->is_paid) Paid @else Unpaid @endif
                        @else
                            Paid
                        @endif
                    </div>
                </td>
                <td scope="row">
                    {{$booking->created_at->format('M d, Y') }}
                </td>
        </tr>
        </tbody>
    </table>
    </div>

@endsection