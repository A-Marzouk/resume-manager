@extends('layouts.client-app')

@section('content')
        <?
            $freelancer = $user1;
            if(!isset($value['id'])){
                $value['id'] = '';
            }
        ?>

        <div class="container">
            <? $profit = 5 ;?>
            @include('custom_resume.freelancer_card_custom')
        </div>

@endsection