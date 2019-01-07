<template>
    <v-app light>
        <v-form ref="form">
            <v-text-field dusk="credit-card"
                    v-model="cardNumber"
                    :counter="10"
                    label="Credit Card Number"
                    required>

            </v-text-field>

            <v-btn color="success"
                   dusk="validate"
                   @click="validate">
                Validate
            </v-btn>

            <v-btn color="error">
                Reset Form
            </v-btn>

            <v-alert :value="error1"
                     type="error">
                This is error 1!
            </v-alert>
            <v-alert :value="error2"
                     type="error">
                This is error 2!
            </v-alert>

        </v-form>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            dialog: false,
            cardNumber: '',
            error1: false,
            error2: false,
        }),

        methods: {
            validate () {
                if (this.cardNumber === 'yyyyy') {
                    this.error1 = true;
                }

                if (this.cardNumber === 'xxxxx') {
                    this.error2 = true;
                }
            },

        }
    }
</script>
