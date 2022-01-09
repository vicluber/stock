<template>
    <div class="col-10">
        <v-row class="py-12">
            <v-col
                cols="12"
                md="12"
            >
                <category-form />
            </v-col>
        </v-row>
        <v-data-table
            :headers="headers"
            :items="categories"
            item-key="id"
            class="py-12"
        >
            <template v-slot:item="row">
                <tr>
                    <td>{{row.item.id}}</td>
                    <td>{{row.item.title}}</td>
                    <td>{{row.item.slug}}</td>
                    <td>
                        <delete-dialog-confirmation :itemToDelete="row.item" @deleteAction="removeDeleted" />
                    </td>
                </tr>
            </template>
        </v-data-table>
    </div>
</template>

<script>
import CategoryForm from "../../Forms/CategoryForm"
import DeleteDialogConfirmation from '../../Dialogs/DeleteDialogConfirmation'
import CategoriesService from '../../../services/CategoriesService'
    export default {
        name: 'Categories',
        components: {
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
                    { text: 'Slug', value: 'slug' },
                    { text: 'actions', value: 'actions' }
                ],
                categories: []
            }
        },
        async created(){
            const res = await CategoriesService.getAllCategories()
            this.categories = res.data;
        },
        methods:{
            async removeDeleted(item){
                let index = this.categories.findIndex(pro => pro === item); //retuning the index of the array where the item is equal to the item
                let id = this.categories[index].id //getting that element of array
                const res = await CategoriesService.deleteCategory(id) //making de DELETE request and deleting the record from the db
                if(res){ this.categories.splice(index , 1) } // Removing the item from the array
            },
            addCreatedProductToArray(createdProduct){
                this.products.unshift(createdProduct)
            }
        }
    } 
</script>
