<template>
  <!-- Error page-->
  <div class="misc-wrapper">
    <div class="misc-inner p-2 p-sm-3">
      <div
        class="w-100 text-center"
        style="position: relative;top:-160px;"
      >
        <b-img
          class="logo-img mb-2"
          :src="require('@/assets/images/logo/logo.png')"
          alt="logo"
        />
        <h2 class="mb-1">
          Page Not Found!
        </h2>
        <p class="mb-2">
          Oops! 😖 The requested URL was not found on this server.
        </p>

        <b-button
          variant="primary"
          class="mb-2 btn-sm-block"
          :to="{path:'/'}"
        >
          Back to home
        </b-button>
      </div>
      <!-- image -->
      <b-img
        style="position: absolute;top:0;z-index: -1;"
        fluid
        :src="imgUrl"
        alt="Error page"
      />
    </div>
  </div>
<!-- / Error page-->
</template>

<script>
/* eslint-disable global-require */
import { BButton, BImg } from 'bootstrap-vue'
import store from '@/store/index'

export default {
  components: {
    BButton,
    BImg,
  },
  data() {
    return {
      downImg: require('@/assets/images/pages/error.svg'),
    }
  },
  computed: {
    imgUrl() {
      if (store.state.appConfig.layout.skin === 'dark') {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.downImg = require('@/assets/images/pages/error-dark.svg')
        return this.downImg
      }
      return this.downImg
    },
  },
}
</script>

<style lang="scss">
@import '@core/scss/vue/pages/page-misc.scss';
.logo-img {
  max-width: auto;
  max-height: 80px;
}
</style>
