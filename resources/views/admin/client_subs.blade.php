@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
            <th scope="col" class="">Subscription ID</th>
            <th scope="col" class="">Subscription type</th>
            <th scope="col" class="">Payer stripe email</th>
            <th scope="col" class="">action</th>
        </tr>
        </thead>
        <tbody>
            <? $i=1;?>
            <? foreach ($subs as $sub):?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$sub->price}}</td>
                <td>{{$sub->payment_status}}</td>
                <td>{{$sub->subscription_id}}</td>
                <td>{{$sub->subscription_type}}</td>
                <td>{{$sub->payer_email}}</td>
                <td class="">
                    <form action="{{route('create.usage.report')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="quantity" value="10">
                        <input type="hidden" name="subscription_id" value="{{$sub->subscription_id}}">
                        <button type="submit" class="btn btn-dark">
                            Confirm {{$sub->hours}} hours and bill client.
                        </button>
                    </form>
                </td>
            </tr>
            <?$i++;?>
            <? endforeach;?>
        </tbody>
    </table>

@endsection