
import state from './moduleSiteState'
import mutations from './moduleSiteMutations'
import actions from './moduleSiteActions'
import getters from './moduleSiteGetters'

export default {
    namespaced: true,
    state: state,
    mutations: mutations,
    actions: actions,
    getters: getters,
}

