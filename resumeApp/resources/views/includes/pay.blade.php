<div role="tabpanel" class="panel tab-pane fade in" id="pay">
    <div class="panelHeading">
        <ul>
            <li>
                Availability and Payment
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <? $workingHours = ['10 Hours per Week','20 Hours per Week','30 Hours per Week','40 Hours per week'] ;?>
            <label style="border-bottom:1px lightgray solid ; padding: 2px;" class="panelFormLabel">Current available hours <span id="tickMarkavailableHours" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <? $k=1 ?>
            @foreach($workingHours as $option)
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="hours{{$k}}" type="checkbox" name="availableHours[]" value="{{$option}}"
                               <? if(in_array($option,$availableHoursCheckBox)): ?> checked <?endif;?> >
                        {{$option}}
                    </label>
                </div>
                <? $k++; ?>
            @endforeach
        </div>  <!-- Hours availabel -->

        <div class="form-group col-md-6">
            <label for="audio_intro" class="panelFormLabel">Expected Salary in (US Dollars ) USD per hour <span id="tickMarksalary" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label><br/>
            <div>
                <input type="text" style="padding: 4px 2px 8px 2px;" class="form-control panelFormInput d-inline-block col-md-2" id="salary" name="salary" value="<? if(!empty($salary)){echo $salary;}else{echo 0;}?>">
                <input style="padding: 4px 2px 8px 2px;" class="form-control panelFormInput d-inline-block col-md-2" id="currency" name="currency" value="USD">
            </div>
            <? foreach($availableHoursCheckBox as $check):?>
                <? $hours  = (int)filter_var($check, FILTER_SANITIZE_NUMBER_INT) ?? 1 ;
                $salary = (int) $salary ;  ?>
            <? endforeach;?>
            <? for($i=1;$i<=4;$i++ ):?>
            <p id="paidSalary{{$i}}" class="d-none salaryText">At <span id="paidDays{{$i}}"></span> you will be paid <span id="totalPaid{{$i}}">{{$salary * $hours}}</span> usd </p>
            <? endfor;?>
        </div>  <!-- Salary  -->
        <?$days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];?>
        <div class="form-group col-md-12" >
            <label style="border-bottom:1px lightgray solid ; padding: 2px;" class="panelFormLabel">hours you are available everyday Please show the specific times for each day that you are available to work (in your local timezone) : </label>
            <div class="row">
                <div class="col-md-2">

                </div> <div class="col-md-2 text-center">
                    <b>From</b>
                </div> <div class="col-md-2 text-center">
                    <b>To</b>
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
                    $totalHours += $to-$from ;
                }
            }
            ?>
            <div class="row">
                <div class="col-md-2" style="padding-top: 6px;">
                    <b>{{$day}}</b>
                </div>
                <div class="input-group col-md-2" style="margin: 2px;">
                    <select class="custom-select panelFormLabel" id="{{$day}}From" name="{{$day}}From">
                        <option  selected disabled="" value="">From</option>
                        <? for($i=1;$i<=24;$i++):?>
                        <option value="{{$i}}" <? if($i == $from):?>selected<?endif;?> ><?if($i<10):?>0<?endif;?>{{$i}}:00</option>
                        <? endfor;?>
                    </select>
                </div>
                <div class="input-group col-md-2" style="margin: 2px;">
                    <select class="custom-select panelFormLabel" id="{{$day}}To" name="{{$day}}To">
                        <option selected disabled value="">To</option>
                        <? for($i=1;$i<=24;$i++):?>
                        <option value="{{$i}}" <? if($i == $to):?>selected<?endif;?>><?if($i<10):?>0<?endif;?>{{$i}}:00</option>
                        <? endfor;?>
                    </select>
                </div>
            </div>
            <? endforeach;?>
            <div style="padding-top: 10px;" class="col-md-6 col-sm-12 col-xs-12 input-group">
                <b style="border-radius: 5px; border: gray 2px solid; padding: 8px;">Total working hours of a week : <span id="totalHours">{{$totalHours}} Hours</span></b>
            </div>
        </div> <!-- Hours per week Dropdowns --><br/>
        <div class="form-group col-md-12">
            <div class="">
                If you are currently employed / have ongoing projects and will be available for work in the future please select a date in the future that you will be free , if you are currently available please select todays date.
                <label for="freeDate" class="panelFormLabel"><span id="tickMarkfreeDate" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            </div>
            <input type="date" class="form-control panelFormInput" name="freeDate" value="{{$freeDate}}">
        </div>
    </div>
    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#multimedia">Next</a>
        </div>
    </div>
</div>
