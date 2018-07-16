<div role="tabpanel" class="panel tab-pane fade in" id="pay">
    <div class="panelHeading">
        <ul>
            <li>
                Availability and Payment
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <? $workingHours = ['10 Hours per Week','20 Hours per Week','30 Hours per Week','40 Hours per week'] ;?>
            <label style="border-bottom:1px lightgray solid ; padding: 2px;" class="panelFormLabel">Current available hours <span style="font-size:small;">*</span> <span id="tickMarkavailableHours" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <? $k=1 ?>
                <div class="form-check">
                    @foreach($workingHours as $option)
                    <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">{{$option}}
                        <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="hours{{$k}}" type="checkbox" name="availableHours[]" value="{{$option}}"
                               <? if(in_array($option,$availableHoursCheckBox)): ?> checked <?endif;?> >
                        <span class="checkmark"></span>
                    </label>
                        <? $k++; ?>
                    @endforeach
                </div>
        </div>  <!-- Hours availabel -->
    </div>

    <?$days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];?>

    <div class="row">
        <div class="form-group col-md-12">
            <hr>
            <label for="audio_intro" class="panelFormLabel">Expected Salary in (US Dollars ) USD per hour <span style="font-size:small;">*</span> <span id="tickMarksalary" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label><br/>
            <div>
                <input type="text"  style="@if($errors->has('salary')) border:1px solid red; @endif" class="form-control panelFormInput d-inline-block col-md-4" id="salary" name="salary" value="<? if(!empty($salary)){echo $salary;}else{echo '';}?>">
                <input class="form-control panelFormInput d-inline-block col-md-4" id="currency" name="currency" value="USD">
            </div>
            <? foreach($availableHoursCheckBox as $check):?>
                <? $hours  = (int)filter_var($check, FILTER_SANITIZE_NUMBER_INT) ?? 1 ;
                $salary = (int) $salary ;  ?>
            <? endforeach;?>
            <? for($i=1;$i<=4;$i++ ):?>
            <p id="paidSalary{{$i}}" class="d-none panelFormLabel">At <span id="paidDays{{$i}}"></span> you will be paid <span id="totalPaid{{$i}}">{{$salary * $hours}}</span> usd </p>
            <? endfor;?>
        </div>  <!-- Salary  -->
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <hr>
            <label for="timeZone" class="panelFormLabel">Time zone</label><span id="tickMarktimeZone" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span>
            <div class="">
                <select class="form-control col-md-4" style="height: 50px;" id="timeZone" name="timeZone">
                    <option value="" selected="selected">Select your timezone</option>
                    <option value="GMT-5:00" <? if($timeZone == "GMT-5:00"){echo 'selected';}?> >(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                    <option value="GMT-6:00" <? if($timeZone == "GMT-6:00"){echo 'selected';}?> >(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                    <option value="GMT-7:00" <? if($timeZone == "GMT-7:00"){echo 'selected';}?> >(GMT -7:00) Mountain Time (US & Canada)</option>
                    <option value="GMT-8:00" <? if($timeZone == "GMT-8:00"){echo 'selected';}?> >(GMT -8:00) Pacific Time (US & Canada)</option>
                    <option value="GMT-9:00" <? if($timeZone == "GMT-9:00"){echo 'selected';}?> >(GMT -9:00) Alaska</option>
                    <option value="">--------------</option>
                    <option value="GMT-12:00" <? if($timeZone == "GMT-12:00"){echo 'selected';}?>>(GMT -12:00) Eniwetok, Kwajalein</option>
                    <option value="GMT-11:00" <? if($timeZone == "GMT-11:00"){echo 'selected';}?>>(GMT -11:00) Midway Island, Samoa</option>
                    <option value="GMT-10:00" <? if($timeZone == "GMT-10:00"){echo 'selected';}?>>(GMT -10:00) Hawaii</option>
                    <option value="GMT-9:30" <? if($timeZone == "GMT-9:30"){echo 'selected';}?>>(GMT -9:30) Taiohae</option>
                    <option value="GMT-9:00" <? if($timeZone == "GMT-9:00"){echo 'selected';}?> >(GMT -9:00) Alaska</option>
                    <option value="GMT-8:00" <? if($timeZone == "GMT-8:00"){echo 'selected';}?> >(GMT -8:00) Pacific Time (US & Canada)</option>
                    <option value="GMT-7:00" <? if($timeZone == "GMT-7:00"){echo 'selected';}?> >(GMT -7:00) Mountain Time (US & Canada)</option>
                    <option value="GMT-6:00" <? if($timeZone == "GMT-6:00"){echo 'selected';}?> >(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                    <option value="GMT-5:00" <? if($timeZone == "GMT-5:00"){echo 'selected';}?> >(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                    <option value="GMT-4:30" <? if($timeZone == "GMT-4:30"){echo 'selected';}?>>(GMT -4:30) Caracas</option>
                    <option value="GMT-4:00" <? if($timeZone == "GMT-4:00"){echo 'selected';}?>>(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                    <option value="GMT-3:30" <? if($timeZone == "GMT-3:30"){echo 'selected';}?>>(GMT -3:30) Newfoundland</option>
                    <option value="GMT-3:00" <? if($timeZone == "GMT-3:00"){echo 'selected';}?>>(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                    <option value="GMT-2:00" <? if($timeZone == "GMT-2:00"){echo 'selected';}?>>(GMT -2:00) Mid-Atlantic</option>
                    <option value="GMT-1:00" <? if($timeZone == "GMT-1:00"){echo 'selected';}?>>(GMT -1:00) Azores, Cape Verde Islands</option>
                    <option value="GMT+0:00" <? if($timeZone == "GMT+0:00"){echo 'selected';}?>>(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca</option>
                    <option value="GMT+1:00" <? if($timeZone == "GMT+1:00"){echo 'selected';}?>>(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                    <option value="GMT+2:00" <? if($timeZone == "GMT+2:00"){echo 'selected';}?>>(GMT +2:00) Kaliningrad, South Africa</option>
                    <option value="GMT+3:00" <? if($timeZone == "GMT+3:00"){echo 'selected';}?>>(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                    <option value="GMT+3:30" <? if($timeZone == "GMT+3:30"){echo 'selected';}?>>(GMT +3:30) Tehran</option>
                    <option value="GMT+4:00" <? if($timeZone == "GMT+4:00"){echo 'selected';}?>>(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                    <option value="GMT+4:30" <? if($timeZone == "GMT+4:30"){echo 'selected';}?>>(GMT +4:30) Kabul</option>
                    <option value="GMT+5:00" <? if($timeZone == "GMT+5:00"){echo 'selected';}?>>(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                    <option value="GMT+5:30" <? if($timeZone == "GMT+5:30"){echo 'selected';}?>>(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                    <option value="GMT+5:45" <? if($timeZone == "GMT+5:45"){echo 'selected';}?>>(GMT +5:45) Kathmandu, Pokhara</option>
                    <option value="GMT+6:00" <? if($timeZone == "GMT+6:00"){echo 'selected';}?>>(GMT +6:00) Almaty, Dhaka, Colombo</option>
                    <option value="GMT+6:30" <? if($timeZone == "GMT+6:30"){echo 'selected';}?>>(GMT +6:30) Yangon, Mandalay</option>
                    <option value="GMT+7:00" <? if($timeZone == "GMT+7:00"){echo 'selected';}?>>(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                    <option value="GMT+8:00" <? if($timeZone == "GMT+8:00"){echo 'selected';}?>>(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                    <option value="GMT+8:45" <? if($timeZone == "GMT+8:45"){echo 'selected';}?>>(GMT +8:45) Eucla</option>
                    <option value="GMT+9:00" <? if($timeZone == "GMT+9:00"){echo 'selected';}?>>(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                    <option value="GMT+9:30" <? if($timeZone == "GMT+9:30"){echo 'selected';}?>>(GMT +9:30) Adelaide, Darwin</option>
                    <option value="GMT+10:00" <? if($timeZone == "GMT+10:00"){echo 'selected';}?>>(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                    <option value="GMT+10:30" <? if($timeZone == "GMT+10:30"){echo 'selected';}?>>(GMT +10:30) Lord Howe Island</option>
                    <option value="GMT+11:00" <? if($timeZone == "GMT+11:00"){echo 'selected';}?>>(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                    <option value="GMT+11:30" <? if($timeZone == "GMT+11:30"){echo 'selected';}?>>(GMT +11:30) Norfolk Island</option>
                    <option value="GMT+12:00" <? if($timeZone == "GMT+12:00"){echo 'selected';}?>>(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                    <option value="GMT+12:45" <? if($timeZone == "GMT+12:45"){echo 'selected';}?>>(GMT +12:45) Chatham Islands</option>
                    <option value="GMT+13:00" <? if($timeZone == "GMT+13:00"){echo 'selected';}?>>(GMT +13:00) Apia, Nukualofa</option>
                    <option value="GMT+14:00" <? if($timeZone == "GMT+14:00"){echo 'selected';}?>>(GMT +14:00) Line Islands, Tokelau</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12" >
            <label class="panelFormLabel">
                Please show the specific times for each day that you are available to work (in your local timezone) :
            </label>
            <div class="row">
                <div class="col-md-2">

                </div> <div class="col-md-4 text-left">
                    <b class="panelFormLabel">From</b>
                </div> <div class="col-md-4 text-left">
                    <b class="panelFormLabel">To</b>
                </div>
            </div>
            <? $totalHours = 0 ;?>
            <? foreach ($days as $day):?>
            <?
            $DBColumn = $day.'Hours';
            $hours = $currFreelancer = auth()->user()->userData->{$DBColumn};
            $hoursArr = explode(',',$hours);
            $from = $hoursArr[0] ?? '';
            $to   = $hoursArr[1] ?? '';
            if(!empty($from) || !empty($to)){
                if(is_numeric($from) && is_numeric($to)){
                    if($to < $from){
                        $hoursDay = 24 + ( $to-$from);
                    }
                    $totalHours += $hoursDay ;
                }
            }
            ?>
            <div class="row">
                <div class="col-md-2" style="padding-top: 15px; 	color: #697786; font-family: Roboto;	font-size: 14px;">
                    <b>{{$day}}</b>
                </div>
                <div class="input-group col-md-4" style="margin: 2px;">
                    <select class="custom-select panelFormLabel" id="{{$day}}From" name="{{$day}}From" style="height: 50px;">
                        <option  selected ="" value="">From</option>
                        <? for($i=0;$i<=24;$i++):?>
                        <option value="{{$i}}" <? if($i == $from):?>selected<?endif;?> ><?if($i<10):?>0<?endif;?>{{$i}}:00</option>
                        <? endfor;?>
                    </select>
                </div>
                <div class="input-group col-md-4" style="margin: 2px;">
                    <select class="custom-select panelFormLabel" id="{{$day}}To" name="{{$day}}To" style="height: 50px;">
                        <option selected value="">To</option>
                        <? for($i=0;$i<=24;$i++):?>
                        <option value="{{$i}}" <? if($i == $to):?>selected<?endif;?>><?if($i<10):?>0<?endif;?>{{$i}}:00</option>
                        <? endfor;?>
                    </select>
                </div>
            </div>
            <? endforeach;?>
            <div style="padding-top: 20px;" class="col-md-6 col-sm-12 col-xs-12 input-group">
                <b class="panelFormLabel">Total working hours of a week : <span id="totalHours">{{$totalHours}} Hours</span></b>
            </div>
        </div> <!-- Hours per week Dropdowns --><br/>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <hr>
            <div class="panelFormLabel">
                If you are currently employed / have ongoing projects and will be available for work in the future please select a date in the future that you will be free , if you are currently available please select todays date.
                <label for="freeDate" class="panelFormLabel"><span id="tickMarkfreeDate" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            </div>
            <input type="date" class="form-control panelFormInput" name="freeDate" value="<? if(!empty($freeDate)){ echo $freeDate;} else {echo date('Y-m-d');} ?>">
        </div>
    </div>

    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#multimedia">Next</a>
        </div>
    </div>
</div>
