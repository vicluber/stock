import axios from 'axios'
const token = localStorage.getItem("token");
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
export default {
  getAllProducts () {
    return axios.get('api/products')
  },
  deleteProduct (productId) {
    return axios.delete('api/products/'+productId)
  }
}
