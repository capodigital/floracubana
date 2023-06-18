<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    origen:''
})


</script>

<template>
    <AppLayout title="Nuevo origen">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Nuevo origen
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="form.post(route('origenes.store'))"
                    class="mt-6 space-y-6 max-w-xl">
                    <InputLabel for="origen" value="Origen"></InputLabel>
                    <TextInput id="origen" v-model="form.origen" autofocus required
                    type="text" class="mt-1 block w-full"></TextInput>
                    <InputError :message="form.errors.origen" class="mt-2"></InputError>
                    <PrimaryButton :disabled="form.processing">
                        <i class="fa-solid fa-save"> Guardar</i>
                    </PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
