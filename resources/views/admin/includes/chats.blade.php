
<?
    use App\Visitor;
    use App\Client;
    use App\User;
?>
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