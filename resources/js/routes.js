import Login from './components/Auth/Login.vue';
import Register from './components/Auth/Register.vue';
import Products from './components/Tables/Products/Products.vue';
import Dashboard from './components/Dashboard.vue';
import Categories from './components/Tables/Categories/Categories.vue';
import Items from './components/Tables/Items/Items.vue';
import App from './App.vue';

export const routes = [
    {
        name: 'Login',
        path: '/login',
        component: Login
    },
    {
        name: 'Register',
        path: '/register',
        component: Register
    },
    {
        name: 'Categories',
        path: '/categories',
        component: Categories
    },
    {
        name: 'Products',
        path: '/products',
        component: Products
    },
    {
        name: 'Items',
        path: '/items',
        component: Items
    },
    {
        name: 'Dashboard',
        path: '/',
        component: Dashboard
    },
];