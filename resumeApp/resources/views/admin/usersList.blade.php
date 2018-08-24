@extends('layouts.app')
<?
    use App\Client;use App\User;use App\UserData;use App\Visitor;
    extract($data);

?>

@section('content')
    <div class="row">
        <div class="col-md-2">
            <h3 class="panelFormLabel text-center">Admin-dashboard</h3>
            <ul class="nav nav-tabs fixedTabs" role="tablist">
                <li class="col-md-12">
                    <a class="btn btn-block btn-outline-primary active" style="margin-bottom: 6px;" href="#home" role="tab" data-toggle="tab">
                        Home
                    </a>
                </li>
                <li class="col-md-12">
                    <a class="btn btn-block btn-outline-primary" href="#freelancers"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                        Freelancers
                    </a>
                </li>
                <li class="col-md-12">
                    <a class="btn btn-block btn-outline-primary" href="#clients"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                        Clients
                    </a>
                </li>
                <li class="col-md-12">
                    <a class="btn btn-block btn-outline-primary" href="#chats"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                        Chats
                    </a>
                </li>
                <li class="col-md-12">
                    <a class="btn btn-block btn-outline-dark" href="#search_links"  style="margin-bottom: 6px;">
                        Public search links
                    </a>
                </li>
                <li class="col-md-12">
                    <a class="btn btn-block btn-outline-dark" href="/search"  style="margin-bottom: 6px;">
                        Search Freelancers
                    </a>
                </li>

                <div id="actionBtns" class="d-none">
                    <li class="col-md-12" style="margin-top: 25px;">
                        <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" id="deleteSelectedBtn">Delete selected</a>
                    </li>
                    <li class="col-md-12" style="margin-top: 5px;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0)" class="btn btn-outline-dark btn-sm" id="approve">Approve</a>
                            <a href="javascript:void(0)" class="btn btn-outline-dark btn-sm" id="disApprove">Disapprove</a>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
        <div class="col-md-10">
            <!-- Success Messages  -->
            @if(session()->has('successMessage'))
                <div class="alert alert-success" style="margin-top: 30px;">
                    {{ session()->get('successMessage') }}
                </div>
            @endif

            @if (session()->has('errorMessage'))
                <div class="alert alert-danger" style="margin-top: 30px;">
                    {{ session()->get('errorMessage') }}
                </div>
            @endif


            <div class="tab-content">

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
                                </tr>
                                </thead>
                                <tbody>
                                <? $designersCounter=1; // designers ?>
                                <? foreach ($users as $user):?>
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
                                </tr>


                                <? $designersCounter++;?>
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
                                </tr>
                                </thead>
                                <tbody>
                                <? $developersCounter=1; // developers ?>
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
                                </tr>


                                <? $developersCounter++;?>
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
                <div role="tabpanel" class="tab-pane" id="clients">
                    <br/>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Link to Profile</th>
                            <th scope="col">View details</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? $i=1; ?>
                        <? foreach ($clients as $client):?>
                        <tr id="selectedRowClient{{$client->id}}">
                            <th scope="row">
                                <!-- check boxes -->
                                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                                    <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="selectedClient{{$client->id}}" type="checkbox" name="selectedClients[]" value="{{$client->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </th>
                            <td>{{$client->name}}</td>
                            <td><a href="{{route('logInAsClient',$client->id)}}" target="_blank">Link to profile</a></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#clientDetails{{$client->id}}">
                                    Details
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="clientDetails{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$client->name}} - details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6"> Name :</div>
                                                    <div class="col-md-6"> {{$client->name}}</div>

                                                    <div class="col-md-6"> Email :</div>
                                                    <div class="col-md-6"> {{$client->email}}</div>

                                                    <div class="col-md-6"> Agency :</div>
                                                    <div class="col-md-6"> {{$client->agency}}</div>

                                                    <div class="col-md-6"> Email Dept :</div>
                                                    <div class="col-md-6"> {{$client->emailDept}}</div>

                                                    <div class="col-md-6"> Time zone :</div>
                                                    <div class="col-md-6"> {{$client->timeZone}}</div>

                                                    <div class="col-md-6"> Signing up date :</div>
                                                    <div class="col-md-6"> {{ $client->created_at->format('d M Y - H:i:s') }}</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <? $i++;?>
                        <? endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="chats">
                    <br/>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Chat rooms</th>
                            <th scope="col">Chat IDs</th>
                            <th scope="col">Visitor/User/Client</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? $i=1; ?>
                        <? foreach ($conversations as $conversation):?>
                        <? if(count($conversation->messages) < 1){continue;}?>
                        <tr id="selectedRowConversation{{$conversation->id}}">
                            <th scope="row">
                                <!-- check boxes -->
                                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                                    <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="selectedConversation{{$conversation->id}}" type="checkbox" name="selectedConversations[]" value="{{$conversation->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </th>
                            <td><a href="/chat/{{$conversation->id}}" target="_blank">Open chat</a></td>
                            <th scope="row">{{$conversation->id}}</th>
                            <th scope="row">
                                <?
                                if(isset($conversation->visitor_id)){
                                    $user = Visitor::where('id',$conversation->visitor_id)->first();
                                    if($user){
                                        echo $user->firstName;
                                    }else{
                                        echo 'Unknown visitor';
                                    }
                                }elseif(isset($conversation->user_id)){
                                    $user = User::where('id',$conversation->user_id)->first();
                                    if($user){
                                        echo $user->firstName.' - Freelancer';
                                    }else{
                                        echo 'Unknown freelancer';
                                    }
                                }elseif(isset($conversation->client_id)){
                                    $user = Client::where('id',$conversation->client_id)->first();
                                    if($user){
                                        echo $user->firstName.' - Client';
                                    }else{
                                        echo 'Unknown client';
                                    }
                                }
                                ?>
                            </th>

                        </tr>

                        <? $i++;?>
                        <? endforeach;?>
                        </tbody>
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane" id="search_links">
                    <br/>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Search name</th>
                            <th scope="col">Client's email</th>
                            <th scope="col">Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? $i=1; ?>
                        <? foreach ($searches as $search):?>
                        <tr>
                            <th scope="row">
                                {{$i}}
                            <th scope="row">{{$search->name}}</th>
                            <th scope="row">{{App\Client::where('id',$search->client_id)->first()->email}}</th>
                            <td><a href="/search/{{$search->id}}" target="_blank">View</a></td>

                        </tr>

                        <? $i++;?>
                        <? endforeach;?>
                        </tbody>
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 addDesigner">
                                <form action="/freelancer/behance/save_user" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="languages"  class="panelFormLabel">Add a designer from Behance</label>
                                        <input type="text" placeholder="Behance user profile link.." class="form-control panelFormInput" id="languages" name="behanceDesignerLink" value="" required>
                                    </div>
                                    <div class="buttonMain">
                                        <button type="submit" class="btn-block hireBtn">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 adminBox">
                                <p class="panelFormLabel" style="font-size: 20px;"># Freelancers</p>
                                <p class="panelFormLabel"> Total : {{count($users)}} </p>
                                <p class="panelFormLabel"> Designers : {{$designersCounter}} </p>
                                <p class="panelFormLabel"> Developers : {{$developersCounter}} </p>
                            </div>

                            <div class="col-md-2 adminBox">
                                <p class="panelFormLabel" style="font-size: 20px;"># Clients</p>
                                <p class="panelFormLabel"> Total : {{count($clients)}} </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection