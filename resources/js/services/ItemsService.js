import axios from 'axios'
const token = localStorage.getItem("token");
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
export default {
    getAllItems () {
        return axios.get('api/items')
    },
    deleteItems (itemId) {
        return axios.delete('api/items/'+itemId)
    },
}