import axios from 'axios'
const token = localStorage.getItem("token");
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
export default {
  getAllBrands () {
    return axios.get('api/brands')
  },
  deleteBrand (brandId) {
    return axios.delete('api/brands/'+brandId)
  },
  postBrand (formData) {
    return axios.post('api/brands', { title: formData.title, domainId: formData.domainId, summary: formData.summary, type: formData.type, content: formData.content, category: formData.category, userId: formData.userId })
  }
}
