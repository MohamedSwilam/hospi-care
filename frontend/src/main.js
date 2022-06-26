import Vue from 'vue'
import { ToastPlugin, ModalPlugin, BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import VueCompositionAPI from '@vue/composition-api'

import AuthMixin from '@/@core/mixins/auth'
import router from './router'
import store from './store'
import App from './App.vue'

// Global Components
import './global-components'

// Admin Filters
import './filters/filters'

// 3rd party plugins
import '@/libs/portal-vue'
import '@/libs/toastification'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

// BSV Plugin Registration
Vue.use(ToastPlugin)
Vue.use(ModalPlugin)

// Composition API
Vue.use(VueCompositionAPI)

// import core styles
require('@core/scss/core.scss')

// import assets styles
require('@/assets/scss/style.scss')

Vue.mixin(AuthMixin)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
