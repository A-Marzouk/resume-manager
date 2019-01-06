
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
            <th scope="col">Homepage freelancer</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?
            use App\UserData;
            $i=1;
        ?>
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

            <td>
                @if($user->userData->home_page_freelancer)
                    <a href="javascript:void(0)" id="removeFreelancerFromHomePage{{$user->id}}" class="btn btn-default removeFreelancerFromHomePage">Remove</a>
                @else
                    <a href="javascript:void(0)" id="addFreelancerToHomePage{{$user->id}}" class="btn btn-default addFreelancerToHomePage">Add</a>
                @endif
            </td>
            <td><a class="btn btn-primary btn-sm" href="{{route('logInAsUser',$user->id)}}">Open form</a></td>

        </tr>


        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>