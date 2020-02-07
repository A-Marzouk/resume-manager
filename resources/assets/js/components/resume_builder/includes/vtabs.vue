<template>
    <v-tab
        :href="`#tab-${index}`"
        :ripple="false" 
        @click="clicked"
    >
        {{ item }}
    </v-tab>
</template>

<script>
export default {
    name: "vTabNames",
    props: {
        index:{
            type: Number
        },
        item: {
            type: String
        }
    },
    methods: {
        clicked() {
            this.$emit('clicked');
        }        
    }
}
</script>
<style lang="scss">
/** Styles general tabs */
@import '~vuetify/dist/vuetify.min.css';

.theme--light.v-tabs__bar{
    background-color: transparent;
}

.v-tabs{
    max-height: 85px;
    font-family: 'Noto Sans';

    .v-tabs__div{
        margin-right: 8%;
        
        &:last-child{
            margin: 0;
        }
    }

    .v-tabs__wrapper{
        position: relative;

        .v-tabs__container{
            justify-content: flex-start;
        }

        &::after{
            content: "";
            height: 4px;
            background: #C9CFF8;
            position: absolute;
            width: 100%;
            left: 0px;
            bottom: -1px;
            z-index: -1;
        }

    }
    .v-tabs__slider{
        height: 3px;
        
    }
    .v-tabs__item{
        text-transform: capitalize;
        padding: 0;
        text-align: left;
        font-weight: bold;
        font-size: 30px;
        color: #505050;
        text-decoration: none;
        min-width: 152px;
    }

    .v-tabs__slider-wrapper{
        min-width: 152px;
    }
    

    &.tabs_middle{

        margin: 0px auto 0px auto;

        .v-tabs__div{
            margin: 0;
            min-width: 150px;
            max-width: 100%;
        }

        .v-tabs__wrapper{

            .v-tabs__container{
                justify-content: space-between;
            }
        }
        .v-tabs__item{
            font-size: 24px;
            font-family: 'Noto Sans';
            line-height: 24px;
            color: #3C3748;
            min-width: auto;
            text-transform: none;
 
        }

        .v-tabs__slider-wrapper{
            min-width: 158px;
        }
    }
    &.tabs_inside{

        margin: 40px auto 0px auto;
        max-width: 98%;

        .v-tabs__div{
            margin: 0;
            min-width: 150px;
        }

        .v-tabs__wrapper{

            .v-tabs__container{
                justify-content: space-between;
            }
        }
        .v-tabs__item{
            font-size: 21px;
            font-family: 'Noto Sans';
            line-height: 28px;
            color: #3C3748;
            min-width: auto;
            text-transform: none;
 
        }

        .v-tabs__slider-wrapper{
            min-width: 158px;
        }
    }
}
</style>