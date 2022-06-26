
import state from './moduleNewsState'
import mutations from './moduleNewsMutations'
import actions from './moduleNewsActions'
import getters from './moduleNewsGetters'

export default {
    namespaced: true,
    state: state,
    mutations: mutations,
    actions: actions,
    getters: getters,
}

