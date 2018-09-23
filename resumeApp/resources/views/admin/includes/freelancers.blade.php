<div role="tabpanel" class="tab-pane" id="freelancers">

    <br/>
    <ul class="nav nav-tabs" role="tablist">
        <li class="col-md-2">
            <a class="btn btn-block btn-outline-primary active" href="#designers" role="tab" data-toggle="tab">
                Designers
            </a>
        </li>
        <li class="col-md-2">
            <a class="btn btn-block btn-outline-primary" href="#developers" role="tab" data-toggle="tab">
                Developers
            </a>
        </li>
        <li class="col-md-2">
            <a class="btn btn-block btn-outline-primary" href="#behanceDesigners" role="tab" data-toggle="tab">
                Behance designers
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="designers">
            <br/>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Link to Resume</th>
                    <th scope="col">Hourly / Monthly Rate </th>
                    <th scope="col"></th>
                    <th scope="col">Empty Fields</th>
                    <th scope="col">Approval</th>
                    <th scope="col" class="text-center">Bookings</th>
                </tr>
                </thead>
                <tbody>
                <? use App\UserData;foreach ($users as $user):?>
                <?
                $userData3 = $user->userData ;
                if(!isset($userData3)){
                    continue;
                }
                ?>
                <? if($user->admin == 1 || $user->firstName === 'Visitor' || $user->profession != 'Designer'){ continue;}?>

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
                    <? if($user->isComplete()):?>
                    <td>
                        <span style="color: lawngreen;">Profile Complete</span>
                    </td>
                    <? else:?>
                    <td>

                        <a href="jacascript:void(0)" class="btn btn-outline-info" data-target="#fields{{$user->id}}" data-toggle="collapse">
                            {{count($user->emptyFields)}}
                        </a>

                        <div id="fields{{$user->id}}" class="collapse">
                            <br/>
                            <? foreach ($user->emptyFields as $data):?>
                            <li>{{$data}}</li>
                            <? endforeach;?>
                        </div>

                    </td>

                    <? endif;?>
                    <td id="status{{$user->id}}">
                        @if($user->userData->approved)
                            <span style="color: lawngreen">Approved</span>
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
                </tr>

                <? endforeach;?>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="developers">
            <br/>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Link to Resume</th>
                    <th scope="col">Hourly / Monthly Rate</th>
                    <th scope="col"></th>
                    <th scope="col">Empty Fields</th>
                    <th scope="col">Approval</th>
                    <th scope="col">Bookings</th>
                </tr>
                </thead>
                <tbody>
                <? foreach ($users as $user):?>
                <?
                $userData3 = $user->userData ;
                if(!isset($userData3)){
                    continue;
                }
                ?>
                <? if($user->admin == 1 || $user->firstName === 'Visitor' || $user->profession != 'Developer'){ continue;}?>

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
                    <? if($user->isComplete()):?>
                    <td>
                        <span style="color: lawngreen;">Profile Complete</span>
                    </td>
                    <? else:?>
                    <td>
                        <a href="jacascript:void(0)" class="btn btn-outline-info" data-target="#fields{{$user->id}}" data-toggle="collapse">
                            {{count($user->emptyFields)}}
                        </a>

                        <div id="fields{{$user->id}}" class="collapse">
                            <br/>
                            <? foreach ($user->emptyFields as $data):?>
                            <li>{{$data}}</li>
                            <? endforeach;?>
                        </div>
                    </td>
                    <? endif;?>
                    <td id="status{{$user->id}}">
                        @if($user->userData->approved)
                            <span style="color: lawngreen">Approved</span>
                        @else
                            Not approved
                        @endif
                    </td>
                    <td>
                        @foreach($user->bookings as $booking)
                            {{$booking->id}}
                        @endforeach
                    </td>
                </tr>

                <? endforeach;?>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="behanceDesigners">
            <br/>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Behance profile</th>
                    <th scope="col">Location</th>
                    <th scope="col">Occupation</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <? $i=1; ?>
                <? foreach ($users as $user):?>
                <?
                $userData3 = $user->userData ;
                if(!isset($userData3)){
                    continue;
                }
                ?>
                <?
                $isBehanceUser = false;
                if (strpos($user->username, 'BeUser') !== false) {
                    $isBehanceUser = true;
                    $userData = UserData::where('user_id',$user->id)->first();
                }
                ?>
                <? if($user->admin == 1 || $user->firstName === 'Visitor' ||  !$isBehanceUser){ continue;}?>

                <tr id="selectedRowBUser{{$user->id}}">
                    <th scope="row">
                        <!-- check boxes -->
                        <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                            <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="selectedUser{{$user->id}}" type="checkbox" name="selectedUsers[]" value="{{$user->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    {{-- diplay name--}}
                    <td>{{$userData->name}}</td>
                    {{-- link to behance --}}
                    <td><a href="{{$userData->behanceLink}}" target="_blank">Behance profile</a></td>
                    {{-- city --}}
                    <td>{{$userData->city}}</td>
                    {{-- job title --}}
                    <td>{{$userData->jobTitle}}</td>
                    <td><a class="btn btn-primary btn-sm" href="{{route('logInAsUser',$user->id)}}">Open form</a></td>

                </tr>


                <? $i++;?>
                <? endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>