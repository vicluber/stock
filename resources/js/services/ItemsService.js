import axios from 'axios'
const token = localStorage.getItem("token");
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
//axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
export default {
    getAllItems () {
        return axios.get('api/items')
    },
    deleteItem (itemId) {
        return axios.delete('api/items/'+itemId)
    },
    postItem (formData) {
        let form = new FormData();
        form.append('sku', formData.sku);
        form.append('productId', formData.productId);
        form.append('brandId', formData.brandId);
        form.append('supplierId', formData.supplierId);
        form.append('price', formData.price);
        form.append('quantity', formData.quantity);
        form.append('mrp', formData.mrp);
        form.append('discount', formData.discount);
        form.append('domainId', formData.domainId)
        form.append('image', formData.image[0]);

        return axios.post('api/items',
        form,
        {
            headers: { 'Content-Type': 'multipart/form-data' }
        })
    }
}