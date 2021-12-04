<template>
  <div>
    <header-component />
    <div class="container-fluid">
      <div class="row">
        <sidebar-component />
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="row my-5">
              <div class="col-md-6">
                  <product-form />
              </div>
              <div class="col-md-6">
                  <category-form v-if="showCategoryForm" />
              </div>
          </div>
          <div class="row my-5">
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
                        <td>
                            <button type="button" @click="deleteProduct(index)" class="btn btn-outline-danger">Delete</button>
                            <button type="button" @click="editProduct(index)" class="btn btn-outline-info">Edit</button>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "../Sidebar"
import Header from "../Header"
import ProductForm from "../Forms/ProductForm"
import CategoryForm from "../Forms/CategoryForm"
import ProductsService from '../../services/ProductsService'
    export default {
        components: {
            'sidebar-component': Sidebar,
            'header-component': Header,
            'product-form': ProductForm,
            'category-form': CategoryForm
        },
        data() {
            return {
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
            }
        }
    } 
</script>