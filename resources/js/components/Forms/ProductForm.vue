<template>
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
        >
            <v-text-field
                v-model="formData.title"
                :counter="10"
                :rules="titleRules"
                label="Title"
                required
            ></v-text-field>
        
            <v-select
                v-model="formData.category"
                :items="categories"
                item-text="title"
                item-value="id"
                :rules="[v => !!v || 'Category is required']"
                label="Category"
                required
            ></v-select>
        
            <v-textarea
                v-model="formData.summary"
                label="Summary"
                value=""
                hint="Short description"
            ></v-textarea>

            <v-btn
                :disabled="!valid"
                color="success"
                class="mr-4"
                @click="addProduct"
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
import CategoriesService from '../../services/CategoriesService'
import ProductsService from '../../services/ProductsService'
export default {
    name: 'ProductForm',
    data() {
        return {
            valid: true,
            titleRules: [
            v => !!v || 'Title is required',
            v => (v && v.length <= 255) || 'Title must be less than 255 characters',
            ],
            formData: {
                title: '',
                domainId: 1,
                summary: '',
                type: 1,
                content: '',
                userId: localStorage.getItem("user_id"),
                category: 0
            },
            categories: [],
        }
    },
    async created(){
        const res = await CategoriesService.getAllCategories()
        this.categories = res.data;
    },
    methods:{
        async addProduct(){
            this.$refs.form.validate() // Calling Vuetify form reference for validating the form and setting the this.valid varaible
            if(this.valid)
            {
                const res = await ProductsService.postProduct(this.formData)
                this.$emit('createdProduct', res.data.data)
            }
        },
        toggleCreateCategory() {
            this.$emit('toggleCreateCategory', true)
        },
        reset () {
            this.$refs.form.reset()
        },
        resetValidation () {
            this.$refs.form.resetValidation()
        },
    }
}
</script>
