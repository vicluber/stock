<template>
    <div class="text-center">
        <div class="form-signin" style="width: 100%; max-width: 330px; padding: 15px; margin: 0 auto;">
            <form action="#" @submit.prevent="authenticate">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" class="form-control my-3" placeholder="Email address" required autofocus v-model="formData.email">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" class="form-control my-3" placeholder="Password" required v-model="formData.password">
                <div class="checkbox my-3">
                    <label>
                    <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <button class="btn btn-lg btn-primary btn-block">Register</button>
                <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
            </form>
        </div>
    </div>
</template>

<script>
    import UsersService from '../../services/UsersService.js'
    export default {
        data(){
          return{
                products:[],
                formData: {
                    email: '',
                    password: ''
                }
            }
        },
        async created () {
            
        },
       methods:{
           async authenticate(){
                const res = await UsersService.authenticate(this.formData)
           }
        }
    }
</script>

