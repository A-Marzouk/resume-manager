<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/admin-front">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                NEW AGENT (DESIGNER)
            </div>
        </nav>
        <div class="d-flex justify-content-center">
            <div class="main-grid" style="min-height: 611px;">
                <div class="header-text d-flex align-items-center">
                    <img src="/images/admin/main_40px.svg" alt=""  class="icon-margin small-image">
                    <div>
                        REGISTRATION OF A NEW AGENT (DESIGNER)
                    </div>
                </div>
                <hr />
                <div class="account-edit-section-inputs">
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            To add a new designer please type a Behance link:
                        </label>
                        <div class="faq-input">
                            <input type="text"
                                   name="faq"
                                   placeholder="Type Behance link here">
                            <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                        </div>
                    </div>
                </div>
                <div class="account-edit-section-edit-btn no-decoration justify-content-lg-center"
                     :class="{'disabled-btn' : !canSubmit}">
                    <a href="javascript:void(0)">
                        ADD A DESIGNER
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                canSubmit: false,
            }
        },
    }
</script>

<style scoped>

</style>