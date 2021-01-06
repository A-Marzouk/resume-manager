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


            <div class="tab-content" style="min-height: 400px; overflow-x: auto;">
                @include('admin.includes.home')

                @include('admin.includes.searches')
                @include('admin.includes.freelancers')
                @include('admin.includes.subscriptions')
                @include('admin.includes.clients')
                @include('admin.includes.searches')
                @include('admin.includes.bookings')
                @include('admin.includes.owners')
                @include('admin.includes.jobs_posts')

            </div>
        </div>
    </div>

@endsection
