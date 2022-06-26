<template>
  <div class="auth-wrapper auth-v2">
    <b-row class="auth-inner m-0">

      <!-- Left Text-->
      <b-col
        lg="8"
        class="d-none d-lg-flex align-items-center p-5"
      >
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
          <b-img
            fluid
            :src="require('@/assets/images/pages/login-v2.svg')"
            alt="Login V2"
          />
        </div>
      </b-col>
      <!-- /Left Text-->

      <!-- Login-->
      <b-col
        lg="4"
        class="d-flex align-items-center auth-bg px-2 p-lg-5"
      >
        <b-col
          sm="8"
          md="6"
          lg="12"
          class="px-xl-1 mx-auto"
        >
            <!-- Brand logo-->
            <b-link class="brand-logo mb-3">
                <b-img
                    class="login-logo"
                    :src="require('@/assets/images/logo/logo.png')"
                    alt="HOSPICARE"
                />
            </b-link>
            <!-- /Brand logo-->
          <b-card-title
            title-tag="h2"
            class="font-weight-bold mb-1"
          >
            Welcome to HOSPICARE! 👋
          </b-card-title>
          <b-card-text class="mb-2">
            Please sign-in to your account and start the adventure
          </b-card-text>

          <!-- form -->
          <validation-observer
              ref="loginValidation"
              v-slot="{ handleSubmit }"
          >
            <b-form
              class="auth-login-form mt-2"
              @submit.prevent="handleSubmit(login)"
            >
              <!-- email -->
              <b-form-group
                label="Email"
                label-for="login-email"
              >
                <validation-provider
                  v-slot="{ errors }"
                  name="Email"
                  rules="required|email"
                >
                  <b-form-input
                    id="login-email"
                    v-model="userEmail"
                    :state="errors.length > 0 ? false:null"
                    name="login-email"
                    placeholder="name@example.com"
                  />
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </b-form-group>

              <!-- forgot password -->
              <b-form-group>
                <div class="d-flex justify-content-between">
                  <label for="login-password">Password</label>
                </div>
                <validation-provider
                  v-slot="{ errors }"
                  name="Password"
                  rules="required"
                >
                  <b-input-group
                    class="input-group-merge"
                    :class="errors.length > 0 ? 'is-invalid':null"
                  >
                    <b-form-input
                      id="login-password"
                      v-model="password"
                      :state="errors.length > 0 ? false:null"
                      class="form-control-merge"
                      :type="passwordFieldType"
                      name="login-password"
                      placeholder="············"
                    />
                    <b-input-group-append is-text>
                      <feather-icon
                        class="cursor-pointer"
                        :icon="passwordToggleIcon"
                        @click="togglePasswordVisibility"
                      />
                    </b-input-group-append>
                  </b-input-group>
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </b-form-group>
              <!-- submit buttons -->
              <b-button
                class="mt-3"
                type="submit"
                variant="primary"
                block
              >
                Sign in
              </b-button>
            </b-form>
          </validation-observer>
        </b-col>
      </b-col>
    <!-- /Login-->
    </b-row>
  </div>
</template>

<script>
import { togglePasswordVisibility } from '@core/mixins/ui/forms'
// import store from '@/store/index'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
  mixins: [togglePasswordVisibility],
  data() {
    return {
      password: '',
      userEmail: '',
      // validation rulesimport store from '@/store/index'
    }
  },
  computed: {
    passwordToggleIcon() {
      return this.passwordFieldType === 'password' ? 'EyeIcon' : 'EyeOffIcon'
    },
  },
  methods: {
    login() {
      this.$store
        .dispatch('auth/login', { email: this.userEmail, password: this.password })
        .then(() => {
          this.$toast({
            component: ToastificationContent,
            props: {
              title: 'Welcome Back👋',
              icon: 'CheckCircleIcon',
              variant: 'success',
            },
          })
        }).catch(error => {
          this.$toast({
            component: ToastificationContent,
            props: {
              title: 'Oops..',
              text: error.response.data.error,
              icon: 'AlertCircleIcon',
              variant: 'danger',
            },
          })
        })
    },
  },
}
</script>

<style lang="scss">
@import '@core/scss/vue/pages/page-auth.scss';
.auth-wrapper.auth-v2 .brand-logo {
    position: relative;
    top: 0;
    left: 0;
    z-index: 1;
}
.login-logo {
  width: auto;
  height: 80px;
}
</style>
