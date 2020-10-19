{{-- Get in touch Section --}}
<div id="ourClients">
    <?
        // get current client :
    use Illuminate\Support\Facades\Auth;
    if(auth()->guard('client')->guest()){
            $clientName = "";
            $clientEmail = "";
        }else{
            $clientName  = auth()->guard('client')->user()->name;
            $clientEmail = auth()->guard('client')->user()->email;
        }

    ?>
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-12">
            <div>
                <img src="/images/email.png" width="30px;">
                <span class="aboutText">GET IN TOUCH</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-12">
            <div class="row clientsBox">
                <div class="col-md-6 leftSide">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <p>Email :</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <p>shey@123workforce.com</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <p>Address :</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <p>{{$user->city}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- google map git langitude and attitude for JS-->
                        <?
                        if(!empty($user->city)){
                            $address = $user->city; // Google HQ
                            $prepAddr = str_replace(' ','+',$address);
                            $geocode =file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDZWJcFQabrMDUPmXaiU7wlZ74dzm_virI');
                            $output = json_decode($geocode);
                            if(isset($output->results[0])){
                                $latitude = $output->results[0]->geometry->location->lat;
                                $longitude = $output->results[0]->geometry->location->lng;
                            }
                        }
                        ?>
                        <?if(isset($output->results[0]) && !empty($user->city)):?>
                        <span id="latitude" style="display: none">{{$latitude}}</span>
                        <span id="longitude" style="display: none">{{$longitude}}</span>
                        <span id="userCity" style="display: none">{{$user->city}}</span>
                        <? endif;?>
                        <div class="col-sm-12">
                            <div class="location-map">
                                <div id="map" class="map-canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 rightSide">
                    <form method="POST" class="form" action="{{route('message.to.freelancer')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="panelFormLabel">Name</label>
                                    <input type="text" id="username" name="name" class="form-control panelFormInput"
                                           value="{{$clientName}}"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="panelFormLabel">Email</label>
                                    <input type="email" id="email" name="email" required="required" class="form-control panelFormInput"
                                        value="{{$clientEmail}}"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telephone" class="panelFormLabel">Subject</label>
                                    <input type="text" name="subject" class="form-control panelFormInput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message" class="panelFormLabel">Message</label>
                                    <input type="text" name="message" class="form-control panelFormInput">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="freelancerResumeLink" value="{{$user->username}}">
                        <input type="hidden" name="freelancerEmail" value="{{$user->email}}">


                        <div class="row">

                            <div class="buttonMain col-md-6 offset-md-3">
                                <input type="submit" value="Send" class="hireBtn btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>