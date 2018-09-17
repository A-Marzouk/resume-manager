@extends('layouts.app')
<?

    use App\User;
    use App\UserData;

    extract($data);

?>

@section('content')
    <div class="row">
        @include('admin.includes.leftBar')

        <div class="col-md-10">

            @include('admin.includes.messages')

            <div class="tab-content" style="min-height: 400px;">
                @include('admin.includes.home')
                @include('admin.includes.freelancers')
                @include('admin.includes.clients')
                @include('admin.includes.chats')
                @include('admin.includes.searches')
                @include('admin.includes.bookings')
            </div>
        </div>
    </div>

@endsection