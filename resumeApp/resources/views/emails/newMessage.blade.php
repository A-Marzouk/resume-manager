@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello Admin !</div>
    <hr>
    <div class="mailText">
      You have a new message :<br/>
      Message text : <b>{{$userMessage}}</b><br/>
    </div>
        <form method="post" action="123workforce.magictimeapps.com/chat/store/message" style="padding-top: 30px;">
            <div class="form-group">
                <span class="mailText">Reply :</span> <br/>
                <textarea type="text" rows='4' class="form-control" name="message"></textarea><br/>
                <input type="submit" class="hireBtn" value="send">
            </div>
            <input type="hidden" value="{{$conversation_id}}" name="conversationID">
        </form>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

