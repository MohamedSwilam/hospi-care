<template>
    <section id="slider-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="slider.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="editSlider"
                            title="Edit Slider"
                            action-collapse
                        >
                            <validation-observer
                                ref="editSliderForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(editSlider)">
                                    <b-row>
                                        <!-- Photo -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Slider Photo"
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
                                                            v-model="slider.form.photo"
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
                                                            v-model="slider.form.site_id"
                                                            :options="slider.sites"
                                                            :state="errors.length > 0 ? false:null"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Main Title (EN) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Main Title (EN)"
                                                label-for="main-title-en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Main Title (EN)"
                                                    vid="main-title-en"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AirplayIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="main-title-en"
                                                            v-model="slider.form.main_title_en"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Main Title (EN)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Main Title (FR) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Main Title (FR)"
                                                label-for="main-title-fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Main Title (FR)"
                                                    vid="main-title-fr"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AirplayIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="main-title-fr"
                                                            v-model="slider.form.main_title_fr"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Main Title (FR)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Sub Title (EN) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Sub Title (EN)"
                                                label-for="sub-title-en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules=""
                                                    name="Sub Title (EN)"
                                                    vid="sub-title-en"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AlignCenterIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="sub-title-fr"
                                                            v-model="slider.form.sub_title_en"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Sub Title (EN)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Sub Title (FR) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Sub Title (FR)"
                                                label-for="sub-title-fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules=""
                                                    name="Sub Title (FR)"
                                                    vid="sub-title-fr"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AlignCenterIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="sub-title-fr"
                                                            v-model="slider.form.sub_title_fr"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Sub Title (FR)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Button URL -->
                                        <b-col cols="12">
                                            <b-form-group
                                                label="Button URL"
                                                label-for="button-url"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules=""
                                                    name="Button URL"
                                                    vid="button-url"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="LinkIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="button-url"
                                                            v-model="slider.form.button_url"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Button URL"
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
                                                        :disabled="slider.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="slider.isLoading">
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
    name: 'EditSlider',
    directives: {
        Ripple,
    },
    data: () => ({
        slider: {
            isCardLoading: false,
            isLoading: false,
            sites: [],
            form: {
                main_title_en: '',
                main_title_fr: '',
                sub_title_en: '',
                sub_title_fr: '',
                button_url: null,
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
            this.slider.isCardLoading = true
            this.$store.dispatch('site/browse', '').then(response => {
                this.slider.sites = this.reformatSitesData(response.data.data.data)
                this.viewSlider();
            }).catch(error => {
                console.error(error)
                this.slider.isCardLoading = false
            })
        },
        reformatSitesData(sites) {
            const reformatted = [{ value: null, text: 'Select a site' }]
            sites.forEach(site => {
                reformatted.push({ value: site.id, text: site.name })
            })
            return reformatted
        },

        viewSlider() {
            this.slider.isCardLoading = true
            this.$store.dispatch('slider/view', this.$route.params.id).then(response => {
                this.slider.form.main_title_en = response.data.data.data.main_title_en
                this.slider.form.main_title_fr = response.data.data.data.main_title_fr
                this.slider.form.sub_title_en = response.data.data.data.sub_title_en
                this.slider.form.sub_title_fr = response.data.data.data.sub_title_fr
                this.slider.form.button_url = response.data.data.data.button_url
                this.slider.form.site_id = response.data.data.data.site_id
                this.slider.isCardLoading = false
            }).catch(error => {
                console.error(error)
                this.slider.isCardLoading = false
            })
        },

        editSlider() {
            this.slider.isLoading = true
            let data = new FormData();
            Object.keys(this.slider.form).forEach(key => {
                if (key === 'photo') {
                    if (this.slider.form['photo']) data.append(key, this.slider.form[key])
                } else {
                    data.append(key, this.slider.form[key] === null?'':this.slider.form[key])
                }
            })
            this.$store.dispatch('slider/update', {
                id: this.$route.params.id,
                data: data,
            }).then(response => {
                this.slider.isLoading = false
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
                this.$router.push(`/sliders/${response.data.data.data.id}`)
            }).catch(error => {
                this.$refs.createSliderForm.setErrors(error.response.data.errors)
                this.slider.isLoading = false
            })
        },
        reset() {
            this.viewSlider();
        },
    },
}
</script>

<style>
</style>
