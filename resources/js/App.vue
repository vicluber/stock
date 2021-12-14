<template>
    <v-app>
        <div v-if="auth">
            <header-component />
            <sidebar-component />
            <router-view></router-view>
        </div>
        <div v-else>
            <router-view></router-view>
        </div>
    </v-app>
</template>
<script>
import Sidebar from "./components/Sidebar"
import Header from "./components/Header"
    export default{
        name: 'App',
        components: {
            'sidebar-component': Sidebar,
            'header-component': Header,
        },
        data() {
            return {
                auth: false
            }
        },
        watch: {
            auth () {
                console.log(this.auth)
                this.auth = (!localStorage.getItem("auth")) ? false : true
                console.log(this.auth)
            }
        }
    }
</script>