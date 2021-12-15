import ExampleComponent from './components/ExampleComponent.vue';
import Login from './components/Auth/Login.vue';
import Register from './components/Auth/Register.vue';
import Products from './components/Tables/Products/Products.vue';
import Dashboard from './components/Dashboard.vue';
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
        name: 'example-component',
        path: '/example',
        component: ExampleComponent
    },
    {
        name: 'Products',
        path: '/products',
        component: Products
    },
    {
        name: 'Dashboard',
        path: '/',
        component: Dashboard
    },
];