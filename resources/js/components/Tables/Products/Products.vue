<template>
    <div>
        <edit-product-modal />
        <v-row>
            <v-col
                cols="12"
                md="2"
            >
            </v-col>
            <v-col
                cols="12"
                md="10"
            >
                <v-row class="py-12">
                    <v-col
                        cols="12"
                        md="6"
                    >
                        <product-form
                            @createdProduct="addCreatedProductToArray"
                            @toggleCreateCategory="showCategoryForm = !showCategoryForm"
                        />
                    </v-col>
                    <v-col
                        cols="12"
                        md="6"
                    >
                        <category-form
                            v-if="showCategoryForm"
                        />
                    </v-col>
                </v-row>
                <v-data-table
                    :headers="headers"
                    :items="products"
                    item-key="id"
                    class="py-12"
                >
                </v-data-table>
            </v-col>
        </v-row>
    </div>
</template>

<script>
import ProductForm from "../../Forms/ProductForm"
import CategoryForm from "../../Forms/CategoryForm"
import EditProductModal from "./EditProductModal"
import ProductsService from '../../../services/ProductsService'
    export default {
        components: {
            'product-form': ProductForm,
            'category-form': CategoryForm,
            'edit-product-modal': EditProductModal
        },
        data() {
            return {
                headers: [
                {
                    text: 'id',
                    align: 'start',
                    sortable: true,
                    value: 'id',
                },
                { text: 'Title', value: 'title' },
                { text: 'Summary', value: 'summary' }
                ],
                products: [],
                token: '',
                showCategoryForm: false
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
            },
            addCreatedProductToArray(createdProduct){
                this.products.unshift(createdProduct)
            }
        }
    } 
</script>