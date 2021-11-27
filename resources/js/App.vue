<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav" >
                    <router-link to="/" class="nav-item nav-link" >Login</router-link>
                    <router-link to= "/register" class="nav-item nav-link" >Register</router-link>
                    <router-link to= "/products" class="nav-item nav-link" >Products</router-link>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
<script>
    export default{}
</script>