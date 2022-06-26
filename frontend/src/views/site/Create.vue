<template>
    <section id="site-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="site.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="createSite"
                            title="Create Site"
                            action-collapse
                        >
                            <validation-observer
                                ref="createSiteForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(createSite)">
                                    <b-row>
                                        <!-- Photo -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Site Photo"
                                                label-for="photo"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Photo"
                                                    vid="photo"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="ImageIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-file
                                                            id="photo"
                                                            v-model="site.form.photo"
                                                            :state="errors.length > 0 ? false:null"
                                                            accept="image/*"
                                                            placeholder="Choose an image or drop it here..."
                                                            drop-placeholder="Drop image here..."
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Catalog -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Catalog File"
                                                label-for="catalog"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Catalog"
                                                    vid="catalog"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="FileIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-file
                                                            id="catalog"
                                                            v-model="site.form.catalog"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Choose a file or drop it here..."
                                                            drop-placeholder="Drop file here..."
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
                                                            <feather-icon icon="TvIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="name"
                                                            v-model="site.form.name"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Name"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Slug -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Slug"
                                                label-for="slug"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required|alpha-dash"
                                                    name="Slug"
                                                    vid="slug"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="LinkIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="slug"
                                                            v-model="site.form.slug"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Slug"
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
                                                label="Contact Email"
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
                                                            id="email"
                                                            v-model="site.form.email"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Email"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Phone -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Contact Phone"
                                                label-for="phone"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Phone"
                                                    vid="phone"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="PhoneIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="phone"
                                                            v-model="site.form.phone"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Phone"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Location Description -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Location Description"
                                                label-for="location-description"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Location Description"
                                                    vid="location-description"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="MapIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="location-description"
                                                            v-model="site.form.location_description"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Location Description"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Location URL -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Location URL"
                                                label-for="location-url"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Location URL"
                                                    vid="location-url"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="MapPinIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="location-description"
                                                            v-model="site.form.location_url"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Location URL"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- About -->
                                        <b-col cols="12">
                                            <b-form-group
                                                label="About Statement"
                                                label-for="about"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="About"
                                                    vid="about"
                                                >
                                                    <b-form-textarea
                                                        id="about"
                                                        v-model="site.form.about"
                                                        :state="errors.length > 0 ? false:null"
                                                        placeholder="About Statement"
                                                        rows="3"
                                                    />
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
                                                        :disabled="site.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="site.isLoading">
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
    name: 'CreateSite',
    directives: {
        Ripple,
    },
    data: () => ({
        site: {
            isCardLoading: false,
            isLoading: false,
            form: {
                name: '',
                slug: '',
                about: '',
                phone: '',
                email: '',
                location_description: '',
                location_url: '',
                photo: null,
                catalog: null,
            },
        },
    }),
    methods: {
        createSite() {
            this.site.isLoading = true
            let data = new FormData();
            Object.keys(this.site.form).forEach(key => {
                data.append(key, this.site.form[key])
            })
            this.$store.dispatch('site/create', data).then(response => {
                this.site.isLoading = false
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
                this.$router.push(`/sites/${response.data.data.data.id}`)
            }).catch(error => {
                this.$refs.createSiteForm.setErrors(error.response.data.errors)
                this.site.isLoading = false
            })
        },
        reset() {
            this.site.form.name = ''
            this.site.form.email = ''
            this.site.form.slug = ''
            this.site.form.about = ''
            this.site.form.phone = ''
            this.site.form.location_description = ''
            this.site.form.location_url = ''
        },
    },
}
</script>

<style>
</style>
