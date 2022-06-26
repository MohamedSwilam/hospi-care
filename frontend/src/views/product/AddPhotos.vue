<template>
    <section id="product-form">
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-overlay
                        :show="product_photo.isCardLoading"
                        rounded="sm"
                    >
                        <b-card-actions
                            ref="createProductPhoto"
                            title="Add Product Photos"
                            action-collapse
                        >
                            <validation-observer
                                ref="createProductPhotosForm"
                                v-slot="{ handleSubmit }"
                            >
                                <b-form @submit.prevent="handleSubmit(createProductPhotos)">
                                    <b-row>
                                        <!-- Photo -->
                                        <b-col cols="12">
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
                                                            v-model="product_photo.form.photos"
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
                                                        :disabled="product_photo.isLoading"
                                                        variant="primary"
                                                        class="mr-1"
                                                    >
                                                        <template v-if="product_photo.isLoading">
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
    name: 'AddProductPhoto',
    directives: {
        Ripple,
    },
    data: () => ({
        product_photo: {
            isCardLoading: false,
            isLoading: false,
            categories: [],
            details: [0],
            form: {
                product_id: null,
                photos: [],
            },
        },
    }),
    mounted() {
        this.product_photo.form.product_id = this.$route.params.id
    },
    methods: {
        createProductPhotos() {
            this.product_photo.isLoading = true
            let data = new FormData();
            Object.keys(this.product_photo.form).forEach(key => {
                if (key === 'photos') {
                    this.product_photo.form.photos.forEach((photo, index) => {
                        data.append(`photos[${index}]`, photo)
                    })
                } else {
                    data.append(key, this.product_photo.form[key])
                }
            })
            this.$store.dispatch('productPhoto/create', data).then(response => {
                this.product_photo.isLoading = false
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
                this.product_photo.isLoading = false
                this.$refs.createProductForm.setErrors(error.response.data.errors)
            })
        },
        reset() {
            this.product.form.photos = []
        },
    },
}
</script>

<style>
</style>
