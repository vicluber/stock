<template>
    <div>
        <h2 class="text-center">Products List</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products" :key="index">
                    <td>{{ product.id }}</td>
                    <td>{{ product.title }}</td>
                    <td>{{ product.summary }}</td>
                    <td><button type="button" @click="deleteProduct(index)" class="btn btn-outline-danger">Delete</button></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import ProductsService from '../../services/ProductsService'
    export default {
        data() {
            return {
                products: [],
                token: ''
            }
        },
        async created(){
            const res = await ProductsService.getAllProducts()
            this.products = res.data;
        },
        methods:{
            async deleteProduct(index){
                let productId = this.products[index].id
                const res = await ProductsService.deleteProduct(productId)
                if(res){ this.products.splice(index , 1) }
            }
        }
    } 
</script>