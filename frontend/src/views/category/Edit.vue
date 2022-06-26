<template>
    <section id="category-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="category.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="editCategory"
                            title="Edit Category"
                            action-collapse
                        >
                            <validation-observer
                                ref="editCategoryForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(editCategory)">
                                    <b-row>
                                        <!-- Photo -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Category Photo"
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
                                                            v-model="category.form.photo"
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
                                                            v-model="category.form.site_id"
                                                            :options="category.sites"
                                                            :state="errors.length > 0 ? false:null"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Name(EN) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Name(EN)"
                                                label-for="name-en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Name(EN)"
                                                    vid="name-en"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="BoxIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="name-en"
                                                            v-model="category.form.name_en"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Name(EN)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>

                                        <!-- Name(FR) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Name(FR)"
                                                label-for="name-fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Name(FR)"
                                                    vid="name-fr"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="BoxIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="name-fr"
                                                            v-model="category.form.name_fr"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Name(FR)"
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
                                                        :disabled="category.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="category.isLoading">
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
    name: 'EditCategory',
    directives: {
        Ripple,
    },
    data: () => ({
        category: {
            isCardLoading: false,
            isLoading: false,
            sites: [],
            form: {
                name_en: '',
                name_fr: '',
                site_id: null,
            },
        },
    }),
    mounted() {
        this.browseSites()
    },
    methods: {
        browseSites() {
            this.category.isCardLoading = true
            this.$store.dispatch('site/browse', '').then(response => {
                this.category.sites = this.reformatSitesData(response.data.data.data)
                this.viewCategory();
            }).catch(error => {
                console.error(error)
                this.category.isCardLoading = false
            })
        },
        viewCategory() {
            this.category.isCardLoading = true
            this.$store.dispatch('category/view', this.$route.params.id).then(response => {
                this.category.form.name_en = response.data.data.data.name_en
                this.category.form.name_fr = response.data.data.data.name_fr
                this.category.form.site_id = response.data.data.data.site_id
                this.category.isCardLoading = false
            }).catch(error => {
                console.error(error)
                this.category.isCardLoading = false
            })
        },
        reformatSitesData(sites) {
            const reformatted = [{ value: null, text: 'Select a site' }]
            sites.forEach(site => {
                reformatted.push({ value: site.id, text: site.name })
            })
            return reformatted
        },

        editCategory() {
            this.category.isLoading = true
            let data = new FormData();
            Object.keys(this.category.form).forEach(key => {
                data.append(key, this.category.form[key])
            })
            this.$store.dispatch('category/update', { id: this.$route.params.id, data }).then(response => {
                this.category.isLoading = false
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
                this.$router.push(`/categories/${response.data.data.data.id}`)
            }).catch(error => {
                this.$refs.editCategoryForm.setErrors(error.response.data.errors)
                this.category.isLoading = false
            })
        },
        reset() {
            this.viewCategory();
        },
    },
}
</script>

<style>
</style>
