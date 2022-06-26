<template>
    <section>
        <b-row>
            <b-col cols="12">
                <b-overlay
                    :show="product.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="productCard"
                        title="Product Information"
                        action-collapse
                    >
                        <b-row>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>ID</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.id }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Category</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                <router-link :to="`/categories/${product.data.category.id}`">{{ product.data.category.name_en }}</router-link>
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Title EN</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.title_en }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Title FR</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.title_fr }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Overview EN</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.overview_en }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Overview FR</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.overview_fr }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Description EN</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.description_en }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Description FR</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.description_fr }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Created At</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.created_at | date(true) }} - {{ product.data.created_at | time }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Updated At</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ product.data.updated_at | date(true) }} - {{ product.data.updated_at | time }}
                            </b-col>
                        </b-row>
                        <hr>
                        <b-container>
                            <b-row
                                class="mt-1"
                                align-h="center"
                            >
                                <b-col
                                    cols="12"
                                    style="text-align: center;"
                                >
                                    <b-button
                                        v-if="can('edit-product')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="warning"
                                        :to="`/products/${product.data.id}/edit`"
                                    >
                                        <feather-icon
                                            icon="EditIcon"
                                            class="mr-50"
                                        />
                                        <span class="align-middle">Edit Product</span>
                                    </b-button>
                                    <b-button
                                        v-if="can('delete-product')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        class="ml-1"
                                        :disabled="product.isLoadingDelete"
                                        variant="danger"
                                        @click="deleteProduct(product.data.id)"
                                    >
                                        <template v-if="product.isLoadingDelete">
                                            <b-spinner small />
                                            Loading...
                                        </template>
                                        <template v-else>
                                            <feather-icon
                                                icon="TrashIcon"
                                                class="mr-50"
                                            />
                                            <span class="align-middle">Delete Product</span>
                                        </template>
                                    </b-button>
                                </b-col>
                            </b-row>
                        </b-container>
                    </b-card-actions>
                </b-overlay>
            </b-col>

            <b-col
                v-if="can('browse-product-photo')"
                cols="12"
            >
                <b-overlay
                    :show="product.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="productPhotosCard"
                        title="Product Photos"
                        action-collapse
                    >
                        <b-row>
                            <b-col
                                cols="6"
                                align-h="center"
                            >
                                <b-button
                                    v-if="can('create-product-photo')"
                                    v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                    class="my-1"
                                    size="sm"
                                    variant="primary"
                                    :to="`/products/${$route.params.id}/add-photos`"
                                >
                                    <feather-icon
                                        icon="PlusIcon"
                                        class="mr-50"
                                    />
                                    <span class="align-middle">Add Photos</span>
                                </b-button>
                            </b-col>
                            <b-col cols="12">
                                <b-table
                                    responsive
                                    :outlined="true"
                                    :items="product.data.product_photos"
                                    :fields="product.product_photos_fields"
                                    :head-variant="'dark'"
                                >
                                    <!-- A virtual column -->
                                    <template #cell(index)="data">
                                        {{ data.index + 1 }}
                                    </template>
                                    <template #cell(url)="data">
                                        <b-img
                                            :src="data.item.url"
                                            :alt="data.item.file_name"
                                            style="max-width: 120px;max-height: 120px;"
                                        />
                                    </template>
                                    <template #cell(created_at)="data">
                                        {{ data.item.created_at | date(true) }} - {{ data.item.created_at | time }}
                                    </template>
                                    <template #cell(updated_at)="data">
                                        {{ data.item.updated_at | date(true) }} - {{ data.item.updated_at | time }}
                                    </template>
                                    <template #cell(action)="data">
                                        <span class="text-nowrap">
                                          <b-button
                                              v-if="can('delete-product-photo')"
                                              v-b-tooltip.hover.v-danger
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="Delete Photo"
                                              variant="danger"
                                              class="btn-icon rounded-circle ml-1"
                                              @click="deletePhoto(data.item.id)"
                                          >
                                            <feather-icon icon="TrashIcon"/>
                                          </b-button>
                                        </span>
                                    </template>
                                </b-table>
                            </b-col>
                        </b-row>
                    </b-card-actions>
                </b-overlay>
            </b-col>

            <b-col
                v-if="can('browse-product-detail')"
                cols="12"
            >
                <b-overlay
                    :show="product.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="productDetailsCard"
                        title="Product Details"
                        action-collapse
                    >
                        <b-row>
                            <b-col
                                cols="6"
                                align-h="center"
                            >
                                <b-button
                                    v-if="can('create-product-detail')"
                                    v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                    class="my-1"
                                    size="sm"
                                    variant="primary"
                                    :to="`/products/${$route.params.id}/add-detail`"
                                >
                                    <feather-icon
                                        icon="PlusIcon"
                                        class="mr-50"
                                    />
                                    <span class="align-middle">Add Detail</span>
                                </b-button>
                            </b-col>
                            <b-col cols="12">
                                <b-table
                                    responsive
                                    :outlined="true"
                                    :items="product.data.product_details"
                                    :fields="product.product_details_fields"
                                    :head-variant="'dark'"
                                >
                                    <!-- A virtual column -->
                                    <template #cell(index)="data">
                                        {{ data.index + 1 }}
                                    </template>
                                    <template #cell(updated_at)="data">
                                        {{ data.item.updated_at | date(true) }} - {{ data.item.updated_at | time }}
                                    </template>
                                    <template #cell(action)="data">
                                        <span class="text-nowrap">
                                          <b-button
                                              v-if="can('edit-product-detail')"
                                              v-b-tooltip.hover.v-warning
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="Edit Detail"
                                              variant="warning"
                                              class="btn-icon rounded-circle ml-1"
                                              :to="`/products/${$route.params.id}/edit-detail/${data.item.id}`"
                                          >
                                            <feather-icon icon="EditIcon"/>
                                          </b-button>
                                            <b-button
                                              v-if="can('delete-product-detail')"
                                              v-b-tooltip.hover.v-danger
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="Delete Detail"
                                              variant="danger"
                                              class="btn-icon rounded-circle ml-1"
                                              @click="deleteDetail(data.item.id)"
                                          >
                                            <feather-icon icon="TrashIcon"/>
                                          </b-button>

                                        </span>
                                    </template>
                                </b-table>
                            </b-col>
                        </b-row>
                    </b-card-actions>
                </b-overlay>
            </b-col>
        </b-row>
    </section>
