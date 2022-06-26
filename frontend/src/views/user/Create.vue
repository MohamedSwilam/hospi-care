<template>
    <section id="user-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="user.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="createUser"
                            title="Create User"
                            action-collapse
                        >
                            <validation-observer
                                ref="createUserForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(createUser)">
                                    <b-row>
                                        <!-- Role -->
                                        <b-col
                                            lg="12"
                                            md="12"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Role"
                                                label-for="role"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Role"
                                                    vid="role"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="ShieldIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-select
                                                            v-model="user.form.role"
                                                            :options="user.roles"
                                                            :state="errors.length > 0 ? false:null"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Name -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Name"
                                                label-for="name"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Name"
                                                    vid="name"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="UserIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="name"
                                                            v-model="user.form.name"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Name"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Email -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Email"
                                                label-for="email"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required|email"
                                                    name="Email"
                                                    vid="email"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="MailIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="code"
                                                            v-model="user.form.email"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Email"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Password -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Password"
                                                label-for="password"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required|password"
                                                    name="Password"
                                                    vid="password"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="LockIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="password"
                                                            v-model="user.form.password"
                                                            type="password"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Password"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Confirm Password -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Confirm Password"
                                                label-for="confirm-password"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required|confirmed:password"
                                                    name="Confirm Password"
                                                    vid="confirm-password"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="LockIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="confirm-password"
                                                            v-model="user.form.confirm_password"
                                                            type="password"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Confirm Password"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- submit and reset -->
                                        <b-col cols="12">
                                            <b-container>
                                                <b-row
                                                    class="mt-1"
                                                    align-h="center"
                                                >
                                                    <b-button
                                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                                        type="submit"
                                                        :disabled="user.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="user.isLoading">
                                                            <b-spinner small />
                                                            Loading...
                                                        </template>
                                                        <template v-else>
                                                            <feather-icon
                                                                icon="SaveIcon"
                                                                class="mr-50"
                                                            />
                                                            <span class="align-middle">Submit</span>
                                                        </template>
                                                    </b-button>
                                                    <b-button
                                                        v-ripple.400="'rgba(186, 191, 199, 0.15)'"
                                                        type="reset"
                                                        variant="warning"
                                                        @click="reset"
                                                    >
                                                        <feather-icon
                                                            icon="RefreshCcwIcon"
                                                            class="mr-50"
                                                        />
                                                        <span class="align-middle">Reset</span>
                                                    </b-button>
                                                </b-row>
                                            </b-container>
                                        </b-col>
                                    </b-row>
                                </b-form>
                            </validation-observer>
                        </b-card-actions>
                    </b-overlay>
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>

<script>
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
    name: 'CreateUser',
    directives: {
        Ripple,
    },
    data: () => ({
        user: {
            roles: [],
            isCardLoading: false,
            isLoading: false,
            form: {
                role: null,
                name: '',
                email: '',
                password: '',
                confirm_password: '',
            },
        },
    }),
    mounted() {
        this.browseRoles()
    },
    methods: {
        browseRoles() {
            this.user.isCardLoading = true
            this.$store.dispatch('rolesAndPermissions/browse', '').then(response => {
                this.user.roles = [{ value: null, text: 'Select a role' }]
                response.data.data.data.forEach(role => {
                    this.user.roles.push({
                        value: role.name,
                        text: role.name,
                    })
                })
                this.user.isCardLoading = false
            }).catch(error => {
                console.error(error)
                this.user.isCardLoading = false
            })
        },
        createUser() {
            this.user.isLoading = true
            this.$store.dispatch('user/create', this.user.form).then(response => {
                this.user.isLoading = false
                this.$toast({
                    component: ToastificationContent,
                    props: {
                        title: 'Success',
                        icon: 'CheckCircleIcon',
                        text: response.data.message,
                        variant: 'success',
                    },
                },
                {
                    position: 'bottom-right',
                    timeout: 5000,
                })
                this.$router.push(`/users/${response.data.data.data.id}`)
            }).catch(error => {
                this.$refs.createUserForm.setErrors(error.response.data.errors)
                this.user.isLoading = false
            })
        },
        reset() {
            this.user.form.role = null
            this.user.form.name = ''
            this.user.form.email = ''
            this.user.form.password = ''
            this.user.form.confirm_password = ''
        },
    },
}
</script>

<style>
</style>
