import axios from 'axios'
const token = localStorage.getItem("token");
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
export default {
    getAllCategories () {
        return axios.get('api/categories')
    },
    deleteCategory (categoryId) {
        return axios.delete('api/categories/'+categoryId)
    },
}