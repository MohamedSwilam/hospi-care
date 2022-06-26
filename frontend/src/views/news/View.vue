<template>
    <section>
        <b-row>
            <b-col cols="12">
                <b-overlay
                    :show="news.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="newsCard"
                        title="News Details"
                        action-collapse
                    >
                        <b-row>
                            <b-col
                                cols="12"
                                class="mb-1"
                                style="text-align: center;"
                            >
                                <img
                                    :src="news.data.photo.url"
                                    alt="news photo"
                                    style="max-width: 100px;"
                                />
                            </b-col>

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
                                {{ news.data.id }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Site</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                <router-link :to="`/sites/${news.data.site.id}`">{{news.data.site.name}}</router-link>
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
                                {{ news.data.title_en }}
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
                                {{ news.data.title_fr }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Sub Title EN</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ slider.data.sub_title_en? slider.data.sub_title_en: '-' }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Sub Title FR</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ slider.data.sub_title_fr?slider.data.sub_title_fr:'-' }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Button URL</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="10"
                                md="10"
                                sm="10"
                                class="mb-1"
                            >
                                {{ slider.data.button_url? slider.data.button_url:'-' }}
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
                                {{ slider.data.created_at | date(true) }} - {{ slider.data.created_at | time }}
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
                                {{ slider.data.updated_at | date(true) }} - {{ slider.data.updated_at | time }}
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
                                        v-if="can('edit-slider')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="warning"
                                        :to="`/sliders/${slider.data.id}/edit`"
                                    >
                                        <feather-icon
                                            icon="EditIcon"
                                            class="mr-50"
                                        />
                                        <span class="align-middle">Edit Slider</span>
                                    </b-button>
                                    <b-button
                                        v-if="can('delete-slider')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        class="ml-1"
                                        :disabled="slider.isLoadingDelete"
                                        variant="danger"
                                        @click="deleteSlider(slider.data.id)"
                                    >
                                        <template v-if="slider.isLoadingDelete">
                                            <b-spinner small />
                                            Loading...
                                        </template>
                                        <template v-else>
                                            <feather-icon
                                                icon="TrashIcon"
                                                class="mr-50"
                                            />
                                            <span class="align-middle">Delete Slider</span>
                                        </template>
                                    </b-button>
                                </b-col>
                            </b-row>
                        </b-container>
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
    name: 'ViewSlider',
    directives: {
        Ripple,
    },
    data: () => ({
        slider: {
            isLoading: false,
            isLoadingDelete: false,
            data: {
                id: null,
                photo: {
                    url: '',
                },
                main_title_en: '',
                main_title_fr: '',
                sub_title_en: '',
                sub_title_fr: '',
                button_url: '',
                site: {
                    name: '',
                },
                createdAt: '',
                updatedAt: '',
                isDeleted: false,
            },
        },
    }),
    mounted() {
        this.viewSlider()
    },
    methods: {
        viewSlider() {
            this.slider.isLoading = true
            this.$store.dispatch('slider/view', this.$route.params.id).then(response => {
                this.slider.data = response.data.data.data
                this.slider.isLoading = false
            }).catch(error => {
                console.error(error)
                this.slider.isLoading = false
            })
        },
        deleteSlider(id) {
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
                        this.slider.isLoadingDelete = true
                        this.$store.dispatch('slider/delete', id).then(response => {
                            this.slider.isLoadingDelete = false
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
                            this.$router.push('/sliders')
                        }).catch(error => {
                            console.error(error)
                            this.slider.isLoadingDelete = false
                        })
                    }
                })
        },
    },
}
</script>

<style scoped>

</style>
