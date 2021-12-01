import axios from 'axios'
export default {
  authenticate (formData) {
    return axios.post('api/login', { email: formData.email, password: formData.password } )
  },
  register (formData) {
    return axios.post('api/register', { name: formData.name, email: formData.email, password: formData.password, password_confirmation: formData.password_confirmation } )
  },
  logout () {
    return axios.delete('api/logout')
  }
}
