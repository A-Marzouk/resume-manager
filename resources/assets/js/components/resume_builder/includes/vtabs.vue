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
.v-tabs{
    max-height: 85px;
    font-family: 'Noto Sans';

    .v-tabs__div{
        margin-right: 12%;
        
        &:last-child{
            margin: 0;
        }
    }

    .v-tabs__wrapper{
        position: relative;

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
    
}
</style>