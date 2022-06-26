import axios from '@/libs/axios'

export default {
    browse(filters) {
        //filters=?paginate=5&sortAsc=id
        return axios.get(`testimonial${filters}`)
    },

    view(id) {
        return axios.get(`testimonial/${id}`)
    },

    create(data) {
        return axios.post(`testimonial`, data)
    },

    update(id, data) {
        return axios.post(`testimonial/${id}`, data)
    },

    delete(id) {
        return axios.delete(`testimonial/${id}`)
    }
}
