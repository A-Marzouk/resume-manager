@extends('layouts.client-app')

@section('content')
        <? // check developer or designer :
            $freelancer = $user1;
            if(!isset($value['id'])){
                $value['id'] = '';
            }
        ?>

        <div class="container">
            <? $profit = 5 ;?>
                <div class="marginMobile-0">
                    <div class="freelancerCard" style="margin-bottom: -3px;">
                        <div class="row actionRow">
                            <div class="importBtn importBtn_upload NoDecor">
                                <a href="javascript:void(0)" id="{{$freelancer->id}}{{$value['id']}}_open_references" style="outline: none;" class="openReferences">
                                    References / Testimonials
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @include('freelancer_card')
        </div>

@endsection