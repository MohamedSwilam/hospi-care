import axios from '@/libs/axios'

export default {
    browse(filters) {
        //filters=?paginate=5&sortAsc=id
        return axios.get(`news${filters}`)
    },

    view(id) {
        return axios.get(`news/${id}`)
    },

    create(data) {
        return axios.post(`news`, data)
    },

    update(id, data) {
        return axios.post(`news/${id}`, data)
    },

    delete(id) {
        return axios.delete(`news/${id}`)
    }
}
