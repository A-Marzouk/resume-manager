<template>
    <div class="hold-edit">
        <img class="user-cover" src="/images/resume_builder/default-user.jpg" alt="">
        <div class="upload-section">
            <h5>Change profile photo</h5>
            <p>Only use images that are greater than 500 pixels in both height and width.</p>
            <div class="choose-photo-btn">
                <a href="javascript:void(0)">
                    <img src="/images/resume_builder/profile/icon-file.png" alt="">
                    Choose photo now
                </a>
            </div>
        </div>
        <form class="form-edit_profile">
            <div class="input-field">
                <label for="fullname">My full-name</label>
                <input type="text" placeholder="" id="fullname" name="fullname">
            </div>
            <div class="input-field">
                <label for="email">Email adress</label>
                <input type="email" id="email" placeholder="" name="email">
            </div>
            <div class="input-field">
                <label for="designation">Designation</label>
                <input type="text" id="designation" placeholder="" name="designation">
            </div>
            <div class="input-field">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" placeholder="" name="phone">
            </div>
            <div class="input-field">
                <label for="aboutmyself">About myself <i class="hint-message">Maximum 80 words</i></label>
                <textarea name="aboutmyself"  id="aboutmyself"></textarea>
            </div>
            <div class="actions">
                <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-save.png">Save all information</a>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    
}
</script>

<style scope lang="scss">
    
</style>