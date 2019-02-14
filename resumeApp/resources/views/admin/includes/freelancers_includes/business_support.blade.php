
<div role="tabpanel" class="tab-pane" id="businessSupport">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Link to Resume</th>
            <th scope="col">Hourly / Monthly Rate</th>
            <th scope="col"></th>
            <th scope="col" style="width: 120px;">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($businessSupport as $user):?>
            <?
            $userData3 = $user->userData ;
            if(!isset($userData3)){
                if($user->profession == 'businessSupport'){
                    // make for him userdata
                    $userData = new \App\UserData;
                    $userData->user_id = $user->id;
                    $userData->save();
                }else{
                    continue;
                }
            }
            ?>
            <? if($user->admin == 1 || $user->firstName === 'Visitor' || $user->profession != 'businessSupport'){ continue;}?>

            <tr id="selectedRowUser{{$user->id}}" class="shaded" style="@if($user->is_shaded == 'SHADED') background-color:lightgrey; @endif">
                <th scope="row">
                    <!-- check boxes -->
                    <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                        <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="selectedUser{{$user->id}}" type="checkbox" name="selectedUsers[]" value="{{$user->id}}">
                        <span class="checkmark"></span>
                    </label>
                </th>
                <td class="NoDecor">
                    <a href="javascript:void(0)" data-target="#businessSupportInfo{{$user->id}}"  data-toggle="modal">
                        {{$user->firstName}} {{$user->lastName}}
                    </a>
                </td>
                <td><a href="/{{$user->username}}" target="_blank">Resume</a></td>
                <td>{{$user->userData->salary ?? 0}} / {{ $user->userData->salary_month ?? 0}}</td>
                <td><a class="btn btn-primary btn-sm" href="{{route('logInAsUser',$user->id)}}">Log in</a>
                </td>
                <td>
                    <select style="border-top: 6px solid @if($user->status == 'NOT_SELECTED') grey @else {{$user->status}} @endif;" name="business_user_status" class="business_user_status form-control" id="business_user_status{{$user->id}}">
                        <option value="not-selected">Not selected</option>
                        <option value="BLUE" @if($user->status=='BLUE') selected @endif style="background-color: blue; color:white;">
                            Blue
                        </option>
                        <option value="ORANGE" @if($user->status=='ORANGE') selected @endif style="background-color: orange; color:white;">
                            Orange
                        </option>
                        <option value="GREEN" @if($user->status=='GREEN') selected @endif style="background-color: green; color:white;">
                            Green
                        </option>
                        <option value="RED" @if($user->status=='RED') selected @endif style="background-color: red; color:white;">
                            Red
                        </option>
                    </select>
                </td>
                <td>
                    <? $finishedBookings =  0 ;?>
                    @foreach($user->bookings as $booking)
                        <?
                        $clientName = 'Visitor' ;
                        if($booking->client_id){
                            $clientName = App\Client::where('id',$booking->client_id)->first()->name ;
                        }
                        ?>
                        @if(!$booking->canceled)
                            <div class="panelFormLabel text-center" id="bookingStatus{{$booking->id}}">
                                <div>
                                    <b>{{$booking->hours}}</b> hours - <b>{{$booking->weeks}}</b> weeks to <b>{{$clientName}}</b>
                                </div><br/>
                                <b>{{$booking->booking_email}}</b><br/>
                                <a href="javascript:void(0)" class="btn btn-sm btn-default releaseBooking" id="addHoursBtn{{$booking->id}}">Add hours back</a>
                            </div>
                            <hr width="50%">
                        @else
                            <? $finishedBookings++; ?>
                        @endif

                    @endforeach
                    @if($finishedBookings)
                        <div class="panelFormLabel NoDecor text-center">
                            Finished bookings : <span id="finishedBookings{{$user->id}}">{{$finishedBookings}}</span>
                        </div>
                    @endif
                </td>
                <td class="panelFormLabel text-center">
                    {{$user->owner['name']}}
                </td>
            </tr>

            <div class="modal fade" id="businessSupportInfo{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="businessSupportInfo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" @click="clearSendData" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pageSubHeading">
                            Business support agent info
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6"> Name :</div>
                                <div class="col-md-6"> {{$user->firstName}} {{$user->lastName}}</div>

                                <div class="col-md-6"> Email :</div>
                                <div class="col-md-6"> {{$user->email}}</div>

                                <div class="col-md-6"> Phone :</div>
                                <div class="col-md-6"> {{$user->phone}}</div>

                                <div class="col-md-6"> Whatsapp :</div>
                                <div class="col-md-6"> {{$user->whatsapp}}</div>

                                <div class="col-md-6"> Skype:</div>
                                <div class="col-md-6"> {{$user->skype}}</div>

                                <div class="col-md-6"> Signing up date :</div>
                                <div class="col-md-6"> {{ $user->created_at->format('d M Y - H:i:s') }}</div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <? endforeach;?>
        </tbody>
    </table>
</div>