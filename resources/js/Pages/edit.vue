<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    errors: {
        type: Object,
        default: () => ({})
    },
    customer: {
        type: Object,
        required: true
    }
})

const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone,
});

function submit(id){
    form.put(`/customers/${id}`, {
        onFinish: () => {
            form.reset()
        }
    });
}
</script>

<template>
    <div class="card col-6 offset-3 mt-5 shadow-lg rounded">
        <div class="card-header bg-primary text-white text-center fs-4">
            <i class="bi bi-person-gear"></i> Edit Customer
        </div>
        <div class="card-body">
            <form @submit.prevent="submit(customer.id)">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                        <input 
                            type="text" 
                            id="name" 
                            v-model="form.name" 
                            class="form-control" 
                            placeholder="Enter your name">
                    </div>
                    <div class="text-danger text-xs mt-1" v-if="errors.name">{{ errors.name }}</div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                        <input 
                            type="email" 
                            id="email" 
                            v-model="form.email" 
                            class="form-control" 
                            placeholder="Enter your email">
                    </div>
                    <div class="text-danger text-xs mt-1" v-if="errors.email">{{ errors.email }}</div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                        <input 
                            type="number" 
                            id="phone" 
                            v-model="form.phone" 
                            class="form-control" 
                            placeholder="Enter your phone number">
                    </div>
                    <div class="text-danger text-xs mt-1" v-if="errors.phone">{{ errors.phone }}</div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Styling untuk konsistensi dengan Create Customer */
.card {
    margin-top: 3rem;
    border-radius: 1rem;
}

.input-group-text {
    border: none;
    background-color: #f8f9fa;
}

.input-group-text i {
    font-size: 1.2rem;
    color: #6c757d;
}

button:hover {
    background-color: #0056b3;
}
</style>

