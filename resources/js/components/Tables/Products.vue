<template>
    <div>
        <h2 class="text-center">Products List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <!--<th>Actions</th>-->
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
                }]
            }
        },
       created(){
            this.axios.get('api/products').then(response => {
                this.products = response.data;
                console.log(response)
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