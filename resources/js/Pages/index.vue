<template>
    <div class="container-fluid px-4 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-10">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-dark fw-bold m-0">Customer Management</h2>
                    <button 
                        class="btn btn-primary d-flex align-items-center" 
                        @click="router.get('/customers/create')"
                    >
                        <i class="fas fa-plus me-2"></i>
                        Add Customer
                    </button>
                </div>

                <!-- Flash Message -->
                <div 
                    v-if="$page.props.flash.message" 
                    class="alert alert-success alert-dismissible fade show mb-4" 
                    role="alert"
                >
                    {{ $page.props.flash.message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <!-- Customer Table -->
                <div class="card border-0 shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-muted text-uppercase small ps-4">Customer Name</th>
                                    <th class="text-muted text-uppercase small text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr 
                                    v-for="customer in customers" 
                                    :key="customer.id" 
                                >
                                    <td class="ps-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div 
                                                class="rounded-circle me-3 d-flex align-items-center justify-content-center text-white fw-bold"
                                                style="width: 45px; height: 45px; background-color: #6c757d;"
                                            >
                                                {{ customer.name.charAt(0).toUpperCase() }}
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark">{{ customer.name }}</div>
                                                <div class="text-muted small">Customer</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center py-3">
                                        <div class="d-flex justify-content-center">
<button 
  @click.prevent="router.get(`/customers/${customer.id}`)" 
  class="btn btn-outline-primary me-2"
>
  View
</button>
                                            <button 
                                                @click.prevent="edit(customer.id)" 
                                                class="btn btn-outline-primary me-2"
                                            >
                                                Edit
                                            </button>
                                            <button 
                                                @click.prevent="destroy(customer.id)" 
                                                class="btn btn-outline-danger"
                                            >
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Empty State -->
                                <tr v-if="customers.length === 0">
                                    <td colspan="2" class="text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-users-slash fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No customers found</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    customers: {
        type: Array,
        default: () => []
    }
})

function destroy(id) {
    if (confirm('Are you sure you want to delete this customer?')) {
        router.delete(`/customers/${id}`)
    }
}

function edit(id) {
    router.get(`/customers/${id}/edit`)
}
</script>

<style scoped>
/* Optional: Add some subtle hover effects */
.table-hover tbody tr:hover {
    background-color: rgba(0,0,0,0.05);
}
</style>