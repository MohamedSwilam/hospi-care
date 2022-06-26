<template>
    <section id="testimonial-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="testimonial.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="editTestimonial"
                            title="Edit Testimonial"
                            action-collapse
                        >
                            <validation-observer
                                ref="editTestimonialForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(editTestimonial)">
                                    <b-row>
                                        <!-- Photo -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Testimonial Photo"
                                                label-for="photo"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules=""
                                                    name="Photo"
                                                    vid="photo"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="ImageIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-file
                                                            id="photo"
                                                            v-model="testimonial.form.photo"
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
                                        <!-- Site -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Site"
                                                label-for="site"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Site"
                                                    vid="site"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="TvIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-select
                                                            v-model="testimonial.form.site_id"
                                                            :options="testimonial.sites"
                                                            :state="errors.length > 0 ? false:null"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Client Name -->
                                        <b-col cols="12">
                                            <b-form-group
                                                label="Client Name"
                                                label-for="client_name"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Client Name"
                                                    vid="client_name"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="UserIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="client_name"
                                                            v-model="testimonial.form.client_name"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Client Name"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Feedback (EN) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Feedback (EN)"
                                                label-for="feedback_en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Feedback (EN)"
                                                    vid="feedback_en"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="ThumbsUpIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="feedback_en"
                                                            v-model="testimonial.form.feedback_en"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Feedback (EN)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Feedback (FR) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Feedback (FR)"
                                                label-for="feedback_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Feedback (FR)"
                                                    vid="feedback_fr"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="ThumbsUpIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="feedback_fr"
                                                            v-model="testimonial.form.feedback_fr"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Feedback (FR)"
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
                                                        :disabled="testimonial.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="testimonial.isLoading">
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
    name: 'EditTestimonial',
    directives: {
        Ripple,
    },
    data: () => ({
        testimonial: {
            isCardLoading: false,
            isLoading: false,
            sites: [],
            form: {
                client_name: '',
                feedback_en: '',
                feedback_fr: '',
                site_id: null,
                photo: null,
            },
        },
    }),
    mounted() {
        this.browseSites()
    },
    methods: {
        browseSites() {
            this.testimonial.isCardLoading = true
            this.$store.dispatch('site/browse', '').then(response => {
                this.testimonial.sites = this.reformatSitesData(response.data.data.data)
                this.viewTestimonial();
            }).catch(error => {
                console.error(error)
                this.testimonial.isCardLoading = false
            })
        },
        reformatSitesData(sites) {
            const reformatted = [{ value: null, text: 'Select a site' }]
            sites.forEach(site => {
                reformatted.push({ value: site.id, text: site.name })
            })
            return reformatted
        },

        viewTestimonial() {
            this.testimonial.isCardLoading = true
            this.$store.dispatch('testimonial/view', this.$route.params.id).then(response => {
                this.testimonial.form.client_name = response.data.data.data.client_name
                this.testimonial.form.feedback_en = response.data.data.data.feedback_en
                this.testimonial.form.feedback_fr = response.data.data.data.feedback_fr
                this.testimonial.form.site_id = response.data.data.data.site_id
                this.testimonial.isCardLoading = false
            }).catch(error => {
                console.error(error)
                this.testimonial.isCardLoading = false
            })
        },

        editTestimonial() {
            this.testimonial.isLoading = true
            let data = new FormData();
            Object.keys(this.testimonial.form).forEach(key => {
                if (key === 'photo') {
                    if (this.testimonial.form['photo']) data.append(key, this.testimonial.form[key])
                } else {
                    data.append(key, this.testimonial.form[key])
                }
            })
            this.$store.dispatch('testimonial/update', {
                id: this.$route.params.id,
                data: data,
            }).then(response => {
                this.testimonial.isLoading = false
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
                this.$router.push(`/testimonials/${response.data.data.data.id}`)
            }).catch(error => {
                this.$refs.editTestimonialForm.setErrors(error.response.data.errors)
                this.testimonial.isLoading = false
            })
        },
        reset() {
            this.viewTestimonial();
        },
    },
}
</script>

<style>
</style>
