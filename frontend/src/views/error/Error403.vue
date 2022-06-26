<template>
  <div class="misc-wrapper">
    <b-link class="brand-logo">
      <b-img
        class="logo-img mb-2"
        :src="require('@/assets/images/logo/logo.png')"
        alt="logo"
      />
    </b-link>

    <div class="misc-inner p-2 p-sm-3">
      <div class="w-100 text-center">
        <h2 class="mb-1">
          You are not authorized! 🔐
        </h2>
        <p class="mb-2">
          You don’t have permission to access this page. Go Home!!
        </p>
        <b-button
          variant="primary"
          class="mb-1 btn-sm-block"
          :to="{path:'/'}"
        >Back to Home</b-button>
        <b-img
          fluid
          :src="imgUrl"
          alt="Not authorized page"
        />
      </div>
    </div>
  </div>
</template>

<script>
/* eslint-disable global-require */
import store from '@/store/index'

export default {
  data() {
    return {
      downImg: require('@/assets/images/pages/not-authorized.svg'),
    }
  },
  computed: {
    imgUrl() {
      if (store.state.appConfig.layout.skin === 'dark') {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.downImg = require('@/assets/images/pages/not-authorized-dark.svg')
        return this.downImg
      }
      return this.downImg
    },
  },
}
</script>

<style lang="scss">
@import '@core/scss/vue/pages/page-misc.scss';
.misc-wrapper .brand-logo {
  display: block;
}
.logo-img {
  max-width: 80px;
  max-height: 80px;
}
</style>
