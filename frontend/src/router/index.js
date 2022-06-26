import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store/index'
import axios from '../libs/axios'
import AuthMixin from '@/@core/mixins/auth'

Vue.use(VueRouter)

function guard(to, from, next) {
    if (store.state.auth.accessToken) {
        // eslint-disable-next-line
        axios.defaults.headers.common['Authorization'] = store.state.auth.accessToken
        // eslint-disable-next-line
        to.meta.permission === undefined || AuthMixin.methods.can(to.meta.permission)
            ? next() : next('/error-403')
    } else {
        console.log(to)
        next(`/login?to=${to.path}`)
    }
}

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior() {
    return { x: 0, y: 0 }
  },
  routes: [
    {
      path: '/',
      name: 'home',
      beforeEnter: guard,
      component: () => import('@/views/Home.vue'),
      meta: {
        pageTitle: 'Home',
        breadcrumb: [
          {
            text: 'Home',
            active: true,
          },
        ],
      },
    },
      // =============================================================================
      // USER ROUTES
      // =============================================================================
      {
          path: '/users',
          name: 'browse-users',
          component: () => import('../views/user/Browse.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'User', to: '/users', active: true },
              ],
              pageTitle: 'User',
              permission: 'browse-user'
          }
      },
      {
          path: '/users/create',
          name: 'create-user',
          component: () => import('../views/user/Create.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'User', to: '/users', active: false },
                  { text: 'Create User', to: '/users/create', active: true },
              ],
              pageTitle: 'Add User',
              permission: 'create-user'
          }
      },
      {
          path: '/users/:id',
          name: 'view-user',
          component: () => import('../views/user/View.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'User', to: '/users', active: false },
                  { text: 'View User', to: '/users/:id', active: true },
              ],
              pageTitle: 'View User',
              permission: 'view-user'
          }
      },
      {
          path: '/users/:id/edit',
          name: 'edit-user',
          component: () => import('../views/user/Edit.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Users', to: '/users', active: false },
                  { text: 'User', to: '/users/:id', active: false },
                  { text: 'Edit', active: true },
              ],
              pageTitle: 'Edit User',
              permission: 'edit-user'
          }
      },

      // =============================================================================
      // ROLE ROUTES
      // =============================================================================
      {
          path: '/roles',
          name: 'browse-roles',
          component: () => import('../views/settings/role/Browse.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Roles', to: '/roles', active: true },
              ],
              pageTitle: 'Roles',
              permission: 'browse-role'
          }
      },
      {
          path: '/roles/create',
          name: 'create-role',
          component: () => import('../views/settings/role/Create.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Roles', to: '/roles', active: false },
                  { text: 'Create Role', active: true },
              ],
              pageTitle: 'Create Role',
              permission: 'create-role'
          }
      },
      {
          path: '/roles/:id',
          name: 'view-role',
          component: () => import('../views/settings/role/View.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Roles', to: '/roles', active: false },
                  { text: 'Role Details', active: true },
              ],
              pageTitle: 'View Role',
              permission: 'view-role'
          }
      },
      {
          path: '/roles/:id/edit',
          name: 'edit-role',
          component: () => import('../views/settings/role/Edit.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Roles', to: '/roles', active: false },
                  { text: 'Role', to: '/roles/:id', active: false },
                  { text: 'Edit', active: true },
              ],
              pageTitle: 'Edit Role',
              permission: 'edit-role'
          }
      },

      // =============================================================================
      // SITE ROUTES
      // =============================================================================
      {
          path: '/sites',
          name: 'browse-sites',
          component: () => import('../views/site/Browse.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Sites', to: '/sites', active: true },
              ],
              pageTitle: 'Sites',
              permission: 'browse-site'
          }
      },
      {
          path: '/sites/create',
          name: 'create-site',
          component: () => import('../views/site/Create.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Sites', to: '/sites', active: false },
                  { text: 'Create Site', active: true },
              ],
              pageTitle: 'Create Site',
              permission: 'create-site'
          }
      },
      {
          path: '/sites/:id',
          name: 'view-site',
          component: () => import('../views/site/View.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Sites', to: '/sites', active: false },
                  { text: 'Site Details', active: true },
              ],
              pageTitle: 'View Site',
              permission: 'view-site'
          }
      },
      {
          path: '/sites/:id/edit',
          name: 'edit-site',
          component: () => import('../views/site/Edit.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Sites', to: '/sites', active: false },
                  { text: 'Site', to: '/sites/:id', active: false },
                  { text: 'Edit', active: true },
              ],
              pageTitle: 'Edit Site',
              permission: 'edit-site'
          }
      },

      // =============================================================================
      // CATEGORY ROUTES
      // =============================================================================
      {
          path: '/categories',
          name: 'browse-categories',
          component: () => import('../views/category/Browse.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Categories', to: '/categories', active: true },
              ],
              pageTitle: 'Categories',
              permission: 'browse-site'
          }
      },
      {
          path: '/categories/create',
          name: 'create-category',
          component: () => import('../views/category/Create.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Categories', to: '/categories', active: false },
                  { text: 'Create Category', active: true },
              ],
              pageTitle: 'Create Category',
              permission: 'create-category'
          }
      },
      {
          path: '/categories/:id',
          name: 'view-category',
          component: () => import('../views/category/View.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Categories', to: '/categories', active: false },
                  { text: 'View Category', active: true },
              ],
              pageTitle: 'View Category',
              permission: 'view-category'
          }
      },
      {
          path: '/categories/:id/edit',
          name: 'edit-category',
          component: () => import('../views/category/Edit.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Categories', to: '/categories', active: false },
                  { text: 'Category', to: '/categories/:id', active: false },
                  { text: 'Edit', active: true },
              ],
              pageTitle: 'Edit Category',
              permission: 'edit-category'
          }
      },

      // =============================================================================
      // PRODUCT ROUTES
      // =============================================================================
      {
          path: '/products',
          name: 'browse-products',
          component: () => import('../views/product/Browse.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Products', to: '/products', active: true },
              ],
              pageTitle: 'Products',
              permission: 'browse-product'
          }
      },
      {
          path: '/products/create',
          name: 'create-product',
          component: () => import('../views/product/Create.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Products', to: '/products', active: false },
                  { text: 'Create Product', active: true },
              ],
              pageTitle: 'Create Product',
              permission: 'create-product'
          }
      },
      {
          path: '/products/:id',
          name: 'view-product',
          component: () => import('../views/product/View.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Products', to: '/products', active: false },
                  { text: 'View Product', active: true },
              ],
              pageTitle: 'View Product',
              permission: 'view-product'
          }
      },
      {
          path: '/products/:id/add-photos',
          name: 'add-product-photos',
          component: () => import('../views/product/AddPhotos.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Products', to: '/products', active: false },
                  { text: 'View Product', to: '/products/:id', active: false },
                  { text: 'Add Photos', active: true },
              ],
              pageTitle: 'Add Product Photos',
              permission: 'create-product-photo'
          }
      },
      {
          path: '/products/:id/add-detail',
          name: 'add-product-detail',
          component: () => import('../views/product/AddDetail.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Products', to: '/products', active: false },
                  { text: 'View Product', to: '/products/:id', active: false },
                  { text: 'Add Detail', active: true },
              ],
              pageTitle: 'Add Product Detail',
              permission: 'create-product-detail'
          }
      },
      {
          path: '/products/:product_id/edit-detail/:detail_id',
          name: 'edit-product-detail',
          component: () => import('../views/product/EditDetail.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Products', to: '/products', active: false },
                  { text: 'View Product', to: '/products/:product_id', active: false },
                  { text: 'Edit Detail', active: true },
              ],
              pageTitle: 'Edit Product Detail',
              permission: 'edit-product-detail'
          }
      },
      {
          path: '/products/:id/edit',
          name: 'edit-product',
          component: () => import('../views/product/Edit.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Products', to: '/products', active: false },
                  { text: 'Product', to: '/products/:id', active: false },
                  { text: 'Edit', active: true },
              ],
              pageTitle: 'Edit Product',
              permission: 'edit-product'
          }
      },

      // =============================================================================
      // SLIDER ROUTES
      // =============================================================================
      {
          path: '/sliders',
          name: 'browse-sliders',
          component: () => import('../views/slider/Browse.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Sliders', to: '/sliders', active: true },
              ],
              pageTitle: 'Sliders',
              permission: 'browse-site'
          }
      },
      {
          path: '/sliders/create',
          name: 'create-slider',
          component: () => import('../views/slider/Create.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Sliders', to: '/sliders', active: false },
                  { text: 'Create Slider', active: true },
              ],
              pageTitle: 'Create Slider',
              permission: 'create-slider'
          }
      },
      {
          path: '/sliders/:id',
          name: 'view-slider',
          component: () => import('../views/slider/View.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Sliders', to: '/sliders', active: false },
                  { text: 'View Slider', active: true },
              ],
              pageTitle: 'View Slider',
              permission: 'view-slider'
          }
      },
      {
          path: '/sliders/:id/edit',
          name: 'edit-slider',
          component: () => import('../views/slider/Edit.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Sliders', to: '/sliders', active: false },
                  { text: 'Slider', to: '/sliders/:id', active: false },
                  { text: 'Edit', active: true },
              ],
              pageTitle: 'Edit Slider',
              permission: 'edit-slider'
          }
      },

      // =============================================================================
      // TESTIMONIAL ROUTES
      // =============================================================================
      {
          path: '/testimonials',
          name: 'browse-testimonials',
          component: () => import('../views/testimonial/Browse.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Testimonials', to: '/testimonials', active: true },
              ],
              pageTitle: 'Testimonials',
              permission: 'browse-site'
          }
      },
      {
          path: '/testimonials/create',
          name: 'create-testimonial',
          component: () => import('../views/testimonial/Create.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Testimonials', to: '/testimonials', active: false },
                  { text: 'Create Testimonial', active: true },
              ],
              pageTitle: 'Create Testimonial',
              permission: 'create-testimonial'
          }
      },
      {
          path: '/testimonials/:id',
          name: 'view-testimonial',
          component: () => import('../views/testimonial/View.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Testimonials', to: '/testimonials', active: false },
                  { text: 'View Testimonial', active: true },
              ],
              pageTitle: 'View Testimonial',
              permission: 'view-testimonial'
          }
      },
      {
          path: '/testimonials/:id/edit',
          name: 'edit-testimonial',
          component: () => import('../views/testimonial/Edit.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'Testimonials', to: '/testimonials', active: false },
                  { text: 'Testimonial', to: '/testimonials/:id', active: false },
                  { text: 'Edit', active: true },
              ],
              pageTitle: 'Edit Testimonial',
              permission: 'edit-testimonial'
          }
      },

      // =============================================================================
      // NEWS ROUTES
      // =============================================================================
      {
          path: '/news',
          name: 'browse-news',
          component: () => import('../views/news/Browse.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'News', to: '/news', active: true },
              ],
              pageTitle: 'News',
              permission: 'browse-site'
          }
      },
      {
          path: '/news/create',
          name: 'create-news',
          component: () => import('../views/news/Create.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'News', to: '/news', active: false },
                  { text: 'Create News', active: true },
              ],
              pageTitle: 'Create News',
              permission: 'create-news'
          }
      },
      {
          path: '/news/:id/edit',
          name: 'edit-news',
          component: () => import('../views/news/Edit.vue'),
          beforeEnter: guard,
          meta: {
              breadcrumb: [
                  { text: 'Home', to: '/', active: false },
                  { text: 'News', to: '/news', active: false },
                  { text: 'Edit', active: true },
              ],
              pageTitle: 'Edit News',
              permission: 'edit-news'
          }
      },

      // =============================================================================
      // AUTH ROUTES
      // =============================================================================
      {
          path: '/login',
          name: 'login',
          component: () => import('@/views/auth/Login.vue'),
          meta: {
              layout: 'full',
          },
      },
      // =============================================================================
      // ERROR ROUTES
      // =============================================================================
      {
          path: '/error-404',
          name: 'error-404',
          component: () => import('@/views/error/Error404.vue'),
          meta: {
              layout: 'full',
          },
      },
      {
          path: '/error-403',
          name: 'error-403',
          component: () => import('@/views/error/Error403.vue'),
          meta: {
              layout: 'full',
          },
      },
      {
          path: '*',
          redirect: 'error-404',
      },
  ],
})

// ? For splash screen
// Remove afterEach hook if you are not using splash screen
router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById('loading-bg')
  if (appLoading) {
    appLoading.style.display = 'none'
  }
})

export default router
