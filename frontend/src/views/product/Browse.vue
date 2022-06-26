<template>
    <section>
        <b-row>
            <b-col cols="12">
                <b-overlay
                    :show="products.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="productCard"
                        title="Products List"
                        action-collapse
                    >
                        <b-modal
                            id="delete-product-modal"
                            title="Are you sure?"
                            ok-only
                            ok-variant="danger"
                            ok-title="Yes, Delete"
                            modal-class="modal-danger"
                            centered
                            no-close-on-backdrop
                        >
                            <b-card-text>
                                You will not be able to retrieve this again!
                            </b-card-text>
                        </b-modal>
                        <b-row>
                            <b-col
                                cols="6"
                                align-h="center"
                            >
                                <b-button
                                    v-if="can('create-product')"
                                    v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                    class="my-1"
                                    size="sm"
                                    variant="primary"
                                    to="/products/create"
                                >
                                    <feather-icon
                                        icon="PlusIcon"
                                        class="mr-50"
                                    />
                                    <span class="align-middle">Create Product</span>
                                </b-button>
                            </b-col>
                            <b-col cols="12">
                                <b-table
                                    responsive
                                    :outlined="true"
                                    :items="products.data"
                                    :fields="products.fields"
                                    :head-variant="'dark'"
                                >
                                    <!-- A virtual column -->
                                    <template #cell(index)="data">
                                        {{ products.meta.current_page * products.recordsPerPage - products.recordsPerPage + data.index + 1 }}
                                    </template>
                                    <template #cell(category)="data">
                                        {{ data.item.category?data.item.category.name_en:'-' }}
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
                                              v-if="can('view-product')"
                                              v-b-tooltip.hover.v-primary
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="View Products"
                                              variant="primary"
                                              class="btn-icon rounded-circle"
                                              :to="`/products/${data.item.id}`"
                                          >
                                            <feather-icon icon="EyeIcon"/>
                                          </b-button>
                                          <b-button
                                              v-if="can('edit-product')"
                                              v-b-tooltip.hover.v-warning
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="Edit Product"
                                              variant="warning"
                                              class="btn-icon rounded-circle ml-1"
                                              :to="`/products/${data.item.id}/edit`"
                                          >
                                            <feather-icon icon="EditIcon"/>
                                          </b-button>
                                          <b-button
                                              v-if="can('delete-product')"
                                              v-b-tooltip.hover.v-danger
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="Delete Product"
                                              variant="danger"
                                              class="btn-icon rounded-circle ml-1"
                                              @click="deleteProduct(data)"
                                          >
                                            <feather-icon icon="TrashIcon"/>
                                          </b-button>
                                        </span>
                                    </template>
                                </b-table>
                            </b-col>
                            <b-col
                                md="2"
                                sm="4"
                                xs="4"
                                class="my-1"
                            >
                                <b-form-group class="mb-0">
                                    <label class="d-inline-block text-sm-left mr-50">Per page</label>
                                    <b-form-select
                                        id="perPageSelect"
                                        v-model="products.recordsPerPage"
                                        size="sm"
                                        :options="products.paginateOptions"
                                        class="w-50"
                                        @change="browseProducts(1)"
                                    />
                                </b-form-group>
                            </b-col>
                            <b-col
                                md="10"
                                sm="8"
                                xs="8"
                                class="my-1"
                            >
                                <b-pagination
                                    v-model="products.meta.current_page"
                                    :total-rows="products.meta.total"
                                    :per-page="products.recordsPerPage"
                                    align="right"
                                    class="my-0"
                                    first-number
                                    last-number
                                    prev-class="prev-item"
                                    next-class="next-item"
                                    @change="browseProducts"
                                >
                                    <template #prev-text>
                                        <feather-icon
                                            icon="ChevronLeftIcon"
                                            size="18"
                                        />
                                    </template>
                                    <template #next-text>
                                        <feather-icon
                                            icon="ChevronRightIcon"
                                            size="18"
                                        />
                                    </template>
                                </b-pagination>
                            </b-col>
                        </b-row>
                    </b-card-actions>
                </b-overlay>
            </b-col>
        </b-row>
    </section>
</template>

<script>
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import Ripple from 'vue-ripple-directive'

export default {
    name: 'BrowseProducts',
    directives: {
        Ripple,
    },
    data: () => ({
        products: {
            isLoading: false,
            filter: '',
            paginateOptions: [5, 10, 25, 50, 100, 250],
            recordsPerPage: 5,
            fields: [
                {key: 'index', label: '#'},
                {key: 'title_en', label: 'Title'},
                {key: 'category', label: 'Category'},
                {key: 'created_at', label: 'Created At'},
                {key: 'updated_at', label: 'Created At'},
                'Action',
            ],
            data: [],
            meta: {
                count: 0,
                current_page: 1,
                links: {},
                per_page: 0,
                total: 0,
                total_pages: 0,
            },
        },
    }),
    mounted() {
        this.browseProducts(this.products.meta.current_page)
    },
    methods: {
        browseProducts(page) {
            this.products.isLoading = true
            this.$store.dispatch('product/browse', `?paginate=${this.products.recordsPerPage}&page=${page}`).then(response => {
                this.products.data = response.data.data.data
                this.products.meta = response.data.data.meta.pagination
                this.products.isLoading = false
            }).catch(error => {
                console.error(error)
                this.products.isLoading = false
            })
        },

        deleteProduct(data) {
            this.$bvModal.msgBoxConfirm('You will not be able to retrieve this again!', {
                title: 'Are you sure?',
                size: 'sm',
                okTitle: 'Yes, Delete!',
                okVariant: 'danger',
                cancelTitle: 'Cancel',
                cancelVariant: 'outline-primary',
                centered: true,
            }).then(confirmed => {
                if (confirmed) {
                    this.$store.dispatch('product/delete', data.item.id).then(response => {
                        this.products.data = this.products.data.filter(product => product.id !== data.item.id)
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
                        console.log(error)
                    })
                }
            })
        },
    },
}
</script>

<style>
.table .thead-dark th {
    background-color: #195cff !important;
    border-color: #195cff !important;
}
.dark-layout .table thead.thead-dark th, [dir] .dark-layout .table tfoot.thead-dark th {
    color: white !important;
}
</style>
