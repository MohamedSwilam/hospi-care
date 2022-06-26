<template>
    <section id="product-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="product_detail.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="createProductDetail"
                            title="Add Product Detail"
                            action-collapse
                        >
                            <validation-observer
                                ref="createProductDetailForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(createProductDetail)">
                                    <b-row>
                                        <b-col
                                            lg="6"
                                            md="6"
                                            sm="12"
                                            xs="12"
                                        >
                                            <b-form-group
                                                label="Detail Title EN"
                                                label-for="detail_title_en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Detail Title EN"
                                                    vid="`detail_title_en`"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AlertOctagonIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="detail_title_en"
                                                            v-model="product_detail.form.title_en"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Detail Title EN"
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
                                                label="Detail Title FR"
                                                label-for="detail_title_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Detail Title FR"
                                                    vid="`detail_title_fr`"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AlertOctagonIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="detail_title_fr"
                                                            v-model="product_detail.form.title_fr"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Detail Title FR"
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
                                                label="Detail Value EN"
                                                label-for="detail_value_en"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Detail Value EN"
                                                    vid="`detail_value_en`"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AlertOctagonIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="detail_value_en"
                                                            v-model="product_detail.form.value_en"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Detail Value EN"
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
                                                label="Detail Value FR"
                                                label-for="detail_value_fr"
                                            >
                                                <validation-provider
                                                    v-slot="{ errors }"
                                                    rules="required"
                                                    name="Detail Value FR"
                                                    vid="`detail_value_fr`"
                                                >
                                                    <b-input-group :class="errors.length === 0  ? '' : 'is-invalid'">
                                                        <b-input-group-prepend is-text>
                                                            <feather-icon icon="AlertOctagonIcon" />
                                                        </b-input-group-prepend>
                                                        <b-form-input
                                                            id="detail_value_fr"
                                                            v-model="product_detail.form.value_fr"
                                                            :state="errors.length > 0 ? false:null"
                                                            placeholder="Detail Value FR"
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
                                                        :disabled="product_detail.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="product_detail.isLoading">
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
    name: 'AddProductDetail',
    directives: {
        Ripple,
    },
    data: () => ({
        product_detail: {
            isCardLoading: false,
            isLoading: false,
            categories: [],
            details: [0],
            form: {
                product_id: null,
                title_en: '',
                title_fr: '',
                value_en: '',
                value_fr: '',
            },
        },
    }),
    mounted() {
        this.product_detail.form.product_id = this.$route.params.id
    },
    methods: {
        createProductDetail() {
            this.product_detail.isLoading = true
            this.$store.dispatch('productDetail/create', this.product_detail.form).then(response => {
                this.product_detail.isLoading = false
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
                this.$router.push(`/products/${this.$route.params.id}`)
            }).catch(error => {
                this.product_detail.isLoading = false
                this.$refs.createProductForm.setErrors(error.response.data.errors)
            })
        },
        reset() {
            this.product.form.title_en = ''
            this.product.form.title_fr = ''
            this.product.form.value_en = ''
            this.product.form.value_fr = ''
        },
    },
}
</script>

<style>
</style>
