import { $themeBreakpoints } from '@themeConfig'
import router from '@/router'

export default {
  namespaced: true,
  state: {
    windowWidth: 0,
    shallShowOverlay: false,
  },
  getters: {
    currentBreakPoint: state => {
      const { windowWidth } = state
      if (windowWidth >= $themeBreakpoints.xl) return 'xl'
      if (windowWidth >= $themeBreakpoints.lg) return 'lg'
      if (windowWidth >= $themeBreakpoints.md) return 'md'
      if (windowWidth >= $themeBreakpoints.sm) return 'sm'
      return 'xs'
    },
  },
  mutations: {
    UPDATE_WINDOW_WIDTH(state, val) {
      state.windowWidth = val
    },
    TOGGLE_OVERLAY(state, val) {
      state.shallShowOverlay = val !== undefined ? val : !state.shallShowOverlay
    },
  },
  actions: {
      handleError({ commit }, payload) {
          switch (payload.error.response.status) {
              case 401:
                  router.push('/error-403')
                  break
              case 403:
                  router.push('/error-403')
                  break
              default:
                  payload.reject(payload.error)
          }
      },
  },
}
