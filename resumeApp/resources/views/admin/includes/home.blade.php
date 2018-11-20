<div role="tabpanel" class="tab-pane active" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-10 addDesigner">
                <form action="/freelancer/behance/save_user" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="languages"  class="panelFormLabel">Add a designer from Behance</label>
                        <input type="text" placeholder="Behance user profile link.." class="form-control panelFormInput" id="languages" name="behanceDesignerLink" value="" required>
                    </div>
                    <div class="buttonMain">
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