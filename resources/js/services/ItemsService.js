import axios from 'axios'
const token = localStorage.getItem("token");
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
export default {
    getAllItems () {
        return axios.get('api/items')
    },
    deleteItem (itemId) {
        return axios.delete('api/items/'+itemId)
    },
    postItem (formData) {
      return axios.post('api/items', {
          sku: formData.sku,
          productId: formData.productId,
          brandId: formData.brandId,
          supplierId: formData.supplierId,
          domainId: formData.domainId,
          mrp: formData.mrp,
          discount: formData.discount,
          price: formData.price,
          quantity: formData.quantity
        })
    }
}