<template>
    <v-app>
        <header-component v-if="auth" />
        <div class="container-fluid">
            <div class="row">
                <sidebar-component v-if="auth" />
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
        created() {
            console.log(this.auth)
        },
        computed: {
            auth ()
            {
                return (!localStorage.getItem("auth")) ? false : true
            }
        }
    }
</script>