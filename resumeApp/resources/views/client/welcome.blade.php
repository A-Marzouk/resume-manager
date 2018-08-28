@extends('layouts.client-app')
@section('content')
    <? use Illuminate\Support\Facades\Auth;if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="container alert alert-success">
        You are viewing as Admin
    </div>
    <? endif;?>
   <div class="container">
       <!-- Success Messages  -->
       <div style="padding-top: 20px;">
           @if(session()->has('successMessage'))
               <div class="alert alert-success" id="successMessage">
                   {{ session()->get('successMessage') }}
               </div>
           @endif
       </div>

       <?
        $client = Auth::guard('client')->user();
       $searchesArr = [];
       ?>
       <h3 class="pageHeading text-left">Hello {{$client->name}} !</h3>
       <br>
        <? $searches = $client->searches; ?>

       @if( count($searches) > 0)
       <b class="pageSubHeading text-left" style="font-size: 14px;">Your saved searches :</b><br/><br/>
       <?
            $i =0;
          foreach ($searches as $search){
              if(empty(rtrim($search->freelancers_id,','))){
                 $searchDelete = \App\ClientSearch::where('id',$search->id);
                 $searchDelete->delete();
                 continue;
              }
              $searchesArr[$i]['name'] = $search->name;
              $searchesArr[$i]['id'] = $search->id;
              foreach (explode(',',$search->freelancers_id) as $id){
                  $searchesArr[$i]['freelancers'][] = \App\User::where('id',$id)->first();
              }
              $i++;
          }
       ?>

           <table class="table">
               <thead class="black white-text">
               <tr>
               </tr>
               </thead>
               <tbody>

                    @foreach($searchesArr as $key => $value)

                        <tr id="selectedSearch{{$value['id']}}">
                            <th scope="row">
                                <a class="panelFormLabel" data-toggle="collapse" href="#{{$value['id']}}" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-bottom: 10px;">
                                    <b>{{$value['name']}}</b>
                                </a>
                                <div class="collapse" id="{{$value['id']}}" style="padding-top: 10px; padding-bottom: 12px;">
                                    <div style="padding-top: 20px; margin-top: 60px;">
                                        <? $i = 0 ;?>
                                        @foreach($value['freelancers'] as $freelancer)
                                            <? $i++; ?>
                                                <div class="freelancerCard">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-12 freelancerCardLeft text-left">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-6 imageContainer">
                                                                <img src="{{$freelancer->userData->photo}}" alt="freelancer" class="freelancerImg" width="100" height="100">

                                                            </div>
                                                            <div class="col-lg-8 col-6 text-left">
                                                                <div class="nameCard">
                                                                    {{$freelancer->firstName}} {{$freelancer->lastName}}
                                                                </div>
                                                                <div class="jobTitle">
                                                                   {{$freelancer->userData->jobTitle}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 offset-lg-1 col-md-12 freelancerCardRight">
                                                        <div class="row interviewIcons" >
                                                            <div class="cardLabel_interviews col-md-6">Recorded interviews</div>
                                                            <div class="col-md-4" style="padding-left: 35px;">
                                                                <div class="cardIconsCon">
                                                                    <span style="border-right: 2px white solid; padding-right: 5px">
                                                                        <img src="/resumeApp/resources/views/customTheme/images/transcript.png" alt="" width="20px;">
                                                                    </span>
                                                                    <span style="padding-left: 5px;">
                                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#{{$freelancer->id}}_audio_modal" style="outline: none;">
                                                                            <img src="/resumeApp/resources/views/customTheme/images/mic.png" alt="" width="20px">
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="cardIconsCon2">
                                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#{{$freelancer->id}}_video_modal" style="outline: none;">
                                                                        <span style="padding: 5px;">
                                                                            <img src="/resumeApp/resources/views/customTheme/images/video.png" alt="" width="25px">
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr style="width: 95%;">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="cardLabel">Pricing:</div>
                                                        <div class="nameCard" style="padding-left: 0;">${{$freelancer->userData->salary +5}}/hour<br/>
                                                            ${{$freelancer->userData->salary_month}}/month
                                                        </div>
                                                        {{-- stripe goes here --}}
                                                        <form action="/stripe/payments/pay" method="POST">
                                                            {{ csrf_field() }}
                                                            <?
                                                            $userRate = $freelancer->userData->salary ;
                                                            $hours =10 ;
                                                            $amountToPay = ( intval($userRate) +5 ) * $hours * 100 ;
                                                            ?>
                                                            <input type="hidden" value="{{$amountToPay}}" name="amountToPay">
                                                            <input type="hidden" value="{{$freelancer->userData->name}}" name="freelancerName">
                                                            <script
                                                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                                    data-key="pk_test_8Pd2lN3so4z5vBOP98MgNcms"
                                                                    data-amount="{{$amountToPay}}"
                                                                    data-name="Hire  {{$freelancer->userData->name}}"
                                                                    data-description="for 10 hours"
                                                                    data-image="/resumeApp/resources/views/customTheme/images/newResume/logo.png"
                                                                    data-locale="auto">
                                                            </script>
                                                            <div class="buttonMain whiteBg">
                                                                <button class="hireBtn btn-block hire" style="width: 80%;" type="submit">Hire Me</button>
                                                            </div>
                                                        </form>
                                                        {{-- stripe ends here--}}
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <div class="cardLabel">Skills:</div>
                                                        <div class="skillsCard">
                                                                {{$freelancer->userData->design_skills_checkbox}}
                                                        </div><br/>
                                                        <div class="panelFormLabel" style="	color: #697786;">
                                                            <div class="cardLabel">No.hours/week available: </div>
                                                            <div style="font-weight: normal; padding-top: 5px;">
                                                                {{$freelancer->userData->availableHours}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 15px ; border-top:1px solid whitesmoke; ">
                                                    <div class="col-md-12 text-center" style="background-color: #FDFDFD;">
                                                        <div class="cardLabel_interviews" style="padding-bottom: 10px; height:52px;">
                                                           <span style="padding-right: 6px;">Read more </span> <img src="resumeApp/resources/views/customTheme/images/read_more.png" alt="read more arrow" width="11px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($i < count($value['freelancers']))
                                                <br>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </th>
                            <td>
                            </td>
                            <td>
                                <a class="btn panelFormLabel deleteSearch" id="{{$value['id']}}">
                                    x
                                </a>
                            </td>

                        </tr>

                        {{-- modals --}}
                            {{-- audio modal--}}
                            <div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="{{$freelancer->id}}_audio_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="padding-top: 20px;">
                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo" width="250">
                                    </div>
                                </div>
                                <div class="modal-dialog modal-lg" role="document" style="max-width: 400px;">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6" style="padding-left: 35px; padding-top: 15px;">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="cardIconsCon">
                                                                <span style="border-right: 2px white solid; padding-right: 5px">
                                                                    <img src="/resumeApp/resources/views/customTheme/images/transcript.png"
                                                                         alt="" width="20px;">
                                                                </span>
                                                                <span style="padding-left: 5px;">
                                                                    <img src="/resumeApp/resources/views/customTheme/images/mic.png"
                                                                         alt="" width="20px">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="modal-card-name">
                                                                {{$freelancer->firstName}}
                                                                {{$freelancer->lastName}}
                                                            </div>
                                                            <div class="modal-card-subName">
                                                                Audio
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                            $valid = true;
                                            $notValidText = 'NOT-VALID-LINK';
                                            if ($freelancer->userData->audio == $notValidText) {
                                                $valid = false;
                                            }
                                            $audioSrc = "";
                                            if(!empty(trim($freelancer->userData->audioFile))){
                                                $audioSrc = $freelancer->userData->audioFile;
                                            }else{
                                                if($valid){
                                                    $audioSrc = "https://drive.google.com/uc?export=download&id=".$freelancer->userData->audio."&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";
                                                }else{
                                                    $audioSrc = "" ;
                                                }
                                            }
                                            ?>
                                            <div class="row card-audio-con">
                                                <div class="col-md-6 offset-md-3 text-center">
                                                    <audio controls>
                                                        <source src="{{$audioSrc}}" type="audio/ogg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- video modal--}}
                            <div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="{{$freelancer->id}}_video_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="padding-top: 20px;">
                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo" width="250">
                                    </div>
                                </div>
                                <div class="modal-dialog modal-lg" role="document" style="max-width: 400px;">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6" style="padding-left: 35px; padding-top: 15px;">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="cardIconsCon2">
                                                                    <span style="padding: 5px;">
                                                                        <img src="/resumeApp/resources/views/customTheme/images/video.png" alt="" width="25px">
                                                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="modal-card-name">
                                                                {{$freelancer->firstName}}
                                                                {{$freelancer->lastName}}
                                                            </div>
                                                            <div class="modal-card-subName">
                                                                Video
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($freelancer->userData->video_file !== null)
                                                    <div class="row card-audio-con"  style="background-color: white;">
                                                        <div class="col-md-12">
                                                            <div class="text-center">
                                                                <video width="100%" id="videoResume" height="auto" controls>
                                                                    <source src="{{$freelancer->userData->video_file}}">
                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($freelancer->userData->video !== null)
                                                    <div class="row card-audio-con" style="background-color: white;">
                                                        <div class="col-md-12">
                                                            <div class="text-center">
                                                                <iframe src="{{$freelancer->userData->video}}" frameborder="1" allow="encrypted-media" allowfullscreen width="100%" height="auto">

                                                                </iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    @endforeach

               </tbody>
           </table>

           <script>
               let stripe_buttons = document.getElementsByClassName("stripe-button-el");
               for (let i = 0; i < stripe_buttons.length; ++i) {
                   let item = stripe_buttons[i];
                   item.style.display = 'none';
               }
           </script>
       @else
           <b class="pageSubHeading text-left" style="font-size: 14px;">You don't have any saved searches at the moment</b>
       @endif

   </div>


@endsection