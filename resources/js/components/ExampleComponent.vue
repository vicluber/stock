<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{products:[]}
        },
       created(){
        },
       methods:{
           deleteProduct(id){
                this.axios.delete('http://localhost/api/products/${id}').then(response =>{
                    let i=this.products.map(data=>data.id).indexOf(id);
                    this.products.splice(i, 1)
                });
            }
        }
    }
</script>
