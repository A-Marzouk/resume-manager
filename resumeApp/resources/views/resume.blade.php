@extends('layouts.client-app')

@section('content')
        <? // check developer or designer :
        $developer = $designer = false;
        if($profession == 'Developer'){
            $developer = true;
        }elseif($profession == 'Designer'){
            $designer = true;
        }
        ?>
        {{-- works --}}
        <?
        $works = explode(',',$user->works);
        foreach ($works as $work){
            if(!empty($work)){
                $clearWorks[] = $work;
            }
        }
        ?>
        <!-- Success Messages  -->
        <div style="padding-top: 20px;">
            @if(session()->has('successMessage'))
                <div class="alert alert-success" id="successMessage">
                    {{ session()->get('successMessage') }}
                </div>
            @endif
        </div>

        @include('resume_sections.info')
        @include('resume_sections.cv_bar')
        @include('resume_sections.about')
        @include('resume_sections.audio')
        @include('resume_sections.video')
        @include('resume_sections.career_objective')
        @include('resume_sections.education')
        @include('resume_sections.work_experience')
        @include('resume_sections.design_style')
        @include('resume_sections.skills')
        @include('resume_sections.works')
        @include('resume_sections.our_clients')


        {{-- modals --}}

        <!-- Modal -->
        <? for ($i=0;$i<8 ;$i++):?>
        <div class="modal fade" id="works{{$i}}Modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="">
                        <div class="modal-content">
                                <div class="modal-body" style="padding: 0;">
                                        <div class="row">
                                                <div class="col-md-12">
                                                        <img src="{{$clearWorks[$i]}}" alt="" width="100%" height="auto">
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <? endfor;?>
@endsection