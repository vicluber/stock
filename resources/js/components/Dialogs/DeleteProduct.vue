<template>
  <div class="text-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >
    
      <template v-slot:activator="{ on, attrs }">
        <v-icon
          v-bind="attrs"
          v-on="on"
        >
            mdi-delete
        </v-icon>
      </template>

      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          Confirmation
        </v-card-title>
        <v-card-text>
          Are you shure you want to delete this product?
        </v-card-text>

        <v-divider></v-divider>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="primary"
              text
              @click="deleteProduct(itemToDelete)"
            >
              Yes
            </v-btn>
            <v-btn
              color="primary"
              text
              @click="dialog = false"
            >
              No
            </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
  export default {
    name: 'confirmation-dialog',
    props: {
      itemToDelete: Object
    },
    data () {
      return {
        dialog: false,
      }
    },
    methods:{
      async deleteProduct(item){
        this.dialog = !this.dialog
        this.$emit('removeDeleted', item)
      }
    }
  }
</script>