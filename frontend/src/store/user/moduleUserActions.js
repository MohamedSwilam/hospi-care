
import user from "@/http/requests/user/index"

export default {
    browse({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            user.browse(payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    dispatch('app/handleError', {reject: reject, error: error}, {root: true});
                })
        })
    },

    view({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            user.view(id)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    dispatch('app/handleError', {reject: reject, error: error}, {root: true});
                })
        })
    },

    create({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            user.create(payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    dispatch('app/handleError', {reject: reject, error: error}, {root: true});
                })
        })
    },

    update({ commit, dispatch }, payload) {
        return new Promise((resolve, reject) => {
            user.update(payload.id, payload.data)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    dispatch('app/handleError', {reject: reject, error: error}, {root: true});
                })
        })
    },

    delete({ commit, dispatch }, id) {
        return new Promise((resolve, reject) => {
            user.delete(id)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    dispatch('app/handleError', {reject: reject, error: error}, {root: true});
                })
        })
    },
}
