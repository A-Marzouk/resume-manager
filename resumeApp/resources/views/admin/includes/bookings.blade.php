<div role="tabpanel" class="tab-pane" id="bookings">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client email</th>
            <th scope="col">Amount paid</th>
            <th scope="col">Hours / weeks</th>
            <th scope="col">Booked Freelancer</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($bookings as $booking):?>
        <tr id="selectedRowBooking{{$booking->id}}">
            <th scope="row">
                <?
                $clientName = 'Visitor' ;
                if($booking->client_id){
                    $clientName = App\Client::where('id',$booking->client_id)->first()->name ;
                }
                    $freelancer     = App\User::where('id',$booking->user_id)->first();

                    if(!$freelancer){
                        continue;
                    }
                ?>
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="selectedBooking{{$booking->id}}" type="checkbox" name="selectedBookings[]" value="{{$booking->id}}">
                    <span class="checkmark"></span>
                </label>
            </th>
            <td scope="row">{{$clientName}}</td>
            <td scope="row">{{$booking->amount_paid/100}} USD</td>
            <td scope="row">{{$booking->hours}} / {{$booking->weeks}}</td>
            <td scope="row">{{$freelancer->firstName}} {{$freelancer->lastName}}</td>
            <td scope="row">
                @if($booking->canceled)
                    <span class="panelFormLabel">Finished</span>
                @else
                    <span class="panelFormLabel" style="color: lightgreen;">On going</span>
                @endif
            </td>
            <td scope="row">
                {{$booking->created_at->format('M d, Y') }}
            </td>

        </tr>

        <? endforeach;?>
        </tbody>
    </table>
</div>