import axios from '@/libs/axios'

export default {
    browse(filters) {
        //filters=?paginate=5&sortAsc=id
        return axios.get(`slider${filters}`)
    },

    view(id) {
        return axios.get(`slider/${id}`)
    },

    create(data) {
        return axios.post(`slider`, data)
    },

    update(id, data) {
        return axios.post(`slider/${id}`, data)
    },

    delete(id) {
        return axios.delete(`slider/${id}`)
    }
}
