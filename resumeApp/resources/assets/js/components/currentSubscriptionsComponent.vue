<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">amount</th>
                <th scope="col">Cancel</th>
                <th scope="col">Payment Method</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(subscription,index) in paypal_subscriptions" v-bind:key="index">
                    <td>
                        {{subscription.id}}
                    </td>
                    <td scope="row">
                        {{subscription.title}}
                    </td>
                    <td>
                        {{subscription.price}} USD
                    </td>
                    <td scope="row">
                        <a v-show="subscription.payment_status !== 'canceled'" href="javascript:void(0)" @click="cancelPayPalSub(subscription.recurring_id)" class="btn btn-dark btn-small ">Cancel subscription</a>
                        <span style="color: blue;" v-show="subscription.payment_status === 'canceled'">Canceled</span>
                    </td>
                    <td>PayPal</td>
                </tr>
                <tr>
                    <th scope="row">

                    </th>
                    <td>
                    </td>
                    <th scope="row">

                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                paypal_subscriptions: [],
                stripe_subscriptions: [],
            }
        },
        methods:{
            getSubscriptions(){
                axios.get('/admin/get/subscriptions').then(
                    response => {
                        this.paypal_subscriptions = response.data.paypal_subscriptions;
                        this.stripe_subscriptions = response.data.stripe_subscriptions;
                    }
                );
            },
            cancelPayPalSub(sub_id){
                axios.post('/paypal/cancel/subscription',{subscription_id : sub_id}).then(
                    response => {
                        console.log(response.data);
                        if( response.data.ACK === 'Success'){
                            let subs = this.paypal_subscriptions;
                            $.each(subs, function(i){
                                if(subs[i].recurring_id === sub_id) {
                                    subs[i].payment_status = 'canceled';
                                    return false;
                                }
                            });
                        }
                    }
                );
            }
        },
        mounted(){
            this.getSubscriptions();
        }
    }
</script>

<style>

</style>