
import productPhoto from "@/http/requests/productPhoto/index"

export default {
    browse({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            productPhoto.browse(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    view({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            productPhoto.view(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    create({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            productPhoto.create(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    update({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            productPhoto.update(payload.id, payload.data).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    delete({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            productPhoto.delete(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },
}
