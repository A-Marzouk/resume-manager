@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div>
                    Job title : {{$job->title}}
                </div>
                <div>
                    Descreption : {{$job->description}}
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    Level : {{$job->level}}
                </div>
                <div>
                    Budget : {{$job->budget}}
                </div>
                <div>
                    Client name : {{\App\Client::find($job->client_id)->name}}
                </div>
                <div>
                    @if(!empty($job->job_attachment))
                        Attachment :
                        <a href="/{{$job->job_attachment}}" >Open file </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(auth()->user())
                    <?php $currFreelancer = auth()->user(); ?>
                    @if($currFreelancer->hasApplied($job->id))
                        <span style="color: greenyellow" id="applied{{$job->id}}">Applied</span> &nbsp;
                        <button href="javascript:void(0)" id="cancelApply{{$job->id}}" class="cancelApplyBtn btn btn-small btn-outline-danger">Cancel application</button>
                    @else
                        <div>
                            <button href="javascript:void(0)" id="applyToJob{{$job->id}}" class="applyToJobBtn btn btn-outline-primary">Apply</button>
                        </div>
                    @endif
                @else
                    <a href="{{route('freelancer.login')}}" class="btn btn-outline-primary">Login to apply</a>
                @endif
            </div>
        </div>
    </div>
@endsection
