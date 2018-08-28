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
                                                    <div class="col-lg-5 col-md-12 freelancerCardLeft">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-6 imageContainer">
                                                                <img src="{{$freelancer->userData->photo}}" alt="freelancer" class="freelancerImg" width="100" height="100">

                                                            </div>
                                                            <div class="col-lg-6 col-6">
                                                                <div id="name">
                                                                    {{$freelancer->firstName}} {{$freelancer->lastName}}
                                                                </div>
                                                                <div class="buttonMain" style=" margin-top: 10px;">
                                                                    <a class="hireBtn btn-block" href="/{{$freelancer->username}}" style="font-weight:normal; padding: 7px 5px 7px 5px; ">Visit profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12 freelancerCardRight">
                                                        <div class="panelFormLabel" style=" color: #0290D8;"><b>{{$freelancer->profession}}</b></div>
                                                        <div class="panelFormLabel" style="	color: #697786;">
                                                            <b>Key skills :</b>
                                                            <span style="font-weight: normal;">
                                                                {{$freelancer->userData->design_skills_checkbox}}
                                                            </span>
                                                        </div>
                                                        <div class="panelFormLabel" style="	color: #697786;">
                                                            <b>Rate: </b>
                                                            <span style="font-weight: normal;">
                                                                ${{$freelancer->userData->salary}}/hour
                                                            </span>
                                                        </div>
                                                        <div class="panelFormLabel" style="	color: #697786;">
                                                            <b>No.hours/week available: </b>
                                                            <span style="font-weight: normal;">
                                                                {{$freelancer->userData->availableHours}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($i < count($value['freelancers']))
                                                <hr>
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
       @endforeach

               </tbody>
           </table>


       @else
           <b class="pageSubHeading text-left" style="font-size: 14px;">You don't have any saved searches at the moment</b>
       @endif

   </div>


@endsection