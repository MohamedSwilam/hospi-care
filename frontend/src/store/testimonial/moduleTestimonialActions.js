
import Testimonial from "@/http/requests/Testimonial/index"

export default {
    browse({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            Testimonial.browse(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    view({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            Testimonial.view(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    create({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            Testimonial.create(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    update({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            Testimonial.update(payload.id, payload.data).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    delete({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            Testimonial.delete(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },
}
