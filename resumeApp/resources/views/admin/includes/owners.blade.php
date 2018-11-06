<div role="tabpanel" class="tab-pane" id="owners">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Code</th>
        </tr>
        </thead>
        <tbody>
        <? $i=1; ?>
        <? foreach ($owners as $owner):?>
        <tr id="selectedRowOwner{{$owner->id}}">
            <th scope="row">
                <!-- check boxes -->
                <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                    <input  style="@if($errors->has('availableHours')) border:1px solid red; @endif" class="form-check-input" id="selectedOwner{{$owner->id}}" type="checkbox" name="selectedOwners[]" value="{{$owner->id}}">
                    <span class="checkmark"></span>
                </label>
            </th>
            <td>{{$owner->name}}</td>
            <td>{{$owner->email}}</td>
            <td>{{$owner->code}}</td>
        </tr>

        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>