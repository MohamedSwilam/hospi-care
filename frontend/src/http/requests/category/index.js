import axios from '@/libs/axios'

export default {
    browse(filters) {
        //filters=?paginate=5&sortAsc=id
        return axios.get(`category${filters}`)
    },

    view(id) {
        return axios.get(`category/${id}`)
    },

    create(data) {
        return axios.post(`category`, data)
    },

    update(id, data) {
        return axios.post(`category/${id}`, data)
    },

    delete(id) {
        return axios.delete(`category/${id}`)
    }
}
