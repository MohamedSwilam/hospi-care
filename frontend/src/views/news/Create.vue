<template>
    <section id="news-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="news.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="createNews"
                            title="Create News"
                            action-collapse
                        >
                            <validation-observer
                                ref="createNewsForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(createNews)">
                                    <b-row>
                                        <!-- Photo -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Main Photo"
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
                                                            v-model="news.form.photo"
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
                                                            v-model="news.form.site_id"
                                                            :options="news.sites"
                                                            :state="errors.length > 0 ? false:null"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Title (EN) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Title (EN)"
                                                label-for="title_en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Title (EN)"
                                                    vid="title_en"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AirplayIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="title_en"
                                                            v-model="news.form.title_en"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Title (EN)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Title (FR) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Title (FR)"
                                                label-for="title_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Title (FR)"
                                                    vid="title_fr"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AirplayIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="title_fr"
                                                            v-model="news.form.title_fr"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Title (FR)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Details (EN) -->
                                        <b-col cols="12">
                                            <b-form-group
                                                label="Details (EN)"
                                                label-for="details_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Details (EN)"
                                                    vid="details_en"
                                                >
                                                    <quill-editor
                                                        id="details_en"
                                                        v-model="news.form.details_en"
                                                        :state="errors.length > 0 ? false:null"
                                                    />
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Details (FR) -->
                                        <b-col cols="12">
                                            <b-form-group
                                                label="Details (FR)"
                                                label-for="details_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Details (FR)"
                                                    vid="details_fr"
                                                >
                                                    <quill-editor
                                                        id="details_fr"
                                                        v-model="news.form.details_fr"
                                                        :state="errors.length > 0 ? false:null"
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
                                                        :disabled="news.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="news.isLoading">
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
// eslint-disable-next-line
import 'quill/dist/quill.core.css'
// eslint-disable-next-line
import 'quill/dist/quill.snow.css'
// eslint-disable-next-line
import 'quill/dist/quill.bubble.css'

import { quillEditor } from 'vue-quill-editor'

export default {
    name: 'CreateNews',
    directives: {
        Ripple,
    },
    components: {
        quillEditor,
    },
    data: () => ({
        news: {
            isCardLoading: false,
            isLoading: false,
            sites: [],
            form: {
                title_en: '',
                title_fr: '',
                details_en: '',
                details_fr: '',
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
            this.news.isCardLoading = true
            this.$store.dispatch('site/browse', '').then(response => {
                this.news.sites = this.reformatSitesData(response.data.data.data)
                this.news.isCardLoading = false
            }).catch(error => {
                console.error(error)
                this.news.isCardLoading = false
            })
        },
        reformatSitesData(sites) {
            const reformatted = [{ value: null, text: 'Select a site' }]
            sites.forEach(site => {
                reformatted.push({ value: site.id, text: site.name })
            })
            return reformatted
        },

        createNews() {
            this.news.isLoading = true
            let data = new FormData();
            Object.keys(this.news.form).forEach(key => {
                data.append(key, this.news.form[key])
            })
            this.$store.dispatch('news/create', data).then(response => {
                this.news.isLoading = false
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
                this.$router.push(`/news`)
            }).catch(error => {
                this.$refs.createNewsForm.setErrors(error.response.data.errors)
                this.news.isLoading = false
            })
        },
        reset() {
            this.news.form.title_en = ''
            this.news.form.title_fr = ''
            this.news.form.details_en = ''
            this.news.form.details_fr = ''
            this.news.form.site_id = null
            this.news.form.photo = null
        },
    },
}
</script>

<style>
</style>
