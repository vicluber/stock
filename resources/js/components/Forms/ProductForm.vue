<template>
    <form action="#" @submit.prevent="createProduct">
        <div class="text-center">
            <h2>New Product</h2>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCity">Title</label>
            <input type="text" class="form-control" placeholder="Title" required="" v-model="formData.title">
            </div>
            <div class="form-group col-md-5">
                <label for="inputState">Category</label>
                <select id="inputState" class="form-control" required v-model="formData.category">
                    <option>Select category</option>
                    <option v-for="category in categories" v-bind:value="category.id">{{ category.title }}</option>
                </select>
            </div>
            <div class="col-md-1">
                <label class="invisible">Create</label>
                <button class="btn btn-primary">New</button>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="formData.summary"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</template>
<script>
import CategoriesService from '../../services/CategoriesService'
export default {
    name: 'ProductForm',
    data() {
        return {
            formData: {
                title: '',
                domainId: 1,
                summary: '',
                type: 1,
                content: '',
                category: 1
            },
            categories: [],
        }
    },
    name: 'ProductForm',
    async created(){
        const res = await CategoriesService.getAllCategories()
        console.log(res.data)
        this.categories = res.data;
    },
}
</script>
