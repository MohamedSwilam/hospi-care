<template>
    <section>
        <b-row>
            <b-col cols="12">
                <b-overlay
                    :show="testimonial.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="testimonialCard"
                        title="Testimonial Details"
                        action-collapse
                    >
                        <b-row>
                            <b-col
                                cols="12"
                                class="mb-1"
                                style="text-align: center;"
                            >
                                <img
                                    :src="testimonial.data.photo.url"
                                    alt="testimonial photo"
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
                                lg="10"
                                md="10"
                                sm="10"
                                class="mb-1"
                            >
                                {{ testimonial.data.id }}
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
                                <router-link :to="`/sites/${testimonial.data.site.id}`">{{testimonial.data.site.name}}</router-link>
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Client Name</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ testimonial.data.client_name }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Feedback EN</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ testimonial.data.feedback_en }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Feedback FR</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ testimonial.data.feedback_fr }}
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
                                {{ testimonial.data.created_at | date(true) }} - {{ testimonial.data.created_at | time }}
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
                                {{ testimonial.data.updated_at | date(true) }} - {{ testimonial.data.updated_at | time }}
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
                                        v-if="can('edit-testimonial')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="warning"
                                        :to="`/testimonials/${testimonial.data.id}/edit`"
                                    >
                                        <feather-icon
                                            icon="EditIcon"
                                            class="mr-50"
                                        />
                                        <span class="align-middle">Edit Testimonial</span>
                                    </b-button>
                                    <b-button
                                        v-if="can('delete-testimonial')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        class="ml-1"
                                        :disabled="testimonial.isLoadingDelete"
                                        variant="danger"
                                        @click="deleteTestimonial(testimonial.data.id)"
                                    >
                                        <template v-if="testimonial.isLoadingDelete">
                                            <b-spinner small />
                                            Loading...
                                        </template>
                                        <template v-else>
                                            <feather-icon
                                                icon="TrashIcon"
                                                class="mr-50"
                                            />
                                            <span class="align-middle">Delete Testimonial</span>
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
    name: 'ViewTestimonial',
    directives: {
        Ripple,
    },
    data: () => ({
        testimonial: {
            isLoading: false,
            isLoadingDelete: false,
            data: {
                id: null,
                photo: {
                    url: '',
                },
                client_name: '',
                feedback_en: '',
                feedback_fr: '',
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
        this.viewTestimonial()
    },
    methods: {
        viewTestimonial() {
            this.testimonial.isLoading = true
            this.$store.dispatch('testimonial/view', this.$route.params.id).then(response => {
                this.testimonial.data = response.data.data.data
                this.testimonial.isLoading = false
            }).catch(error => {
                console.error(error)
                this.testimonial.isLoading = false
            })
        },
        deleteTestimonial(id) {
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
                        this.testimonial.isLoadingDelete = true
                        this.$store.dispatch('testimonial/delete', id).then(response => {
                            this.testimonial.isLoadingDelete = false
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
                            this.$router.push('/testimonials')
                        }).catch(error => {
                            console.error(error)
                            this.testimonial.isLoadingDelete = false
                        })
                    }
                })
        },
    },
}
</script>

<style scoped>

</style>
