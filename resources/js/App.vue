<template>
    <v-app>
        <header-component v-if="authenticated" @loggedOut="loggedOut" />
        <div class="container-fluid">
            <div class="row">
                <sidebar-component v-if="authenticated" />
                <router-view></router-view>
            </div>
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
                authenticated: false
            }
        },
        created() {
            this.authenticated = (!localStorage.getItem("auth")) ? false : true
        },
        methods: {
            loggedOut(value){
                this.authenticated = value
            }
        }
    }
</script>