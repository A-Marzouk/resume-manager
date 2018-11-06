<div role="tabpanel" class="tab-pane active" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-5 addDesigner">
                <form action="{{route('add.owner')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for=""  class="panelFormLabel">Add new owner</label>
                        <input type="text" style="@if($errors->has('ownerName')) border:1px solid red; @endif" placeholder="Name" class="form-control panelFormInput"  name="ownerName" value="" required>
                        @if($errors->has('ownerName'))
                            <small style="color:red;">
                                <strong>{{ $errors->first('ownerName') }}</strong>
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Email" style="@if($errors->has('ownerEmail')) border:1px solid red; @endif"  class="form-control panelFormInput" name="email" value="" required>
                        @if($errors->has('email'))
                            <small style="color:red;">
                                <strong>{{ $errors->first('email') }}</strong>
                             </small>
                        @endif
                    </div>
                    <div class="buttonMain">
                        <button type="submit" class="btn-block hireBtn">Add owner</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5 addDesigner offset-md-1">
                <form action="/freelancer/behance/save_user" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="languages"  class="panelFormLabel">Add a designer from Behance</label>
                        <input type="text" placeholder="Behance user profile link.." class="form-control panelFormInput" id="languages" name="behanceDesignerLink" value="" required>
                    </div>
                    <div class="buttonMain" style="margin-top: 86px;">
                        <button type="submit" class="btn-block hireBtn">Add Behance designer</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 adminBox">
                <p class="panelFormLabel" style="font-size: 18px;"># Freelancers</p>
                <p class="panelFormLabel"> Total : {{count($users)}} </p>
            </div>

            <div class="col-md-2 adminBox">
                <p class="panelFormLabel" style="font-size: 20px;"># Clients</p>
                <p class="panelFormLabel"> Total : {{count($clients)}} </p>
            </div>
        </div>
    </div>
</div>