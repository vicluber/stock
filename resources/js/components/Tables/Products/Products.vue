<template>
    <div class="col-10">
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
            <template v-slot:item="row">
                <tr>
                    <td>{{row.item.id}}</td>
                    <td>{{row.item.title}}</td>
                    <td>{{row.item.summary}}</td>
                    <td>
                        <delete-dialog-confirmation :itemToDelete="row.item" @deleteAction="removeDeleted" />
                    </td>
                </tr>
            </template>
        </v-data-table>
    </div>
</template>

<script>
import ProductForm from "../../Forms/ProductForm"
import CategoryForm from "../../Forms/CategoryForm"
import ProductsService from '../../../services/ProductsService'
import DeleteDialogConfirmation from '../../Dialogs/DeleteDialogConfirmation.vue'
    export default {
        components: {
            'product-form': ProductForm,
            'category-form': CategoryForm,
            'delete-dialog-confirmation': DeleteDialogConfirmation
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
                    { text: 'Summary', value: 'summary' },
                    { text: 'actions', value: 'actions' }
                ],
                products: [],
                showCategoryForm: false
            }
        },
        async created(){
            const res = await ProductsService.getAllProducts()
            this.products = res.data;
        },
        methods:{
            async removeDeleted(item){
                let index = this.products.findIndex(pro => pro === item); //retuning the index of the array where the item is equal to the item
                let productId = this.products[index].id //getting that element of array
                const res = await ProductsService.deleteProduct(productId) //making de DELETE request and deleting the record from the db
                if(res){ this.products.splice(index , 1) } // Removing the item from the array
            },
            addCreatedProductToArray(createdProduct){
                this.products.unshift(createdProduct)
            }
        }
    } 
</script>