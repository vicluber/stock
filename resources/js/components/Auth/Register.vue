<template>
    <div class="row m-0">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="text-center">
                <div class="form-signin" style="width: 100%; max-width: 330px; padding: 15px; margin: 0 auto;">
                    <form action="#" @submit.prevent="register">
                        <h1 class="h3 mb-3 font-weight-bold">Stock</h1>
                        <input type="text" class="form-control" placeholder="Name" required="" autofocus="" v-model="formData.name">
                        <div class="alert alert-warning my-3 font-weight-bold" role="alert" v-for="(nameError, index) in errors.name" :key="index">
                            {{ nameError }}
                        </div>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" class="form-control my-3" placeholder="Email address" required autofocus v-model="formData.email">
                        <div class="alert alert-warning my-3 font-weight-bold" role="alert" v-for="(emailError, index) in errors.email" :key="index">
                            {{ emailError }}
                        </div>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" class="form-control my-3" placeholder="Password" required v-model="formData.password">
                        <input type="password" class="form-control" placeholder="Password confirmation" required="" v-model="formData.password_confirmation">
                        <div class="alert alert-warning my-3 font-weight-bold" role="alert" v-for="(passwordError, index) in errors.password" :key="index">
                            {{ passwordError }}
                        </div>
                        <div class="text-center py-3">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                            <p class="my-3 text-muted">Do you have an account already? Sign in <router-link to="/" >here</router-link>.</p>
                            <p class="my-3 text-muted">Forgot password? Recover it <router-link to="/" >here</router-link>.</p>
                        </div>
                    </form>
                </div>
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
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                errors: {
                    name: [],
                    email: [],
                    password: []
                }
            }
        },
       methods:{
           async register(){
                const res = await UsersService.register(this.formData)
                if(res.data.registered){
                    localStorage.setItem("token", res.data.token)
                    localStorage.setItem("auth", res.data.authenticated)
                    axios.defaults.headers.common['Authorization'] = `Bearer ${res.data.token}`
                    this.$router.push({name:'Dashboard'})
                } else {
                    this.errors.name = res.data.error.name
                    this.errors.email = res.data.error.email
                    this.errors.password = res.data.error.password
                }
           }
        }
    }
</script>

