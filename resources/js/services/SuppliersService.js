import axios from 'axios'
const token = localStorage.getItem("token");
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
export default {
  getAllSuppliers () {
    return axios.get('api/suppliers')
  },
  deleteSupplier (supplierId) {
    return axios.delete('api/suppliers/'+supplierId)
  },
  postSupplier (formData) {
    return axios.post('api/supplier', { title: formData.title, domainId: formData.domainId, summary: formData.summary, type: formData.type, content: formData.content, category: formData.category, userId: formData.userId })
  }
}
