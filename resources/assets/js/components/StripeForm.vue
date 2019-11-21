<template>
    <div class="container">
        <div class="row justify-content-center">
            <stripe-checkout
                button="Suscribime"
                buttonClass="btn btn-course"
                :stripe-key="stripe_key"
                :product="product"
            >
            </stripe-checkout>
        </div>
    </div>
</template>

<script>
    import { StripeCheckout } from 'vue-stripe';
    export default  {
        components: {
            StripeCheckout
        },
        name: "stripe-form",
        props: {
            stripe_key: '',
            name: '',
            amount: '',
            description: ''
        },
        computed: {
            product() {
                return {
                    name: this.name,
                    amount: parseFloat(this.amount),
                    description: this.description
                }
            }
        }
    }
</script>
