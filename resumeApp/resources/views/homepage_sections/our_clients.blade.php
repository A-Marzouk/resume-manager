<div id="ourClients">
    <div class="heading">
        <h2>
            We’re here to help you get started today
        </h2>
    </div>
    <div class="row clientsBox">
        <div class="col-md-6 leftSide">
            <div class="secondSectionHeading">
                We love<br/><span>Our clients.</span>
                <div class="lineDivider"></div>
            </div>
            <div class="talentText">
                Register your company today & we will connect you with the talent you need.
            </div>
        </div>
        <div class="col-md-6 rightSide">
            <form id="contact-form" method="POST" class="clientForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div><label for="bussinessName" class="formLabel">Business Name</label></div>
                            <input type="text" id="bussinessName" name="Business Name" placeholder=""
                                   class="form-control panelFormInput">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="name" class="formLabel">Name *</label>
                        </div>
                        <input type="text" placeholder="" id="name" name="Name" required="required"
                               class="form-control panelFormInput">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <label for="telephone" class="formLabel">Telephone *</label>
                        </div>
                        <input type="tel" placeholder="" name="" class="panelFormInput form-control">
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="telephone" class="formLabel">Email *</label>
                        </div>
                        <input type="text" placeholder="" name="Email" required="required"
                               class="form-control panelFormInput">
                    </div>
                </div>
                <div class="row" style="padding-top:25px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="checkBoxText form-check-label checkBoxContainer">
                                <input type="checkbox" id="bookkeper" name="bookkeper" {{ old('remember') ? 'checked' : '' }} checked>
                                I need a Designer
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="checkBoxText form-check-label checkBoxContainer">
                                <input type="checkbox" id="accountant" name="accountant"{{ old('remember') ? 'checked' : '' }}>
                                I need a Developer
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="telephone" class="formLabel">Form of employment</label>
                        <select name="Select-time" class="form-control" style="height: 50px;">
                            <option value="partTime">Part time</option>
                            <option value="fullTime">Full time</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="buttonMain col-md-6 offset-md-3" style="padding-bottom: 30px;">
                        <input type="submit" value="Send" class="hireBtn btn-block" style="border: 0;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>