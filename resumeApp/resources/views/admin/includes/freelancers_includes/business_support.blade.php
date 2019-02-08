
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
            <th scope="col">Approval</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($users as $user):?>
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

        <tr id="selectedRowUser{{$user->id}}">
            <th scope="row">
                <!-- check boxes -->
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="selectedUser{{$user->id}}" type="checkbox" name="selectedUsers[]" value="{{$user->id}}">
                    <span class="checkmark"></span>
                </label>
            </th>
            <td>{{$user->firstName}} {{$user->lastName}}</td>
            <td><a href="/{{$user->username}}" target="_blank">Resume</a></td>
            <td>{{$user->userData->salary ?? 0}} / {{ $user->userData->salary_month ?? 0}}</td>
            <td><a class="btn btn-primary btn-sm" href="{{route('logInAsUser',$user->id)}}">Open form</a>
            </td>
            <td id="status{{$user->id}}">
                @if(isset($user->userData->approved))
                    @if($user->userData->approved == 1)
                        <span style="color: lawngreen">Approved</span>
                    @else
                        Not approved
                    @endif
                @else
                    Not approved
                @endif
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

        <? endforeach;?>
        </tbody>
    </table>
</div>