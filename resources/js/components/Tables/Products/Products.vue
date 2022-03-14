<template>
    <div class="col-12 color-bg-b">
        <v-row>
            <v-col
                cols="8"
                md="8"
            >
                <product-form
                    @createdProduct="addCreatedProductToArray"
                />
            </v-col>
            <v-col
                cols="4"
                md="4"
            >
                <v-data-table
                    :headers="headers"
                    :items="products"
                    item-key="id"
                >
                    <template v-slot:item="row">
                        <tr>
                            <td>{{row.item.id}}</td>
                            <td>{{row.item.title}}</td>
                            <td>
                                <delete-dialog-confirmation :itemToDelete="row.item" @deleteAction="removeDeleted" />
                            </td>
                        </tr>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
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
                    { text: 'actions', value: 'actions' }
                ],
                products: []
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