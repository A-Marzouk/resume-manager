<? $showVideo = false;
if(!isset($value['id'])){
    $value['id'] = '';
}
$smallCard = true;
?>

<div class="freelancerCard">
    <div class="col-lg-12 col-md-12 col-12 resumeCardRight" id="resumeCardRight{{$freelancer->id}}{{$value['id']}}">
        @include('freelancer_card_includes.main_card_info')
        <div style="padding-bottom:15px; ">
            @include('freelancer_card_includes.skills')
        </div>
    </div>
</div>