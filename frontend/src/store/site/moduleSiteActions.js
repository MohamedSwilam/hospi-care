
import site from "@/http/requests/site/index"

export default {
    browse({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            site.browse(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    view({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            site.view(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    create({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            site.create(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    update({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            site.update(payload.id, payload.data).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    delete({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            site.delete(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },
}
