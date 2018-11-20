@extends('layouts.client-app')
@section('content')
    <? use Illuminate\Support\Facades\Auth;
       $client = Auth::guard('client')->user();
    ?>

    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="row container">
        <div class="col-3 alert-success alert"  style="margin-left: 15px;">
            Viewing as admin
        </div>
    </div>

    <div class="row container">
        <div class="col-6">
            <div class="form-group">
                <label class="panelFormLabel">Assigned owner</label>
                <select class="custom-select" style="@if($errors->has('jobTitle')) border:1px solid red; @endif padding-top: 12px !important; padding-bottom: 12px !important; height: auto!important;" id="ownerEmail_client" name="ownerEmail">
                    <option value="" disabled selected>-- Owner's Email --</option>
                    <? foreach($affiliates as $affiliate):?>
                    <option value="{{$affiliate->id}}"<?if($client->affiliate['email'] == $affiliate->email):?>selected<?endif;?>>{{$affiliate->email}}</option>
                    <? endforeach;?>
                </select>
                <a href="javascript:void(0)" id="saveOwner_client" class="btn btn-outline-primary d-none" style="margin-top: 6px;">Save</a>
            </div> <!-- owner assignment -->
        </div>
    </div>
    <? endif;?>
    <hr>
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
                            <td class="NoDecor">
                                <a class="panelFormLabel" data-toggle="collapse" href="#{{$value['id']}}" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-bottom: 10px;">
                                    <b>{{$value['name']}}</b>
                                </a>
                                <div class="collapse" id="{{$value['id']}}" style="padding-top: 10px; padding-bottom: 12px;">
                                    <div style="padding-top: 20px; margin-top: 60px;">
                                        @foreach($value['freelancers'] as $freelancer)
                                            @include('freelancer_card')
                                        @endforeach
                                    </div>
                                </div>
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