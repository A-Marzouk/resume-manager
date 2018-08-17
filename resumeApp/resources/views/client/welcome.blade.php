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
       <h3>Hello {{$client->name}} !</h3>
       <hr>
        <? $searches = $client->searches; ?>

       @if( count($searches) > 0)
       <b>Your saved searches :</b><br/><br/>
       <?
            $i =0;
          foreach ($searches as $search){
              $searchesArr[$i]['name'] = $search->name;
              $searchesArr[$i]['id'] = $search->id;

              foreach (explode(',',$search->freelancers_id) as $id){
                  $searchesArr[$i]['freelancers'][] = \App\User::where('id',$id)->first();
              }
              $i++;
          }
       ?>

       @foreach($searchesArr as $key => $value)
                <div class="row">
                    <div>
                        <a class="btn btn-outline-default" data-toggle="collapse" href="#{{$value['id']}}" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-bottom: 10px;">
                            <b>{{$value['name']}}</b>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <form action="/search_delete" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="search_id" value="{{$value['id']}}">
                            <button type="submit" class="btn panelFormLabel" id="deleteSearch" onclick="return confirm('Are you sure you want to delete this search ?');">
                                x
                            </button>
                        </form>
                    </div>
                </div>

           <div class="collapse" id="{{$value['id']}}" style="padding-top: 10px; padding-bottom: 12px;">
               <div class="card card-body">
                   <? $i = 0 ;?>
                   @foreach($value['freelancers'] as $freelancer)
                       <? $i++; ?>
                       <div class="freelancerCard">
                           <div class="row">
                               <div class="col-lg-4 col-md-12 freelancerCardLeft">
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
                               <div class="col-lg-8 col-md-12 freelancerCardRight">
                                   <div class="panelFormLabel" style=" color: #0290D8;"><b>{{$freelancer->profession}}</b></div>
                                   <div class="panelFormLabel" style="	color: #697786;"><b>Key skills :</b> {{$freelancer->userData->design_skills_checkbox}}</div>
                                   <div class="panelFormLabel" style="	color: #697786;"><b>Rate: </b>${{$freelancer->userData->salary}}/hour</div>
                                   <div class="panelFormLabel" style="	color: #697786;"><b>No.hours/week available: </b>{{$freelancer->userData->availableHours}}</div>
                               </div>
                           </div>
                       </div>
                       @if($i < count($value['freelancers']))
                          <hr>
                       @endif
                   @endforeach
               </div>
           </div>

           <br>
       @endforeach

       @endif

   </div>


@endsection