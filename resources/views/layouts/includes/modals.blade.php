<!-- Modals -->
<div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="row">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <img src="/images/newResume/123wf_logo.png" alt="logo" width="250">
        </div>
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12">
                    <div>
                        <div class="customFormHeader col-md-12 text-left" style="background: white;">{{ __('Client Register') }}
                            <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color: blue;font-size: 35px;font-weight: 300;">&times;</span>
                            </button>
                        </div>

                        <form method="POST" class="clientForm" action="{{ route('client.register.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agency" class="formLabelModal">{{ __('Agency/Business name') }}</label>
                                        <div>
                                            <input id="agency" type="text" class="panelFormInput form-control{{ $errors->has('ageny') ? ' is-invalid' : '' }}" name="agency" value="{{ old('agency') }}" required autofocus>
                                            @if ($errors->has('agency'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('agency') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- Agency / Name --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="formLabelModal">{{ __('Contact person') }}</label>
                                        <div class="">
                                            <input id="nameModal" type="text" class="panelFormInput form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- contact person --}}
                                </div>

                                <div class="col-md-6"> <div class="form-group">
                                        <label for="email" class="formLabelModal">{{ __('E-Mail Address') }}</label>
                                        <div class="">
                                            <input id="email2" type="email" class="panelFormInput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- email --}}</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="formLabelModal" style="font-size: 12px;">{{ __('E-Mail Address accounts dept') }}</label>

                                        <div>
                                            <input id="emailDept" type="email" class="panelFormInput form-control{{ $errors->has('emailDept') ? ' is-invalid' : '' }}" name="emailDept" value="{{ old('emailDept') }}" required>

                                            @if ($errors->has('emailDept'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('emailDept') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- email dept--}}
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="formLabelModal">{{ __('Phone') }}</label>

                                        <div class="">
                                            <input id="phone" type="tel" class="panelFormInput form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--phone--}}
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="timeZone" class="formLabelModal">{{ __('Time zone') }}</label>

                                        <div class="">
                                            <select class="form-control" id="timeZone" name="timeZone" style="height: 50px;">
                                                <option value="" selected="selected">Select your timezone</option>
                                                <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                                <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                                <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US & Canada)</option>
                                                <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US & Canada)</option>
                                                <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                                <option value="">--------------</option>
                                                <option value="(GMT -12:00) Eniwetok, Kwajalein">(GMT -12:00) Eniwetok, Kwajalein</option>
                                                <option value="(GMT -11:00) Midway Island, Samoa">(GMT -11:00) Midway Island, Samoa</option>
                                                <option value="(GMT -10:00) Hawaii">(GMT -10:00) Hawaii</option>
                                                <option value="(GMT -9:30) Taiohae">(GMT -9:30) Taiohae</option>
                                                <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                                <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US & Canada)</option>
                                                <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US & Canada)</option>
                                                <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                                <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                                <option value="(GMT -4:30) Caracas">(GMT -4:30) Caracas</option>
                                                <option value="(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                                                <option value="(GMT -3:30) Newfoundland">(GMT -3:30) Newfoundland</option>
                                                <option value="(GMT -3:00) Brazil, Buenos Aires, Georgetown">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                                <option value="(GMT -2:00) Mid-Atlantic">(GMT -2:00) Mid-Atlantic</option>
                                                <option value="(GMT -1:00) Azores, Cape Verde Islands">(GMT -1:00) Azores, Cape Verde Islands</option>
                                                <option value="(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca">(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca</option>
                                                <option value="(GMT +1:00) Brussels, Copenhagen, Madrid, Paris">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                <option value="(GMT +2:00) Kaliningrad, South Africa">(GMT +2:00) Kaliningrad, South Africa</option>
                                                <option value="(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                                <option value="(GMT +3:30) Tehran">(GMT +3:30) Tehran</option>
                                                <option value="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                                <option value="(GMT +4:30) Kabul">(GMT +4:30) Kabul</option>
                                                <option value="(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                                <option value="(GMT +5:30) Bombay, Calcutta, Madras, New Delhi">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                                <option value="(GMT +5:45) Kathmandu, Pokhara">(GMT +5:45) Kathmandu, Pokhara</option>
                                                <option value="(GMT +6:00) Almaty, Dhaka, Colombo">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                                <option value="(GMT +6:30) Yangon, Mandalay">(GMT +6:30) Yangon, Mandalay</option>
                                                <option value="(GMT +7:00) Bangkok, Hanoi, Jakarta">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                                <option value="(GMT +8:00) Beijing, Perth, Singapore, Hong Kong">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                                <option value="(GMT +8:45) Eucla">(GMT +8:45) Eucla</option>
                                                <option value="(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                                <option value="(GMT +9:30) Adelaide, Darwin">(GMT +9:30) Adelaide, Darwin</option>
                                                <option value="(GMT +10:00) Eastern Australia, Guam, Vladivostok">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                                <option value="(GMT +10:30) Lord Howe Island">(GMT +10:30) Lord Howe Island</option>
                                                <option value="(GMT +11:00) Magadan, Solomon Islands, New Caledonia">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                                <option value="(GMT +11:30) Norfolk Island">(GMT +11:30) Norfolk Island</option>
                                                <option value="(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                                                <option value="(GMT +12:45) Chatham Islands">(GMT +12:45) Chatham Islands</option>
                                                <option value="(GMT +13:00) Apia, Nukualofa">(GMT +13:00) Apia, Nukualofa</option>
                                                <option value="(GMT +14:00) Line Islands, Tokelau">(GMT +14:00) Line Islands, Tokelau</option>
                                            </select>
                                            @if ($errors->has('timeZone'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('timeZone') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--time zone--}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="formLabelModal">{{ __('Password') }}</label>

                                        <div class="">
                                            <input id="passwordModal" type="password" class="panelFormInput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--pass--}}
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password-confirm" class="formLabelModal">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="panelFormInput form-control" name="password_confirmation" required>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    {{-- pass confirm --}}
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="buttonMain text-center" style="padding-top: 0;">
                                    <button type="submit" class="col-md-5 hireBtn" style="padding: 3.5% 14% 3.5% 14%;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="smallText">Already have an account?<span> <a href="/client/login"> Log in!</a></span></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- login modal --}}
<div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95); padding-right: 3px!important;" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content login-modal-content">
            <div class="modal-body p-0">
                @include('auth.login_tabs')
            </div>
        </div>
    </div>
</div>

{{-- Talk to sells modal --}}
<div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="talkToSales" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="row">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <img src="/images/newResume/123wf_logo.png" alt="logo" width="250">
        </div>
    </div>
    <div class="modal-dialog" role="document" style="max-width: 400px;">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12">
                    <div>
                        <div class="customFormHeader col-md-12 text-left" style="background: white;">{{ __('Talk to sales') }}
                            <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color: blue;font-size: 35px;font-weight: 300;">&times;</span>
                            </button>
                        </div>
                        <div>
                            <form method="POST" class="clientForm" action="{{ route('message.to.sales') }}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="formLabelModal">{{ __('Your e-mail Address') }}</label>

                                            <div class="">
                                                <input id="emailModal" type="email" class="panelFormInput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="subject" class="formLabelModal">{{ __('Subject') }}</label>


                                            <div>
                                                <input id="subject" type="text" class="panelFormInput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="subject" required>

                                                @if ($errors->has('subject'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="message" class="panelFormLabel">Message</label>
                                            <textarea class="form-control" rows="3" id="message" name="message" required>

                                            </textarea>
                                            @if ($errors->has('message'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="buttonMain text-center">
                                                <button type="submit" class="col-md-8 hireBtn">
                                                    {{ __('Send') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
