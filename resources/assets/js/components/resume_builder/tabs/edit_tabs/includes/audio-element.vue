<template>
    <div class="audio-element">
        <div class="audio-name">{{name}}</div>
        <div class="audio-player d-flex align-items-center">
            <svg-vue class="play-icon" icon="play-icon"></svg-vue>
            <svg-vue class="sound-frecuency" icon="sound-frecuency"></svg-vue>

            <div class="order-controls d-flex flex-column">
                <button class="icon">
                    <svg-vue icon="arrow-up"></svg-vue>
                </button>
                <button class="icon">
                    <svg-vue icon="arrow-down"></svg-vue>
                </button>
            </div>
            
            <div class="select-audio-options">
                <select class="audio-options" name="options" id="">
                    <option value="">Option</option>
                    <option value="edit">Edit</option>
                    <option value="delete">Delete</option>
                </select>
                <svg-vue class="caret-icon" icon="caret-icon"></svg-vue>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['name'],
    data: () => ({
    })
}
</script>

<style lang="scss">
$mainBlue: #001CE2; 
    .audio-element {
        position: relative;
        margin-bottom: 50px;
        
        .audio-name {
            font-family: "Noto Sans", Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .order-controls {
            right: -27px;
            position: absolute;
            z-index: 2;

            .icon {
                padding: 0 !important;
                background: none;
                border: none;
                outline:none;
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;

                svg {
                    width: 12px;
                    height: 6px;
                }
                
                &:first-child {
                    margin-bottom: 15px;
                }
            }
        }

        .select-audio-options {
            position: absolute;
            bottom: 7px;
            right: 19px;
            height: 22px;
            font-size: 10px;
            border-radius: 5px;
            border: 1px solid $mainBlue;
            width: 67px;
            display: flex;
            align-items: center;
            
            .audio-options {
                padding: 0 8px;
                background: none;
                height: 100%;
                width: 100%;
                border: none;

                -webkit-appearance:none;
                -moz-appearance:none;
                appearance:none;
            }

            .caret-icon {
                position: absolute;
                z-index: 3;
                height: 5px;
                width: 10px;
                right: 6px;
            }
        }
    }

    .audio-player {
        border: 1px solid $mainBlue;
        border-radius: 25px;
        height: 91px;
        width: 429px;
        padding-left: 36px;

        .play-icon {
            width: 30px;
        }

        .sound-frecuency {
            width: 254px;
            margin-left: 25px;
        }
    }
</style>