@extends('freelancer.layouts.freelancer_frame')
{{-- variables : $data -> freelancer userdata  and $owners --}}
<?

$clientID = '865ff2s2qvpkzb' ;
$redirectURL = 'https://123workforce.com/freelancer/linkedin';
if(!isset($value['id'])){
    $value['id'] = '';
}

?>

@section('content')
    <div id="freelancerPortfolio" class="d-flex justify-content-center">
        <freelancer-portfolio :freelancer="{{$freelancer}}"></freelancer-portfolio>
    </div>
@endsection
