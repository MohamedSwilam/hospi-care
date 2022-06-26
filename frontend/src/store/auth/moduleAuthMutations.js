import axios from '../../libs/axios'

export default {
  SET_BEARER(state, payload) {
    state.accessToken = `Bearer ${payload.access_token.accessToken}`
    axios.defaults.headers.common['Authorization'] = payload.accessToken
  },
  UPDATE_USER_INFO(state, payload) {
    state.user = payload.user
  },
  LOGOUT(state) {
    state.accessToken = null
    state.user = null
  },
}
