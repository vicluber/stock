import axios from 'axios'
export default {
  authenticate (formData) {
    return axios.post('login', { email: formData.email, password: formData.password } )
  },
  register (formData) {
    return axios.post('register', { name: formData.name, email: formData.email, password: formData.password, c_password: formData.c_password } )
  }
}
