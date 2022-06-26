import axios from '@/libs/axios'

export default {
  login(payload) {
    return axios.post('login', payload)
  },
}
