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
                            ref="createProduct"
                            title="Create Product"
                            action-collapse
                        >
                            <validation-observer
                                ref="createProductForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(createProduct)">
                                    <b-row>
                                        <!-- Photo -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Product Photos"
                                                label-for="photo"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Photos"
                                                    vid="photo"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="ImageIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-file
                                                            id="photo"
                                                            v-model="product.form.photos"
                                                            :state="errors.length > 0 ? false:null"
                                                            accept="image/*"
                                                            multiple
                                                            placeholder="Choose images or drop them here..."
                                                            drop-placeholder="Drop images here..."
                                                        />
                                                    </b-input-group>
                                                    <small class="text-danger">{{ errors[0] }}</small>
                                                </validation-provider>
                                            </b-form-group>
                                        </b-col>
                                        <!-- Category -->
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
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
                                        <!-- Product Details -->
                                        <b-col
                                            lg="12"
                                            md="12"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-row>
                                                <b-col
                                                    cols="12"
                                                    class="mb-2 mt-2"
                                                >
                                                    <h3>
                                                        Product Details
                                                        <b-button
                                                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                                            variant="primary"
                                                            size="sm"
                                                            class="btn-icon rounded-circle ml-1"
                                                            @click="addProductDetail"
                                                        >
                                                            <feather-icon icon="PlusIcon" />
                                                        </b-button>
                                                    </h3>
                                                </b-col>
                                            </b-row>
                                            <b-row
                                                v-for="(el, index) in product.details"
                                                :key="index"
                                            >
                                                <b-col
                                                    lg="6"
                                                    md="6"
                                                    sm="12"
                                                    xs="12"
                                                >
                                                    <b-form-group
                                                        :label="`Detail Title EN ${index + 1}`"
                                                        label-for="detail_title_en"
                                                    >
                                                        <validation-provider
                                                            v-slot="{ errors }"
                                                            rules="required"
                                                            :name="`Detail Title EN ${index + 1}`"
                                                            :vid="`detail-title-en-${index}`"
                                                        >
                                                            <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                                <b-input-group-prepend is-text>
                                                                    <feather-icon icon="AlertOctagonIcon" />
                                                                </b-input-group-prepend>
                                                                <b-form-input
                                                                    :id="`detail-title-en-${index}`"
                                                                    v-model="product.form.details[index].title_en"
                                                                    :state="errors.length > 0 ? false:null"
                                                                    :placeholder="`Detail Title EN ${index + 1}`"
                                                                />
                                                            </b-input-group>
                                                            <small class="text-danger">{{ errors[0] }}</small>
                                                        </validation-provider>
                                                    </b-form-group>
                                                </b-col>
                                                <b-col
                                                    lg="6"
                                                    md="6"
                                                    sm="12"
                                                    xs="12"
                                                >
                                                    <b-form-group
                                                        :label="`Detail Title FR ${index + 1}`"
                                                        label-for="detail_title_fr"
                                                    >
                                                        <validation-provider
                                                            v-slot="{ errors }"
                                                            rules="required"
                                                            :name="`Detail Title FR ${index + 1}`"
                                                            :vid="`detail-title-fr-${index}`"
                                                        >
                                                            <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                                <b-input-group-prepend is-text>
                                                                    <feather-icon icon="AlertOctagonIcon" />
                                                                </b-input-group-prepend>
                                                                <b-form-input
                                                                    :id="`detail-title-fr-${index}`"
                                                                    v-model="product.form.details[index].title_fr"
                                                                    :state="errors.length > 0 ? false:null"
                                                                    :placeholder="`Detail Title FR ${index + 1}`"
                                                                />
                                                            </b-input-group>
                                                            <small class="text-danger">{{ errors[0] }}</small>
                                                        </validation-provider>
                                                    </b-form-group>
                                                </b-col>
                                                <b-col
                                                    lg="6"
                                                    md="6"
                                                    sm="12"
                                                    xs="12"
                                                >
                                                    <b-form-group
                                                        :label="`Detail Value EN ${index + 1}`"
                                                        label-for="detail_value_en"
                                                    >
                                                        <validation-provider
                                                            v-slot="{ errors }"
                                                            rules="required"
                                                            :name="`Detail Value EN ${index + 1}`"
                                                            :vid="`detail-value-en-${index}`"
                                                        >
                                                            <b-form-textarea
                                                                :id="`detail-value-en-${index}`"
                                                                v-model="product.form.details[index].value_en"
                                                                :state="errors.length > 0 ? false:null"
                                                                :placeholder="`Detail Value EN ${index + 1}`"
                                                                rows="3"
                                                            />
                                                            <small class="text-danger">{{ errors[0] }}</small>
                                                        </validation-provider>
                                                    </b-form-group>
                                                </b-col>
                                                <b-col
                                                    lg="6"
                                                    md="6"
                                                    sm="12"
                                                    xs="12"
                                                >
                                                    <b-form-group
                                                        :label="`Detail Value FR ${index + 1}`"
                                                        label-for="detail_value_fr"
                                                    >
                                                        <validation-provider
                                                            v-slot="{ errors }"
                                                            rules="required"
                                                            :name="`Detail Value FR ${index + 1}`"
                                                            :vid="`detail-value-fr-${index}`"
                                                        >
                                                            <b-form-textarea
                                                                :id="`detail-value-fr-${index}`"
                                                                v-model="product.form.details[index].value_fr"
                                                                :state="errors.length > 0 ? false:null"
                                                                :placeholder="`Detail Value FR ${index + 1}`"
                                                                rows="3"
                                                            />
                                                            <small class="text-danger">{{ errors[0] }}</small>
                                                        </validation-provider>
                                                    </b-form-group>
                                                </b-col>
                                                <b-col
                                                    cols="12"
                                                    style="text-align: right;"
                                                >
                                                    <b-button
                                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                                        variant="danger"
                                                        class="mb-1"
                                                        :disabled="product.details.length === 1"
                                                        @click="removeProductDetail(index)"
                                                    >
                                                        <feather-icon icon="TrashIcon" />
                                                        <span class="align-middle">Remove Detail</span>
                                                    </b-button>
                                                </b-col>
                                            </b-row>
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
    name: 'CreateProduct',
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
                photos: [],
                details: [
                    {
                        title_en: '',
                        title_fr: '',
                        value_en: '',
                        value_fr: '',
                    }
                ],
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
                this.product.isCardLoading = false
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
        addProductDetail() {
            this.product.form.details.push({
                title_en: '',
                title_fr: '',
                value_en: '',
                value_fr: '',
            })
            this.product.details.push(this.product.details.length)
        },
        removeProductDetail(index) {
            this.product.details.splice(index, 1)
            this.product.form.details.splice(index, 1)
        },
        createProduct() {
            this.product.isLoading = true
            let data = new FormData();
            Object.keys(this.product.form).forEach(key => {
                if (key === 'photos') {
                    this.product.form.photos.forEach((photo, index) => {
                        data.append(`photos[${index}]`, photo)
                    })
                } else if (key === 'details') {
                    this.product.form.details.forEach((detail, index) => {
                        Object.keys(detail).forEach(detail_key => {
                            data.append(`details[${index}][${detail_key}]`, detail[detail_key])
                        })
                    })
                } else {
                    data.append(key, this.product.form[key])
                }
            })
            this.$store.dispatch('product/create', data).then(response => {
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
                this.$refs.createProductForm.setErrors(error.response.data.errors)
            })
        },
        reset() {
            this.product.form.title_en = ''
            this.product.form.title_fr = ''
            this.product.form.overview_en = ''
            this.product.form.overview_fr = ''
            this.product.form.description_en = ''
            this.product.form.description_fr = ''
            this.product.form.category_id = null
            this.product.form.photos = []
            this.product.details = [0]
            this.product.form.details = [
                {
                    title_en: '',
                    title_fr: '',
                    value_en: '',
                    value_fr: '',
                }
            ]
        },
    },
}
</script>

<style>
</style>
