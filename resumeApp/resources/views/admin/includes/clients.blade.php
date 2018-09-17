<div role="tabpanel" class="tab-pane" id="clients">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Link to Profile</th>
            <th scope="col">View details</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <? $i=1; ?>
        <? foreach ($clients as $client):?>
        <tr id="selectedRowClient{{$client->id}}">
            <th scope="row">
                <!-- check boxes -->
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="selectedClient{{$client->id}}" type="checkbox" name="selectedClients[]" value="{{$client->id}}">
                    <span class="checkmark"></span>
                </label>
            </th>
            <td>{{$client->name}}</td>
            <td><a href="{{route('logInAsClient',$client->id)}}" target="_blank">Link to profile</a></td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#clientDetails{{$client->id}}">
                    Details
                </button>

                <!-- Modal -->
                <div class="modal fade" id="clientDetails{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$client->name}} - details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6"> Name :</div>
                                    <div class="col-md-6"> {{$client->name}}</div>

                                    <div class="col-md-6"> Email :</div>
                                    <div class="col-md-6"> {{$client->email}}</div>

                                    <div class="col-md-6"> Agency :</div>
                                    <div class="col-md-6"> {{$client->agency}}</div>

                                    <div class="col-md-6"> Email Dept :</div>
                                    <div class="col-md-6"> {{$client->emailDept}}</div>

                                    <div class="col-md-6"> Time zone :</div>
                                    <div class="col-md-6"> {{$client->timeZone}}</div>

                                    <div class="col-md-6"> Signing up date :</div>
                                    <div class="col-md-6"> {{ $client->created_at->format('d M Y - H:i:s') }}</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>

        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>