<template>
    <section>
        <b-row>
            <b-col cols="12">
                <b-overlay
                    :show="category.isLoading"
                    rounded="sm"
                >
                    <b-card-actions
                        ref="categoryCard"
                        title="Category Details"
                        action-collapse
                    >
                        <b-row>
                            <b-col
                                cols="12"
                                class="mb-1"
                                style="text-align: center;"
                            >
                                <img
                                    :src="category.data.photo.url"
                                    alt="category photo"
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
                                {{ category.data.id }}
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
                                {{ category.data.site?category.data.site.name:'-' }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Name EN</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ category.data.name_en }}
                            </b-col>
                            <b-col
                                cols="4"
                                lg="2"
                                md="2"
                                sm="2"
                                class="mb-1"
                            >
                                <b>Name FR</b>
                            </b-col>
                            <b-col
                                cols="8"
                                lg="4"
                                md="4"
                                sm="10"
                                class="mb-1"
                            >
                                {{ category.data.name_fr }}
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
                                {{ category.data.created_at | date(true) }} - {{ category.data.created_at | time }}
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
                                {{ category.data.updated_at | date(true) }} - {{ category.data.updated_at | time }}
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
                                        v-if="can('edit-category')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="warning"
                                        :to="`/categories/${category.data.id}/edit`"
                                    >
                                        <feather-icon
                                            icon="EditIcon"
                                            class="mr-50"
                                        />
                                        <span class="align-middle">Edit Category</span>
                                    </b-button>
                                    <b-button
                                        v-if="can('delete-category')"
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        class="ml-1"
                                        :disabled="category.isLoadingDelete"
                                        variant="danger"
                                        @click="deleteCategory(category.data.id)"
                                    >
                                        <template v-if="category.isLoadingDelete">
                                            <b-spinner small />
                                            Loading...
                                        </template>
                                        <template v-else>
                                            <feather-icon
                                                icon="TrashIcon"
                                                class="mr-50"
                                            />
                                            <span class="align-middle">Delete Category</span>
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
    name: 'ViewCategory',
    directives: {
        Ripple,
    },
    data: () => ({
        category: {
            isLoading: false,
            isLoadingDelete: false,
            data: {
                id: null,
                photo: {
                    url: '',
                },
                name_en: '',
                name_fr: '',
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
        this.viewCategory()
    },
    methods: {
        viewCategory() {
            this.category.isLoading = true
            this.$store.dispatch('category/view', this.$route.params.id).then(response => {
                this.category.data = response.data.data.data
                this.category.isLoading = false
            }).catch(error => {
                console.error(error)
                this.category.isLoading = false
            })
        },
        deleteCategory(id) {
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
                        this.category.isLoadingDelete = true
                        this.$store.dispatch('category/delete', id).then(response => {
                            this.category.isLoadingDelete = false
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
                            this.$router.push('/categories')
                        }).catch(error => {
                            console.error(error)
                            this.category.isLoadingDelete = false
                        })
                    }
                })
        },
    },
}
</script>

<style scoped>

</style>
