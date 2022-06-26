
import slider from "@/http/requests/slider/index"

export default {
    browse({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            slider.browse(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    view({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            slider.view(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    create({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            slider.create(payload).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    update({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            slider.update(payload.id, payload.data).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },

    delete({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            slider.delete(id).then(response => {
                resolve(response)
            }).catch(error => {
                dispatch('app/handleError', {reject: reject, error: error}, {root: true});
            })
        })
    },
}
