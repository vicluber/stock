<template>
    <div class="text-center">
        <div class="form-signin" style="width: 100%; max-width: 330px; padding: 15px; margin: 0 auto;">
            <form action="#" @submit.prevent="register">
                <input type="text" class="form-control" placeholder="Name" required="" autofocus="" v-model="formData.name">
                <input type="email" class="form-control" placeholder="Email address" required="" v-model="formData.email">
                <input type="password" class="form-control" placeholder="Password" required="" v-model="formData.password">
                <input type="password" class="form-control" required="" v-model="formData.c_password">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
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
                console.log(window)
           }
        }
    }
</script>

