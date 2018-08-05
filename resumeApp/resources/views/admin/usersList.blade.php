@extends('layouts.app')
<?
    use App\Client;use App\User;use App\UserData;use App\Visitor;
    extract($data);

?>

@section('content')
    <div class="container">
        <h3>Dashboard</h3>
        <hr>
        <ul class="nav nav-tabs" role="tablist">
            <li class="col-md-2">
                <a class="btn btn-block btn-outline-dark active" href="#home" role="tab" data-toggle="tab">
                    Home
                </a>
            </li>
            <li class="col-md-3">
                <a class="btn btn-block btn-outline-dark" href="#freelancers" role="tab" data-toggle="tab">
                    Freelancers
                </a>
            </li>
            <li class="col-md-4">
                <a class="btn btn-block btn-outline-dark" href="#clients" role="tab" data-toggle="tab">
                    Clients
                </a>
            </li>
            <li class="col-md-3">
                <a class="btn btn-block btn-outline-dark" href="#chats" role="tab" data-toggle="tab">
                    Chatting rooms
                </a>
            </li>
        </ul>

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
                </div>
            </div>
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
                                <th scope="col">Profession</th>
                                <th scope="col"></th>
                                <th scope="col">Empty Fields</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? $i=1; ?>
                            <? foreach ($users as $user):?>
                            <? if($user->admin == 1 || $user->firstName === 'Visitor' || $user->profession != 'Designer'){ continue;}?>

                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$user->firstName}} {{$user->lastName}}</td>
                                <td><a href="/{{$user->username}}" target="_blank">Resume</a></td>
                                <td>{{$user->profession}}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{route('logInAsUser',$user->id)}}">Edit</a> - <a class="btn btn-sm btn-danger" href="{{route('freelancer.delete',$user->id)}}"  onclick="return confirm('Are you sure you want to delete {{$user->firstName}} {{$user->lastName}}?');">Delete</a></td>
                                <? if($user->isComplete()):?>
                                <td>
                                    <span style="color: green;">Profile Complete</span>
                                </td>
                                <? else:?>
                                <td>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li>
                                            <a href="#fields{{$user->id}}"  class="btn btn-outline-info" role="tab" data-toggle="tab">
                                                Show
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#hide{{$user->id}}" class="btn btn-outline-primary btn-small" role="tab" data-toggle="tab">Hide</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane" id="fields{{$user->id}}">
                                            <br/>
                                            <? foreach ($user->emptyFields as $data):?>
                                            <li>{{$data}}</li>
                                            <? endforeach;?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="hide{{$user->id}}">
                                        </div>
                                    </div>
                                </td>
                                <? endif;?>
                            </tr>


                            <? $i++;?>
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
                                <th scope="col">Profession</th>
                                <th scope="col"></th>
                                <th scope="col">Empty Fields</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? $i=1; ?>
                            <? foreach ($users as $user):?>
                            <? if($user->admin == 1 || $user->firstName === 'Visitor' || $user->profession != 'Developer'){ continue;}?>

                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$user->firstName}} {{$user->lastName}}</td>
                                <td><a href="/{{$user->username}}" target="_blank">Resume</a></td>
                                <td>{{$user->profession}}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{route('logInAsUser',$user->id)}}">Edit</a> - <a class="btn btn-sm btn-danger" href="{{route('freelancer.delete',$user->id)}}"  onclick="return confirm('Are you sure you want to delete {{$user->firstName}} {{$user->lastName}}?');">Delete</a></td>
                                <? if($user->isComplete()):?>
                                <td>
                                    <span style="color: green;">Profile Complete</span>
                                </td>
                                <? else:?>
                                <td>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li>
                                            <a href="#fields{{$user->id}}"  class="btn btn-outline-info" role="tab" data-toggle="tab">
                                                Show
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#hide{{$user->id}}" class="btn btn-outline-primary btn-small" role="tab" data-toggle="tab">Hide</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane" id="fields{{$user->id}}">
                                            <br/>
                                            <? foreach ($user->emptyFields as $data):?>
                                            <li>{{$data}}</li>
                                            <? endforeach;?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="hide{{$user->id}}">
                                        </div>
                                    </div>
                                </td>
                                <? endif;?>
                            </tr>


                            <? $i++;?>
                            <? endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="behanceDesigners">
                        <br/>
                        <table class="table">
                            <thead>
                            {{--
                            we will save for user all username and password. firt name and last name and leave email
                            we will show :

                                display name
                                behance link
                                location
                                occupation (job title)
                            --}}
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
                                $isBehanceUser = false;
                                if (strpos($user->username, 'BeUser') !== false) {
                                    $isBehanceUser = true;
                                    $userData = UserData::where('user_id',$user->id)->first();
                                }
                            ?>
                            <? if($user->admin == 1 || $user->firstName === 'Visitor' ||  !$isBehanceUser){ continue;}?>

                            <tr>
                                <th scope="row">{{$i}}</th>
                                {{-- diplay name--}}
                                <td>{{$userData->name}}</td>
                                {{-- link to behance --}}
                                <td><a href="{{$userData->behanceLink}}" target="_blank">Behance profile</a></td>
                                {{-- city --}}
                                <td>{{$userData->city}}</td>
                                {{-- job title --}}
                                <td>{{$userData->jobTitle}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('logInAsUser',$user->id)}}">Edit</a> -
                                    <a class="btn btn-sm btn-danger" href="{{route('freelancer.delete',$user->id)}}"  onclick="return confirm('Are you sure you want to delete {{$user->firstName}} {{$user->lastName}}?');">Delete</a>
                                </td>

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
                    <tr>
                        <th scope="row">{{$i}}</th>
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
                        <td><a class="btn btn-sm btn-danger" href="{{route('client.delete',$client->id)}}"  onclick="return confirm('Are you sure you want to delete {{$client->name}}?');">Delete</a></td>
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
                        <th scope="col">Chatting rooms</th>
                        <th scope="col">Chat IDs</th>
                        <th scope="col">Visitor/User/Client</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    <? foreach ($conversations as $conversation):?>
                    <? if(count($conversation->messages) < 1){continue;}?>
                    <tr>
                        <th scope="row">{{$i}}</th>
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
                        <td><a class="btn btn-sm btn-danger" href="{{route('conversation.delete',$conversation->id)}}"  onclick="return confirm('Are you sure you want to delete conversation ?');">Delete</a></td>

                    </tr>

                    <? $i++;?>
                    <? endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection