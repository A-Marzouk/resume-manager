<template>
    <div>
        <div class="hold-tab wrapp">
            <div class="input-field">
                <label for="profilelink">New language</label>
                <input type="text" placeholder=""  id="profilelink" name="profilelink">
            </div>
            <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-check.png">Add language now</a>
            <a href="" class="btn-outline ml-5">Auto import</a>
            <ul class="lang-items">
                <li class="lang-item">
                    <img class="flagLang" src="/images/resume_builder/profile/flag-france.png" alt="">
                    <span class="nameLang">French</span>
                    <span class="input-select dropdown __md">
                            <button class="audio-options dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Option
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">
                                    <svg-vue class="option-icon" icon="edit-icon"></svg-vue>Edit
                                </a>
                                <a class="dropdown-item" href="#">
                                    <svg-vue class="option-icon" icon="trash-delete-icon"></svg-vue>Delete
                                </a>
                            </div>
                        </span>
                </li>
            </ul>
        </div>
    </div>
</template>