@extends('layouts.app')
<?
    use App\Client;use App\User;use App\Visitor;
    extract($data);

?>

@section('content')
    <div class="container">
        <h1 >Welcome Admin !</h1>
        <ul class="nav nav-tabs" role="tablist">
            <li class="col-md-4">
                <a class="btn btn-block btn-primary active" href="#freelancers" role="tab" data-toggle="tab">
                    Freelancers
                </a>
            </li>
            <li class="col-md-4">
                <a class="btn btn-block btn-dark text-center" href="#clients" role="tab" data-toggle="tab">
                    Clients
                </a>
            </li>
            <li class="col-md-4">
                <a class="btn btn-block btn-success text-center" href="#chats" role="tab" data-toggle="tab">
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

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="freelancers">
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
                    <? if($user->admin == 1 || $user->firstName === 'Visitor'){ continue;}?>

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
            <div role="tabpanel" class="tab-pane" id="clients">
                <br/>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Link to Profile</th>
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