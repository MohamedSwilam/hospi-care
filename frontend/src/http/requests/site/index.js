import axios from '@/libs/axios'

export default {
    browse(filters) {
        //filters=?paginate=5&sortAsc=id
        return axios.get(`site${filters}`)
    },

    view(id) {
        return axios.get(`site/${id}`)
    },

    create(data) {
        return axios.post(`site`, data)
    },

    update(id, data) {
        return axios.post(`site/${id}`, data)
    },

    delete(id) {
        return axios.delete(`site/${id}`)
    }
}
