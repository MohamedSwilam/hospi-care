import axios from '@/libs/axios'

export default {
    browse(filters) {
        //filters=?paginate=5&sortAsc=id
        return axios.get(`product-photo${filters}`)
    },

    view(id) {
        return axios.get(`product-photo/${id}`)
    },

    create(data) {
        return axios.post(`product-photo`, data)
    },

    update(id, data) {
        return axios.post(`product-photo/${id}`, data)
    },

    delete(id) {
        return axios.delete(`product-photo/${id}`)
    }
}
