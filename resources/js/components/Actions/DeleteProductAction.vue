<template>
    <div>
        <v-icon
          small
          @click="deleteItem()"
        >
          mdi-delete
        </v-icon>
        <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card>
            <v-card-title class="text-h5">Are you sure you want to delete the item {{ idItem }}?</v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                <v-spacer></v-spacer>
            </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
import ProductsService from '../../services/ProductsService'
export default {
    name :'DeleteProductAction',
    props: {
        idItem: Number
    },
    data() {
        return {
            dialogDelete: false,
        }
    },
    setup() {
        
    },
    methods: {
        deleteItem () {
            this.dialogDelete = true
        },
        closeDelete () {
            this.dialogDelete = false
        },
        async deleteItemConfirm () {
            const res = await ProductsService.deleteProduct(this.idItem)
            if(res){ this.products.splice(index , 1) }
            this.closeDelete()
        },
    }
}
</script>