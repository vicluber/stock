<template>
    <div>
        <!-- Modal -->
        <edit-product-modal />
        <header-component />
            <v-row>
                <v-col
                    cols="12"
                    md="2"
                >
                    <sidebar-component />
                </v-col>
                <v-col
                    cols="12"
                    md="10"
                >
                    <v-row>
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
                    <div>
                        <v-data-table
                        :headers="headers"
                        :items="products"
                        item-key="id"
                        >
                        </v-data-table>
                    </div>
                </v-col>
            </v-row>
    </div>
</template>

<script>
import Sidebar from "../../Sidebar"
import Header from "../../Header"
import ProductForm from "../../Forms/ProductForm"
import CategoryForm from "../../Forms/CategoryForm"
import EditProductModal from "./EditProductModal"
import ProductsService from '../../../services/ProductsService'
    export default {
        components: {
            'sidebar-component': Sidebar,
            'header-component': Header,
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
                    sortable: false,
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