@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid lightgrey;">
                <p class="pageSubHeading2 text-left">
                    My jobs
                </p>
                @if(count($freelancerJobs) < 1)
                    <p class="panelFormLabel"> You have not applied to any job yet.</p>
                @endif
                <div>
                    @foreach($freelancerJobs as $job)
                        <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">{{$job->title}}</div><br/>
                        <div  style="color: #30323D;font-family: Roboto;">Description : {{$job->description}}</div>
                        <div  style="color: #30323D;font-family: Roboto;">Budget : {{$job->budget}}</div>
                        <br/>
                        <div>
                            @if($currFreelancer->hasApplied($job->id))
                                <span style="color: greenyellow" id="applied{{$job->id}}">Applied</span> &nbsp;
                                <button href="javascript:void(0)" id="cancelApply{{$job->id}}" class="cancelApplyBtn btn btn-small btn-outline-danger">Cancel application</button>
                            @else
                                <a href="#" class="btn btn-outline-primary">Apply</a>
                            @endif
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <p class="pageSubHeading2 text-left">
                    Recent jobs
                </p>
                <div>
                    @foreach($allJobs as $job)
                        @if($currFreelancer->hasApplied($job->id))
                            @continue
                        @endif
                        <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">{{$job->title}}</div><br/>
                        <div  style="color: #30323D;font-family: Roboto;">Description : {{$job->description}}</div>
                        <div  style="color: #30323D;font-family: Roboto;">Budget : {{$job->budget}}</div>
                        <br/>
                        <div>
                            <button href="javascript:void(0)" id="applyToJob{{$job->id}}" class="applyToJobBtn btn btn-outline-primary">Apply</button>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection