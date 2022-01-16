<template>
    <v-form
        ref="form"
        v-model="valid"
        lazy-validation
    >
        <v-text-field
            v-model="formData.sku"
            :counter="10"
            :rules="skuRules"
            label="SKU"
            required
        ></v-text-field>

        <v-btn
            :disabled="!valid"
            color="success"
            class="mr-4"
            @click="addItem"
        >
            Save
        </v-btn>
    
        <v-btn
            color="error"
            class="mr-4"
            @click="reset"
        >
            Reset Form
        </v-btn>
    </v-form>
</template>
<script>
import ItemsService from '../../services/ItemsService'
export default {
    name: 'ItemForm',
    data() {
        return {
            valid: true,
            skuRules: [
                v => !!v || 'SKU is required',
                v => (v && v.length <= 255) || 'SKU must be less than 255 characters',
            ],
            formData: {
                sku: '',
                productId: 1,
                price: 0,
                quantity: 9999,
                mrp: 10,
                discount: 0,
                domainId: 1,
                userId: localStorage.getItem("user_id")
            }
        }
    },
    methods:{
        async addItem(){
            this.$refs.form.validate() // Calling Vuetify form reference for validating the form and setting the this.valid varaible
            if(this.valid)
            {
                const res = await ItemsService.postItem(this.formData)
                this.$emit('createdItem', res.data.data)
            }
        },
        reset () {
            this.$refs.form.reset()
        }
    }
}
</script>
