import router from '@/router'
import auth from '@/http/requests/auth/index'

export default {
  login({ commit }, payload) {
    return new Promise((resolve, reject) => {
      auth.login(payload).then(response => {
        // Update user details
        commit('UPDATE_USER_INFO', response.data.data)
        // Set bearer token in axios
        commit('SET_BEARER', response.data.data)

        // Navigate user to home page
        router.push(router.currentRoute.query.to || '/')

        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  logout({ commit }) {
    commit('LOGOUT')
    router.push('/login')
  },
}