</template>

<script>
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
    name: 'ViewProduct',
    directives: {
        Ripple,
    },
    data: () => ({
        product: {
            isLoading: false,
            isLoadingDelete: false,
            product_photos_fields: [
                {key: 'index', label: '#'},
                {key: 'url', label: 'Photo'},
                {key: 'file_extension', label: 'File Extension'},
                {key: 'created_at', label: 'Created At'},
                {key: 'updated_at', label: 'Created At'},
                'Action',
            ],
            product_details_fields: [
                {key: 'index', label: '#'},
                {key: 'title_en', label: 'Title EN'},
                {key: 'title_fr', label: 'Title FR'},
                {key: 'value_en', label: 'Value EN'},
                {key: 'value_fr', label: 'Value FR'},
                {key: 'updated_at', label: 'Updated At'},
                'Action',
            ],
            data: {
                id: null,
                category: {
                    id: null,
                    name_en: '',
                },
                title_en: '',
                title_fr: '',
                overview_en: '',
                overview_fr: '',
                description_en: '',
                description_fr: '',
                createdAt: '',
                updatedAt: '',
                isDeleted: false,
                product_photos: [],
                product_details: [],
            },
        },
    }),
    mounted() {
        this.viewProduct()
    },
    methods: {
        viewProduct() {
            this.product.isLoading = true
            this.$store.dispatch('product/view', this.$route.params.id).then(response => {
                this.product.data = response.data.data.data
                this.product.isLoading = false
            }).catch(error => {
                console.error(error)
                this.product.isLoading = false
            })
        },
        deleteProduct(id) {
            this.$bvModal
                .msgBoxConfirm('You will not be able to retrieve this again!', {
                    title: 'Are you sure?',
                    size: 'sm',
                    okTitle: 'Yes, Delete',
                    okVariant: 'danger',
                    cancelTitle: 'Cancel',
                    cancelVariant: 'outline-primary',
                    centered: true,
                })
                .then(confirmed => {
                    if (confirmed) {
                        this.product.isLoadingDelete = true
                        this.$store.dispatch('product/delete', id).then(response => {
                            this.product.isLoadingDelete = false
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
                            this.$router.push('/products')
                        }).catch(error => {
                            console.error(error)
                            this.product.isLoadingDelete = false
                        })
                    }
                })
        },
        deletePhoto(id) {
            this.$bvModal
                .msgBoxConfirm('You will not be able to retrieve this again!', {
                    title: 'Are you sure?',
                    size: 'sm',
                    okTitle: 'Yes, Delete',
                    okVariant: 'danger',
                    cancelTitle: 'Cancel',
                    cancelVariant: 'outline-primary',
                    centered: true,
                })
                .then(confirmed => {
                    if (confirmed) {
                        this.$store.dispatch('productPhoto/delete', id).then(response => {
                            this.product.data.product_photos = this.product.data.product_photos.filter(photo => photo.id !== id)
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
                        }).catch(error => {
                            console.error(error)
                        })
                    }
                })
        },
        deleteDetail(id) {
            this.$bvModal
                .msgBoxConfirm('You will not be able to retrieve this again!', {
                    title: 'Are you sure?',
                    size: 'sm',
                    okTitle: 'Yes, Delete',
                    okVariant: 'danger',
                    cancelTitle: 'Cancel',
                    cancelVariant: 'outline-primary',
                    centered: true,
                })
                .then(confirmed => {
                    if (confirmed) {
                        this.$store.dispatch('productDetail/delete', id).then(response => {
                            this.product.data.product_details = this.product.data.product_details.filter(detail => detail.id !== id)
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
                        }).catch(error => {
                            console.error(error)
                        })
                    }
                })
        }
    },
}
</script>

<style scoped>

</style>
