
import product from "@/http/requests/product/index"

export default {
    browse({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            product.browse(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    view({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            product.view(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    create({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            product.create(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    update({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            product.update(payload.id, payload.data).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    delete({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            product.delete(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },
}
