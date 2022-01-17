<template>
    <div class="col-10">
        <v-row class="py-12">
            <v-col
                cols="12"
                md="6"
            >
                <item-form
                    @createdItem="addCreatedItemToArray"
                />
            </v-col>
            <v-col
                cols="12"
                md="6"
            >
            </v-col>
        </v-row>
        <v-data-table
            :headers="headers"
            :items="items"
            item-key="id"
            class="py-12"
        >
            <template v-slot:item="row">
                <tr>
                    <td>{{row.item.id}}</td>
                    <td>{{row.item.sku}}</td>
                    <td>{{row.item.product.title}}</td>
                    <td>{{row.item.brand.title}}</td>
                    <td>{{row.item.supplier.title}}</td>
                    <td>
                        <delete-dialog-confirmation :itemToDelete="row.item" @deleteAction="removeDeleted" />
                    </td>
                </tr>
            </template>
        </v-data-table>
    </div>
</template>

<script>
import ItemsService from '../../../services/ItemsService'
import DeleteDialogConfirmation from '../../Dialogs/DeleteDialogConfirmation.vue'
import ItemForm from '../../Forms/ItemForm.vue'
    export default {
        components: {
            'delete-dialog-confirmation': DeleteDialogConfirmation,
            'item-form': ItemForm
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
                    { text: 'Sku', value: 'sku' },
                    { text: 'Product', value: 'product.title' },
                    { text: 'Brand', value: 'brand.title' },
                    { text: 'supplier', value: 'supplier.title' },
                    { text: 'Actions', value: '' },
                ],
                items: []
            }
        },
        async created(){
            const res = await ItemsService.getAllItems()
            this.items = res.data;
        },
        methods:{
            async removeDeleted(item){
                let index = this.items.findIndex(pro => pro === item); //retuning the index of the array where the item is equal to the item
                let itemId = this.items[index].id //getting that element of array
                const res = await ItemsService.deleteItem(itemId) //making de DELETE request and deleting the record from the db
                if(res){ this.items.splice(index , 1) } // Removing the item from the array
            },
            addCreatedItemToArray(createdItem){
                this.items.unshift(createdItem)
            }
        }
    } 
</script>