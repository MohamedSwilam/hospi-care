<template>
    <section id="product-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="product.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="editProduct"
                            title="Edit Product"
                            action-collapse
                        >
                            <validation-observer
                                ref="editProductForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(editProduct)">
                                    <b-row>
                                        <!-- Category -->
                                        <b-col cols="12">
                                            <b-form-group
                                                label="Category"
                                                label-for="category"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Category"
                                                    vid="category"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="TvIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-select
                                                            id="category"
                                                            v-model="product.form.category_id"
                                                            :options="product.categories"
                                                            :state="errors.length > 0 ? false:null"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Title(En) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Title(EN)"
                                                label-for="title_en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Title(EN)"
                                                    vid="title_en"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="PackageIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="title_en"
                                                            v-model="product.form.title_en"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Title(EN)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Title(Fr) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Title(FR)"
                                                label-for="title_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Title(FR)"
                                                    vid="title_fr"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="PackageIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="title_fr"
                                                            v-model="product.form.title_fr"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Title(FR)"
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Overview(EN) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Overview(EN)"
                                                label-for="overview_en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Overview(EN)"
                                                    vid="overview_en"
                                                >
                                                    <b-form-textarea
                                                        id="overview_en"
                                                        v-model="product.form.overview_en"
                                                        :state="errors.length > 0 ? false:null"
                                                        placeholder="Overview(EN)"
                                                        rows="3"
                                                    />
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Overview(FR) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Overview(FR)"
                                                label-for="overview_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Overview(FR)"
                                                    vid="overview_fr"
                                                >
                                                    <b-form-textarea
                                                        id="overview_fr"
                                                        v-model="product.form.overview_fr"
                                                        :state="errors.length > 0 ? false:null"
                                                        placeholder="Overview(FR)"
                                                        rows="3"
                                                    />
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Description(EN) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Description(EN)"
                                                label-for="description_en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Description(EN)"
                                                    vid="description_en"
                                                >
                                                    <b-form-textarea
                                                        id="description_en"
                                                        v-model="product.form.description_en"
                                                        :state="errors.length > 0 ? false:null"
                                                        placeholder="Description(EN)"
                                                        rows="3"
                                                    />
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Description(FR) -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Description(FR)"
                                                label-for="description_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Description(FR)"
                                                    vid="description_fr"
                                                >
                                                    <b-form-textarea
                                                        id="description_fr"
                                                        v-model="product.form.description_fr"
                                                        :state="errors.length > 0 ? false:null"
                                                        placeholder="Description(FR)"
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
                                                        :disabled="product.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="product.isLoading">
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
    name: 'EditProduct',
    directives: {
        Ripple,
    },
    data: () => ({
        product: {
            isCardLoading: false,
            isLoading: false,
            categories: [],
            details: [0],
            form: {
                title_en: '',
                title_fr: '',
                overview_en: '',
                overview_fr: '',
                description_en: '',
                description_fr: '',
                category_id: null,
            },
        },
    }),
    mounted() {
        this.browseCategories()
    },
    methods: {
        browseCategories() {
            this.product.isCardLoading = true
            this.$store.dispatch('category/browse', '').then(response => {
                this.product.categories = this.reformatCategoriesData(response.data.data.data)
                this.viewProduct();
            }).catch(error => {
                console.error(error)
                this.product.isCardLoading = false
            })
        },
        reformatCategoriesData(categories) {
            const reformatted = [{ value: null, text: 'Select a category' }]
            categories.forEach(category => {
                reformatted.push({ value: category.id, text: category.name_en })
            })
            return reformatted
        },
        viewProduct() {
            this.product.isCardLoading = true
            this.$store.dispatch('product/view', this.$route.params.id).then(response => {
                this.product.form.title_en = response.data.data.data.title_en
                this.product.form.title_fr = response.data.data.data.title_fr
                this.product.form.overview_en = response.data.data.data.overview_en
                this.product.form.overview_fr = response.data.data.data.overview_fr
                this.product.form.description_en = response.data.data.data.description_en
                this.product.form.description_fr = response.data.data.data.description_fr
                this.product.form.category_id = response.data.data.data.category_id
                this.product.isCardLoading = false
            }).catch(error => {
                console.error(error)
                this.product.isCardLoading = false
            })
        },
        editProduct() {
            this.product.isLoading = true
            this.$store.dispatch('product/update', {
                id: this.$route.params.id,
                data: this.product.form
            }).then(response => {
                this.product.isLoading = false
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
                this.$router.push(`/products/${response.data.data.data.id}`)
            }).catch(error => {
                this.product.isLoading = false
                this.$refs.editProductForm.setErrors(error.response.data.errors)
            })
        },
        reset() {
            this.viewProduct();
        },
    },
}
</script>

<style>
</style>
