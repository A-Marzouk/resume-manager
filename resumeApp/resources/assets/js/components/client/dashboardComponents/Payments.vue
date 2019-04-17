<template>
    <div class="payments">
        <div class="subscriptions">
            <div class="subs-heading">
                <div class="left">
                    <img src="/resumeApp/public/images/client/plan.png" alt="subs icon">
                    <span>
                        YOUR SUBSCRIPTIONS
                    </span>
                </div>
                <div class="right">
                    SUBSCRIPTION RECORD
                </div>
            </div>
            <div class="subs-empty-state" v-show="payments_empty_state">
                <div class="subs-e-s-text">
                    There are no subs yet.
                </div>
                <div class="subs-e-s-action">
                    <a href="javascript:void(0)">
                        SET UP YOUR SUBSCRIPTION PLAN
                    </a>
                </div>
            </div>
            <div v-show="!payments_empty_state">
                not empty
            </div>
        </div>

        <div class="invoices">
            <div class="invoices-heading">
                <img src="/resumeApp/public/images/client/plan.png" alt="invoices icon">
                YOUR INVOICES
            </div>
            <div class="invoices-table">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">SERVICE PROVIDED</th>
                            <th scope="col">TOTAL DUE</th>
                            <th scope="col">PAYMENT STATUS</th>
                            <th scope="col">EXPORT</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="subs-empty-state" v-show="payments_empty_state">
                <div class="subs-e-s-text">
                    There are no invoices yet.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               payments_empty_state : true
           }
       }
    }
</script>

<style scoped>

</style>