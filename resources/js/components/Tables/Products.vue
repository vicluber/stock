<template>
    <div>
        <h2 class="text-center">Products List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <!--<th>Actions</th>-->
                </tr>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.id }}</td>
                    <td>{{ product.title }}</td>
                    <td>{{ product.summary }}</td>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: [{
                    id: 1,
                    name: 'fasdf',
                    detail: 'dasfa'
                }],
                token: ''
            }
        },
       created(){
            this.token = localStorage.getItem("token");
            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}` //include this in your created function
            this.axios.get('api/products').then(response => {
                this.products = response.data;
             });
        },
       methods:{
           deleteProduct(id){
                this.axios.delete('http://localhost:8000/api/products/${id}').then(response =>{
                    let i=this.products.map(data=>data.id).indexOf(id);
                    this.products.splice(i, 1)
                });
            }
        }
    } 
</script>