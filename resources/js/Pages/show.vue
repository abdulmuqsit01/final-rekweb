<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

defineProps({
    customer: Object
});
</script>

<template>
    <div class="card col-6 offset-3 mt-5 shadow-lg rounded">
        <div class="card-header bg-primary text-white text-center fs-4">
            <i class="bi bi-person-fill"></i> Customer Detail
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <p>{{ customer.name }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <p>{{ customer.email }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <p>{{ customer.phone }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <button 
                    @click="router.get('/customers')" 
                    class="btn btn-outline-secondary"
                >
                    Back to Customers
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Styling untuk konsistensi dengan Create Customer */
.card {
    margin-top: 3rem;
    border-radius: 1rem;
}

button:hover {
    background-color: #0056b3;
}

button:focus {
    box-shadow: none;
}
</style>
