<template>
    <div class="view-cv-wrapper">
        <div class="action-btns">
            <div class="change-structure-btn NoDecor">
                <a href="javascript:void(0)">
                    <img src="/images/resume_builder/viewCV/grid.png" alt="icon">
                    Change Structure
                </a>
            </div>
            <div class="change-theme-btn NoDecor">
                <a href="javascript:void(0)">
                    <img src="/images/resume_builder/viewCV/img-holder.png" alt="icon">
                    Change Theme
                </a>
            </div>
        </div>
        <div class="change-structure-text">
            <img src="/images/resume_builder/viewCV/grid-2.png" alt="icon">
            Change Structure
        </div>
        
        <div class="themes">
            <div class="theme-item">
                <img src="/images/resume_builder/viewCV/1.png" alt="theme-preview">
            </div>
            <div class="theme-item">
                <img src="/images/resume_builder/viewCV/3.png" alt="theme-preview">
            </div>
            <div class="theme-item">
                <img src="/images/resume_builder/viewCV/4.png" alt="theme-preview">
            </div>
            <div class="theme-item">
                <img src="/images/resume_builder/viewCV/1.png" alt="theme-preview">
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        name: "ViewCV"
    }
</script>

<style scoped lang="scss">
    .view-cv-wrapper{
        .action-btns{
            display: flex;
            justify-content: flex-end;

            .change-structure-btn{
                margin-right: 55px;

                a{

                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 221px;
                    height: 79px;
                    background: #001CE2;
                    border-radius: 50px;


                    font-family: "Noto Sans", serif;
                    font-weight: 500;
                    font-size: 16px;
                    text-align: left;
                    color: #ffffff;


                    img{
                        width: 25px;
                        height: 25px;
                        margin-right: 15px;
                    }
                }
            }
            .change-theme-btn{
                a{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 253px;
                    height: 79px;
                    border:2px solid #001CE2;
                    border-radius: 50px;

                    font-family: "Noto Sans", serif;
                    font-weight: 500;
                    font-size: 16px;
                    text-align: left;
                    color: #001ce2;

                    img{
                        width: 25px;
                        height: 25px;
                        margin-right: 15px;
                    }
                }
            }
        }
        .change-structure-text{
            margin-top:50px;
            display: flex;
            justify-content: flex-start;
            margin-left:140px;
            align-items: center;
            font-family: "Noto Sans",serif;
            font-weight: 500;
            font-size: 47px;
            text-align: left;
            color: #001ce2;

            img{
                width:90px;
                height:90px;
                margin-right: 55px;
            }
        }
        .themes{
            margin-left:140px;
            margin-top:60px;
            justify-content: space-between;
            display: flex;
            flex-wrap: wrap;
            .theme-item{
                margin-top:100px;
                img{
                    width:642px;
                    height:451px;
                }
            }
        }
    }
</style>
