{{-- Get in touch Section --}}
<div id="ourClients">
    <div class="row">
        <div class="col-md-11 offset-md-1">
            <div>
                <img src="resumeApp/resources/views/customTheme/images/email.png" width="30px;">
                <span class="aboutText">GET IN TOUCH</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
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
                                <p>riz@123workforce.com</p>
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
                    <form id="contact-form" method="POST" class="form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="panelFormLabel">Name</label>
                                    <input type="text" id="username" name="name" class="form-control panelFormInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="panelFormLabel">Email</label>
                                    <input type="email" id="email" name="email" required="required" class="form-control panelFormInput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telephone" class="panelFormLabel">Subject</label>
                                    <input type="tel" name="subject" class="form-control panelFormInput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message" class="panelFormLabel">Message</label>
                                    <input type="tel" name="message" class="form-control panelFormInput">
                                </div>
                            </div>
                        </div>


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