<template>
    <section>
        <b-row>
            <b-col cols="12">
                <b-overlay
                    :show="site.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="siteCard"
                        title="Site Details"
                        action-collapse
                    >
                        <b-row>
                            <b-col
                                cols="12"
                                class="mb-1"
                                style="text-align: center;"
                            >
                                <img
                                    :src="site.data.photo.url"
                                    alt="site photo"
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
                                {{ site.data.id }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Catalog</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                <a
                                    :href="site.data.catalog.url"
                                    target="_blank"
                                >
                                    <b><u>Click here to view catalog</u></b>
                                </a>
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Name</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ site.data.name }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Slug</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ site.data.slug }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Contact Email</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ site.data.email }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Contact Phone</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ site.data.phone }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Location Description</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ site.data.location_description }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Location URL</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                <a href="" target="_blank">{{ site.data.location_url }}</a>
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
                                {{ site.data.created_at | date(true) }} - {{ site.data.created_at | time }}
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
                                {{ site.data.updated_at | date(true) }} - {{ site.data.updated_at | time }}
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
                                        v-if="can('edit-site')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="warning"
                                        :to="`/sites/${site.data.id}/edit`"
                                    >
                                        <feather-icon
                                            icon="EditIcon"
                                            class="mr-50"
                                        />
                                        <span class="align-middle">Edit Site</span>
                                    </b-button>
                                    <b-button
                                        v-if="can('delete-site')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        class="ml-1"
                                        :disabled="site.isLoadingDelete"
                                        variant="danger"
                                        @click="deleteSite(site.data.id)"
                                    >
                                        <template v-if="site.isLoadingDelete">
                                            <b-spinner small />
                                            Loading...
                                        </template>
                                        <template v-else>
                                            <feather-icon
                                                icon="TrashIcon"
                                                class="mr-50"
                                            />
                                            <span class="align-middle">Delete Site</span>
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
    name: 'ViewSite',
    directives: {
        Ripple,
    },
    data: () => ({
        site: {
            isLoading: false,
            isLoadingDelete: false,
            data: {
                id: null,
                name: '',
                slug: '',
                about: '',
                phone: '',
                email: '',
                location_description: '',
                location_url: '',
                createdAt: '',
                updatedAt: '',
                isDeleted: false,
            },
        },
    }),
    mounted() {
        this.viewSite()
    },
    methods: {
        viewSite() {
            this.site.isLoading = true
            this.$store.dispatch('site/view', this.$route.params.id).then(response => {
                this.site.data = response.data.data.data
                this.site.isLoading = false
            }).catch(error => {
                console.error(error)
                this.site.isLoading = false
            })
        },
        deleteSite(id) {
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
                        this.site.isLoadingDelete = true
                        this.$store.dispatch('site/delete', id).then(response => {
                            this.site.isLoadingDelete = false
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
                            this.$router.push('/sites')
                        }).catch(error => {
                            console.error(error)
                            this.site.isLoadingDelete = false
                        })
                    }
                })
        },
    },
}
</script>

<style scoped>

</style>
