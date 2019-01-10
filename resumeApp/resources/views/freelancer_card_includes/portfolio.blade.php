{{-- Portfolio --}}
<div class="portfolioRow" id="tapsArea{{$freelancer->id}}{{$value['id']}}">
    <div class="row" id="portfolioContent{{$freelancer->id}}{{$value['id']}}">
    @if($freelancer->profession == 'businessSupport')
            <? $i=1;?>
            @foreach($freelancer->recordings as $record)
                <div class="col-md-12 aboutSubText">
                    <div class="title work">
                        <span class="circle"></span>
                        {{$record->title}}
                    </div>
                    <div class="desc">{{$record->transcription}}</div>
                    <?
                        // getting the record source right:
                        $source = $record->src;
                        if (strpos($record->src, 'drive.google.com') !== false) {
                            // it is link from google. get the ID
                            $explodedData= explode("/", $record->src);
                            foreach ($explodedData as $id){
                                if(strlen($id) > 20 ){
                                    $source = "https://drive.google.com/uc?export=download&id=".$id."&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";

                                }
                            }
                        }

                    ?>
                    <div class="row" style="padding-top: 30px;">
                        <div class="offset-md-4 col-md-4">
                            <audio controls style="padding-bottom: 10px;" preload="auto">
                                <source src="{{$source}}">
                                Your browser does not support the audio element.
                            </audio><!--/.audio-container-->
                        </div>
                    </div>
                    @if($i < count($freelancer->recordings))
                        <hr>
                    @endif
                </div>
                <? $i++;?>
            @endforeach
    @else
        <?
        $workExamples_all =\App\Project::where([
            'user_id'=>$freelancer->id
        ])->orderBy('order','ASC')->get();

        $workExamples = [] ;
        foreach ($workExamples_all as $work){
            if( $work->isActive == true ||  $work->isActive == 'true'){
                $workExamples[] = $work;
            }
        }
        $i = 0;
        $numberOfSlides = ceil(count($workExamples) / 2);
        $maxNumberOfWorks = 12;
        $slides=[];

        for ($j=0; $j <= $numberOfSlides+1; $j+=2){
            // each slide has 2 works
            if(isset($workExamples[$j])){
                $slides[$j][] = $workExamples[$j];
            }
            if(isset($workExamples[$j+1])){
                $slides[$j][] = $workExamples[$j+1];
            }
        }
        ?>

        {{-- modals --}}
        @if($workExamples)
            <? foreach ($workExamples as $workExample):?>
            <div class="modal fade" id="works{{$workExample->id}}Modal" tabindex="-1"

                 role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="">
                    <div class="modal-content modal-mobile-resume" data-dismiss="modal"
                         aria-label="Close">
                        <div class="modal-body" style="padding: 0;">
                            <div class="row">
                                <div class="col-md-9" style="padding: 0;">
                                    <?
                                    $photoSrc = $workExample->mainImage ;
                                    if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                        $photoSrc = '/' . $photoSrc;
                                    }
                                    ?>
                                    <img src="{{$photoSrc}}" alt=""
                                         width="100%" height="auto">
                                    <?
                                    // more images
                                    $moreImagesArr = explode(',', $workExample->images);
                                    foreach($moreImagesArr as $image){
                                    if(!empty(trim($image))){
                                    ?>
                                    @if(strpos($image, 'embed') !== false)
                                        <iframe height="400" width="100%" src="{{$image}}?bgcolor=%23191919" allowfullscreen autoplay style="margin: 0px auto; display: block;"></iframe>
                                    @else
                                        <img src="{{$image}}" alt="" width="100%" height="auto">
                                    @endif

                                    <?}
                                    }?>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="padding-top: 25px;">
                                        <label class="panelFormLabel"> Description
                                            <hr>
                                        </label><br/>
                                        <div class="panelFormLabel">
                                            {{$workExample->projectDesc}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="panelFormLabel"> Link
                                            <hr>
                                        </label><br/>
                                        @if(!empty($workExample->link))
                                            @if(!strpos($workExample->link, 'www.behance.net'))
                                                {{-- does not containe behance link --}}
                                                <a href="{{$workExample->link}}" onclick="javascript:window.location='{{$workExample->link}}'">
                                                    Project Link
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? endforeach; ?>
        @endif
        <div class="showOnlyOnmd">
            {{-- works section carousel --}}
            <div id="portfolioCarousel{{$freelancer->id}}{{$value['id']}}" class="carousel slide d-md-block" data-ride="carousel"
                 data-interval="false">
                <div class="carousel-inner" style="background: #fdfdfd;">
                    @if(!empty($workExamples))
                        <? $i=1;?>
                        @foreach($slides as $slide)
                            <div class="carousel-item @if($i===1) active @endif">
                                <div class="row">
                                    @foreach($slide as $workExample)
                                        <div class="col-md-6">
                                            <div class="workCard" style="margin-left: 0">
                                                <div class="workImg">
                                                    <a href="javascript:void(0)"
                                                       @if(!isset($portfolioModal))
                                                       data-toggle="modal" style="outline: none;"
                                                       data-target="#works{{$workExample->id}}Modal"
                                                            @endif
                                                    >
                                                        <?
                                                        $photoSrc = $workExample->mainImage ;
                                                        if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                                            $photoSrc = '/' . $photoSrc;
                                                        }
                                                        ?>
                                                        <img src="{{$photoSrc}}" alt="work img"
                                                             width="260" >
                                                    </a>
                                                </div>
                                                <div class="workTitle">
                                                    <div class="row">
                                                        <div class="col-md-10 col-9">
                                                            {{$workExample->projectName}}
                                                        </div>
                                                        <a class="col-md-1 col-1" href="javascript:void(0)"
                                                           data-toggle="modal"
                                                           data-target="#works{{$workExample->id}}Modal"
                                                           style="outline: none; margin-left: 16px;">
                                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                                 alt="view work">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <? $i++ ;?>
                        @endforeach
                    @endif
                </div>
            </div>
            {{-- end of works section carousel --}}

            {{-- carousel controls --}}
            <div class="row carouselControls" style="width: 100%;">
                <div class=" col-12 text-center NoDecor">
                    <a href="javascript:void(0)" id="prevSlide{{$freelancer->id}}{{$value['id']}}"  data-target="#portfolioCarousel{{$freelancer->id}}{{$value['id']}}" data-slide-to="{{$numberOfSlides}}" role="button" data-slide="prev" class="cardLabel_interviews noScroll prevSlide"
                       style="color:#697786;">
                        <img src="/resumeApp/resources/assets/images/left_arrow.png"
                             alt="prev" width="15px">
                    </a>

                    <span class="jobTitle" style="padding: 0 5px 0 5px"> <span id="slideNumber{{$freelancer->id}}{{$value['id']}}">1</span>/<span id="maxNumSlide{{$freelancer->id}}{{$value['id']}}">{{$numberOfSlides}}</span></span>

                    <a href="javascript:void(0)" id="nextSlide{{$freelancer->id}}{{$value['id']}}" data-target="#portfolioCarousel{{$freelancer->id}}{{$value['id']}}" data-slide-to="{{$numberOfSlides}}" role="button" data-slide="next" class="cardLabel_interviews noScroll nextSlide"
                       style="color:#697786;">
                        <img src="/resumeApp/resources/assets/images/right_arrow.png"
                             alt="next" width="15px">
                    </a>
                </div>
            </div>
            {{--end of carousel controller--}}
            </div>

        </div>
        <div id="portfolioContent{{$freelancer->id}}{{$value['id']}}_mob">
    <div class="showOnlyOnsm">
        {{-- works section carousel --}}
        <div id="portfolioCarousel{{$freelancer->id}}{{$value['id']}}_mob" class="carousel slide" data-ride="carousel"
             data-interval="false">
            <div class="slickSlide_portfolio" style="background: #fdfdfd;">
                @if(!empty($workExamples))
                    <? $i=1;?>
                    @foreach($workExamples as $workExample)
                        <div class="row">
                            <div class="col-12">
                                <div class="workCard" style="margin-left: 0">
                                    <div class="workImg">
                                        <a href="javascript:void(0)"
                                           @if(!isset($portfolioModal))
                                           data-toggle="modal" style="outline: none;"
                                           data-target="#works{{$workExample->id}}Modal"
                                                @endif
                                        >
                                            <?
                                            $photoSrc = $workExample->mainImage ;
                                            if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                                $photoSrc = '/' . $photoSrc;
                                            }
                                            ?>
                                            <img src="{{$photoSrc}}" alt="work img"
                                                 width="260" >
                                        </a>
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-10 col-9">
                                                {{$workExample->projectName}}
                                            </div>
                                            <a class="col-md-1 col-1" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#works{{$workExample->id}}Modal"
                                               style="outline: none; margin-left: 16px;">
                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                     alt="view work">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <? $i++ ;?>
                    @endforeach
                @endif
            </div>
        </div>
        {{-- end of works section carousel --}}

    </div>
</div>
    @endif
</div>

{{-- end of portfolio --}}