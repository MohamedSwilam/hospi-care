<template>
    <section>
        <b-row>
            <b-col cols="12">
                <b-overlay
                    :show="sliders.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="sliderCard"
                        title="Sliders List"
                        action-collapse
                    >
                        <b-modal
                            id="delete-slider-modal"
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
                                    v-if="can('create-slider')"
                                    v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                    class="my-1"
                                    size="sm"
                                    variant="primary"
                                    to="/sliders/create"
                                >
                                    <feather-icon
                                        icon="PlusIcon"
                                        class="mr-50"
                                    />
                                    <span class="align-middle">Create Slider</span>
                                </b-button>
                            </b-col>
                            <b-col cols="12">
                                <b-table
                                    responsive
                                    :outlined="true"
                                    :items="sliders.data"
                                    :fields="sliders.fields"
                                    :head-variant="'dark'"
                                >
                                    <!-- A virtual column -->
                                    <template #cell(index)="data">
                                        {{ sliders.meta.current_page * sliders.recordsPerPage - sliders.recordsPerPage + data.index + 1 }}
                                    </template>
                                    <template #cell(photo)="data">
                                        <b-img
                                            class="td-img"
                                            alt="Slider Image"
                                            :src="data.item.photo.url"
                                        />
                                    </template>
                                    <template #cell(site)="data">
                                        {{ data.item.site?data.item.site.name:'-' }}
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
                                              v-if="can('view-slider')"
                                              v-b-tooltip.hover.v-primary
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="View Slider"
                                              variant="primary"
                                              class="btn-icon rounded-circle"
                                              :to="`/sliders/${data.item.id}`"
                                          >
                                            <feather-icon icon="EyeIcon"/>
                                          </b-button>
                                          <b-button
                                              v-if="can('edit-slider')"
                                              v-b-tooltip.hover.v-warning
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="Edit Slider"
                                              variant="warning"
                                              class="btn-icon rounded-circle ml-1"
                                              :to="`/sliders/${data.item.id}/edit`"
                                          >
                                            <feather-icon icon="EditIcon"/>
                                          </b-button>
                                          <b-button
                                              v-if="can('delete-slider')"
                                              v-b-tooltip.hover.v-danger
                                              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                              title="Delete Slider"
                                              variant="danger"
                                              class="btn-icon rounded-circle ml-1"
                                              @click="deleteSlider(data)"
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
                                        v-model="sliders.recordsPerPage"
                                        size="sm"
                                        :options="sliders.paginateOptions"
                                        class="w-50"
                                        @change="browseSliders(1)"
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
                                    v-model="sliders.meta.current_page"
                                    :total-rows="sliders.meta.total"
                                    :per-page="sliders.recordsPerPage"
                                    align="right"
                                    class="my-0"
                                    first-number
                                    last-number
                                    prev-class="prev-item"
                                    next-class="next-item"
                                    @change="browseSliders"
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
    name: 'BrowseSliders',
    directives: {
        Ripple,
    },
    data: () => ({
        sliders: {
            isLoading: false,
            filter: '',
            paginateOptions: [5, 10, 25, 50, 100, 250],
            recordsPerPage: 5,
            fields: [
                {key: 'index', label: '#'},
                {key: 'photo', label: 'Photo'},
                {key: 'main_title_en', label: 'Main Title EN'},
                {key: 'site', label: 'Site'},
                {key: 'created_at', label: 'Created At'},
                {key: 'updated_at', label: 'Updated At'},
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
        this.browseSliders(this.sliders.meta.current_page)
    },
    methods: {
        browseSliders(page) {
            this.sliders.isLoading = true
            this.$store.dispatch('slider/browse', `?paginate=${this.sliders.recordsPerPage}&page=${page}`).then(response => {
                this.sliders.data = response.data.data.data
                this.sliders.meta = response.data.data.meta.pagination
                this.sliders.isLoading = false
            }).catch(error => {
                console.error(error)
                this.sliders.isLoading = false
            })
        },

        deleteSlider(data) {
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
                    this.$store.dispatch('slider/delete', data.item.id).then(response => {
                        this.sliders.data = this.sliders.data.filter(slider => slider.id !== data.item.id)
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


.td-img {
    max-width: 80px;
    max-height: 80px;
}
</style>
