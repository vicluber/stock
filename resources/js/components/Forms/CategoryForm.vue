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

        <v-text-field
            v-model="formData.slug"
            :counter="10"
            label="Slug"
        ></v-text-field>

        <v-btn
            :disabled="!valid"
            color="success"
            class="mr-4"
            @click="addCategory"
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
export default {
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
                category: 0
            },
            categories: [],
        }
    },
    name: 'CategoryForm',
    async created(){
        const res = await CategoriesService.getAllCategories()
        this.categories = res.data;
    },
    methods:{
        async addCategory(){
            this.$refs.form.validate() // Calling Vuetify form reference for validating the form and setting the this.valid varaible
            if(this.valid)
            {
                const res = await CategoriesService.postCategory(this.formData)
                this.$emit('createdCategory', res.data.data)
            }
        },
        reset () {
            this.$refs.form.reset()
        }
    }
}
</script>
