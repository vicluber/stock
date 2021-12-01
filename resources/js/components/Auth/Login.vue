<template>
    <div class="row">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="form-signin" style="width: 100%; max-width: 400px; padding: 15px; margin: 0 auto;">
                <form action="#" @submit.prevent="authenticate">
                    <h1 class="h3 mb-3 font-weight-bold">Stock</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" class="form-control my-3" placeholder="Email address" required autofocus v-model="formData.email">
                    
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" class="form-control my-3" placeholder="Password" required v-model="formData.password">
                    <div v-if="error" class="alert alert-danger my-3 font-weight-bold" role="alert">
                        {{ error }}
                    </div>
                    <div class="extra mt-3 row justify-content-between">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                <label class="form-check-label" for="RememberPassword">
                                Remember me
                                </label>
                            </div>
                        </div><!--//col-6-->
                        <div class="col-6">
                            <div class="forgot-password text-end">
                                <a href="reset-password.html">Forgot password?</a>
                            </div>
                        </div><!--//col-6-->
                    </div>
                    <div class="text-center py-3">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        <p class="mt-5 mb-3 text-muted">No account? Sign up <router-link to="/register" >here</router-link>.</p>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col" style="background-image: url('https://picsum.photos/960/1280');">
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
                    email: '',
                    password: ''
                },
                error: ''
            }
        },
        async created () {
            
        },
       methods:{
           async authenticate(){
                const res = await UsersService.authenticate(this.formData)
                this.error = res.data.message
                if(res.data.authenticated){
                    localStorage.setItem("token", res.data.token)
                    localStorage.setItem("auth", res.data.authenticated)
                    axios.defaults.headers.common['Authorization'] = `Bearer ${res.data.token}`
                    this.$router.push({name:'Dashboard'})
                }
           }
        }
    }
</script>

