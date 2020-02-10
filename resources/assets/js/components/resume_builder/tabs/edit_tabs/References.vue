<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>References</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="achievements-bar">
                <div class="bar-item" :class="{ active : selectedTab === 'References'}" @click="selectedTab = 'References'">
                    References
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Referee'}" @click="selectedTab = 'Referee'">
                    Referee
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Testimonials'}" @click="selectedTab = 'Testimonials'">
                    Testimonials
                </div>
            </div>

            <div class="references">
                <div class="reference-input">
                    <label for="name">
                        My full-name
                    </label>
                    <input type="text" placeholder="John smith" id="name">
                </div>
                <div class="reference-input">
                    <label for="title">
                        Title / Position
                    </label>
                    <input type="text" placeholder="Head of Operations " id="title">
                </div>
                <div class="reference-input">
                    <label for="phone">
                        Phone
                    </label>
                    <input type="text"  id="phone" placeholder="(678) 757 9413">
                </div>
                <div class="reference-input">
                    <label for="email">
                        My full-name
                    </label>
                    <input type="text" placeholder="joelle.smith@swiftbanking.com" id="email">
                </div>
                <div class="reference-input">
                    <label for="company">
                        Company
                    </label>
                    <input type="text"  id="company" placeholder="SwiftBanking.com">
                </div>
                <div class="reference-input">
                    <label for="adresse">
                        Address
                    </label>
                    <input type="text" placeholder="134 Rightward Way (Address) Portland, ME, 04019" id="adresse">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "References",
        data() {
            return {
                selectedTab: 'References',
            }
        }
    }
</script>

<style scoped lang="scss">

    .section-body-wrapper {
        width: 1337px;
        .achievements-bar {
            display: flex;
            width: 100%;
            justify-content: space-between;
            margin-top: 75px;
            border-bottom: 3px solid #C9CFF8;
            padding-right: 50px;

            .bar-item {
                font: 700 35px Noto Sans;
                letter-spacing: 0;
                color: #505050;
                opacity: 1;
                padding-bottom: 23px;
                margin-bottom: -3px;
                border-bottom: 3px solid #C9CFF8;
                transition: all 300ms ease-in;
            }

            .bar-item:hover {
                cursor: pointer;
            }

            .bar-item.active {
                color: #001CE2;
                border-bottom-color: #001CE2;
            }
        }

        .references{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top:45px;

            .reference-input{
                margin-bottom: 60px;
                display: flex;
                flex-direction: column;
                input {
                    width: 585px;
                    height: 68px;
                    border: 1.5px solid #001CE2;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                }
                input:focus {
                    outline: none;
                }

                label {
                    text-align: left;
                    font: 600 20px Noto Sans;
                    letter-spacing: 0;
                    opacity: 1;
                    color: #001ce2;
                }
            }
        }

    }
</style>
