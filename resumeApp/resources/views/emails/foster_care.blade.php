@extends('layouts.email')

@section('content')
    <div class="greeting">Hello!</div>
    <hr>
    <div class="mailText">
        A new form submission from 123Workforce temp form, <br><br/>
        Name : {{$fullName}}<br/>
        Address : {{$address}}<br/>
        Date of Birth : {{$date}}<br/>
        Email : {{$email}}<br/>
        Mobile : {{$mobile}}<br/>
        Relationship Status : {{$relationStatus}}<br/>
        Age of Children : {{$ageOfChild}}<br/>
        Notes : {{$notes}}<br/>
        Do you have a spare room? : {{isset($submitNote1) ? 'YES' : 'NO'}}<br/>
        Please note that we can't accept applications from those that have children that are younger than school going age.. Please tick to confirm that your own children are all of school going age or older or If you don't have any children of your own please also tick this box
        : {{isset($submitNote2) ? 'YES' : 'NO'}}<br/>

    </div>
@endsection

