<template>
  <header class="container-fluid bg-blue">
    <div class="row row-cols-auto justify-content-center">
      <div class="col color-bg-a">
        <router-link class="nav-link" to="/dashboard">
          <v-icon
              large
            >
            mdi-home
          </v-icon>
        </router-link>
      </div>
      <div class="col color-bg-b">
        <router-link class="nav-link" to="/products">
          <v-icon
              large
            >
            mdi-package-variant-closed
          </v-icon>
        </router-link>
      </div>
      <div class="col color-bg-c">
        <router-link class="nav-link" to="/items">
          <v-icon
            large
          >
              mdi-plus-box
          </v-icon>
        </router-link>
      </div>
      <div class="col color-bg-d">
        <router-link class="nav-link" to="/categories">
          <v-icon
              large
            >
            mdi-account-check
          </v-icon>
        </router-link>
      </div>
      <div class="col color-bg-e">
        <a href="#">
          <v-icon
              large
            >
            mdi-book-account
          </v-icon>
        </a>
      </div>
      <div class="col color-bg-f">
        <a href="#">
          <v-icon
              large
            >
            mdi-book-account
          </v-icon>
        </a>
      </div>
      <div class="col color-bg-g">
        <a href="#">
          <v-icon
              large
            >
            mdi-book-account
          </v-icon>
        </a>
      </div>
      <div class="col color-bg-h">
        <a href="#">
          <v-icon
              large
            >
            mdi-book-account
          </v-icon>
        </a>
      </div>
      <div class="col color-bg-i">
        <a href="#" @click="logout">
          <v-icon
              large
            >
            mdi-book-account
          </v-icon>
        </a>
      </div>
    </div>
  </header>
</template>
<script>
import UsersService from "../services/UsersService"
export default {
  name: 'Header',
  methods: {
    async logout() {
      localStorage.clear();
      this.$emit('loggedOut', false)
      const res = await UsersService.logout();
      if (res) {
        this.$router.push({ name: "Login" });
      }
    },
  },
};
</script>