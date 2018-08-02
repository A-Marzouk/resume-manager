<div id="about" class="education">
    <div class="row">
        <div class="offset-lg-1 col-lg-5 col-md-6 educationSection">
            <img src="resumeApp/resources/views/customTheme/images/newResume/what_i_do.png" style="padding-bottom: 10px;" alt="aboutImg" width="30px;">
            <span class="aboutText">WORK OVERVIEW</span>
            <?php
                $works = $user1->worksHistory;
            ?>
            <div class="aboutText">
                <? foreach ($works as $work):?>
                <div class="row">
                    <div class="col-md-12 aboutSubText">
                        <div class="title work">
                            <span class="circle"></span>
                            {{$work->job_title}}
                        </div>
                        <div class="company">{{$work->company}}</div>
                        <div class="year"><span class="work">
                                {{date('F Y', strtotime($work->date_from))}}
                                <? if($work->currently_working):?>
                                - Present
                                <? else: ?>
                                - {{date('F Y', strtotime($work->date_to))}}
                                <? endif;?>
                            </span>
                        </div>
                        <div class="desc">{{$work->job_description}}</div>
                    </div>
                </div>
                <? endforeach;?>
            </div>
        </div>
    </div>
</div>
<hr style="width: 85% ;">