@extends('layouts.email')
@section('content')
    <div class="greeting" >Hello Admin !</div>
    <hr>
    <div class="mailText">
      You have a new message:
      <b style="background: whitesmoke;">{{$userMessage}}</b><br/>
    </div>
    <form method="get" action="123workforce.magictimeapps.com/chat/store/message" style="padding-top: 30px;">
        <div class="form-group">
            <span class="mailText">Quick reply :</span> <br/>
            <textarea type="text" rows='4' class="form-control" name="message"></textarea><br/>
            <input type="hidden" value="AdminReply164362df624de053FromEmail" name="token">
            <input type="hidden" value="{{$conversation_id}}" name="conversationID">
            <input type="submit" class="btn btn-primary" value="send">
        </div>
     </form>
    <div class="mailText">
        To view conversation please click here :
        <a href="123workforce.magictimeapps.com/chat/{{$conversation_id}}" class="btn btn-primary">Chat room</a>
    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection

