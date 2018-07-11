{{-- Get in touch Section --}}
<div id="ourClients">
    <div class="row">
        <div class="col-md-11 offset-md-1">
            <div class="heading">
                <h2>
                    <img src="resumeApp/resources/views/customTheme/images/email.png"> GET IN TOUCH
                </h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row clientsBox">
                <div class="col-md-6 leftSide">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-6">
                            <div class="info">
                                <p>Email :</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="info">
                                <p>riz@123workforce.com</p>
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
                                    <label for="username" class="formLabel">Name</label>
                                    <input type="text" id="username" name="name" placeholder="Name Surname" class="form-control no-border">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="formLabel">Email</label>
                                <input type="email" placeholder="your@email.com" id="email" name="email" required="required" class="form-control no-border">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="telephone" class="formLabel">Subject</label>
                                <input type="tel" placeholder="Message subject" name="subject" class="form-control no-border">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="message" class="formLabel">Message</label>
                                <input type="tel" placeholder="write your message.." name="message" class="form-control no-border">
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