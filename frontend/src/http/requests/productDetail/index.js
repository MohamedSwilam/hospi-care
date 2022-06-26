import axios from '@/libs/axios'

export default {
    browse(filters) {
        //filters=?paginate=5&sortAsc=id
        return axios.get(`product-detail${filters}`)
    },

    view(id) {
        return axios.get(`product-detail/${id}`)
    },

    create(data) {
        return axios.post(`product-detail`, data)
    },

    update(id, data) {
        return axios.post(`product-detail/${id}`, data)
    },

    delete(id) {
        return axios.delete(`product-detail/${id}`)
    }
}
