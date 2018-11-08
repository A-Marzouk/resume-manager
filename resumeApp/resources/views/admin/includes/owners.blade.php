<div role="tabpanel" class="tab-pane" id="owners">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Unique FREELANCER invite link</th>
            <th scope="col">Unique CLIENT invite link</th>
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
            <td>
                <span class="oneLineHiddenOverflow" id="uniqueLink_{{$owner->id}}">Https://123workforce.com/freelancer/workforce/register?ownerCode={{$owner->code}}</span>
                <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm copyLinkBtn" id="copyLinkBtn_{{$owner->id}}">Copy</a>
            </td>
            <td>
                <span class="oneLineHiddenOverflow" id="uniqueClientLink_{{$owner->id}}">Https://123workforce.com/client/register?ownerCode={{$owner->code}}</span>
                <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm copyClientLinkBtn" id="copyClientLinkBtn_{{$owner->id}}">Copy</a>
            </td>

        </tr>

        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>