import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersistence from 'vuex-persist'

// Modules
import app from './app'
import appConfig from './app-config'
import verticalMenu from './vertical-menu'

import auth from './auth/moduleAuth'
import user from './user/moduleUser'
import rolesAndPermissions from './roles-and-permissions/moduleRolesAndPermissions'
import site from './site/moduleSite'
import category from './category/moduleCategory'
import product from './product/moduleProduct'
import productDetail from './product-detail/moduleProductDetail'
import productPhoto from './product-photo/moduleProductPhoto'
import slider from './slider/moduleSlider'
import news from './news/moduleNews'
import testimonial from './testimonial/moduleTestimonial'

Vue.use(Vuex)

const vuexLocal = new VuexPersistence({
    storage: window.localStorage,
})

export default new Vuex.Store({
  modules: {
    app,
    appConfig,
    verticalMenu,
    auth,
    user,
    rolesAndPermissions,
    site,
    category,
    product,
    productDetail,
    productPhoto,
    slider,
    news,
    testimonial,
  },
  plugins: [vuexLocal.plugin],
  strict: process.env.DEV,
})
