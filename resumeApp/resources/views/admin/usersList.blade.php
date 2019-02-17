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
                @if(in_array('Freelancers',$permissions))
                    @include('admin.includes.freelancers')
                @endif

                @if(in_array('Clients and invoices',$permissions))
                    @include('admin.includes.clients')
                @endif

                @if(in_array('Chats',$permissions))
                    @include('admin.includes.chats')
                @endif

                @if(in_array('Freelancers',$permissions))
                    @include('admin.includes.searches')
                @endif
                @if(in_array('Freelancers',$permissions))
                    @include('admin.includes.bookings')

                @endif

                @if(in_array('Freelancers',$permissions))
                    @include('admin.includes.owners')
                @endif

                @if(in_array('Jobs',$permissions))
                    @include('admin.includes.jobs_posts')
                @endif
            </div>
        </div>
    </div>

@endsection