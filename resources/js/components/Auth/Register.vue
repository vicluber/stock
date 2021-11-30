<template>
    <div class="row">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="text-center">
                <div class="form-signin" style="width: 100%; max-width: 330px; padding: 15px; margin: 0 auto;">
                    <form action="#" @submit.prevent="register">
                        <h1 class="h3 mb-3 font-weight-bold">Stock</h1>
                        <input type="text" class="form-control" placeholder="Name" required="" autofocus="" v-model="formData.name">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" class="form-control my-3" placeholder="Email address" required autofocus v-model="formData.email">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" class="form-control my-3" placeholder="Password" required v-model="formData.password">
                        <input type="password" class="form-control" placeholder="Password confirmation" required="" v-model="formData.c_password">
                        
                        <div class="text-center py-3">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                            <p class="mt-5 mb-3 text-muted">Do you have an account already? Sign in <router-link to="/" >here</router-link>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col" style="background-image: url('https://picsum.photos/700/960');">
            <img src="https://picsum.photos/700/960" style="visibility: hidden;" />
        </div>
    </div>
</template>

<script>
    import UsersService from '../../services/UsersService.js'
    export default {
        data(){
          return{
                formData: {
                    name: '',
                    email: '',
                    password: ''
                }
            }
        },
        async created () {
            
        },
       methods:{
           async register(){
                const res = await UsersService.register(this.formData)
           }
        }
    }
</script>

