<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';


const props = defineProps({
    origenes: {type:Object}
});

const form = useForm({
    id:''
})

const deleteOrigen = (id,origen) =>{
    const alerta = Swal.mixin({
        buttonsStyling:true
    })
    alerta.fire({
        title:'Estas seguro de eliminar '+origen,
        icon:'question',showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i>Si, borrar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i>Cancelar'
    }).then((result)=>{
        if (result.isConfirmed) {
            form.delete(route('origenes.destroy',id));
        }
    });
}



</script>

<template>
    <AppLayout title="Origenes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Origenes
            </h2>
        </template>

        <div class="py-12">
            <div class="bg-gray-800 grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('origenes.create')"
                    :class="'px-4 py-2 bg-gray-900 text-white border rounded-md font-semibold text-xs'">
                    <i class="fa-solid fa-plus-circle"></i> Nuevo
                    </Link>
                </div>
            </div>
            <div class="bg-gray-800 grid v-screen place-items-center">
                <table class="table-auto border border-black text-white">
                    <thead>
                        <tr class="bg-gray-900">
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">Origen</th>
                            <th class="px-4 py-4"></th>
                            <th class="px-4 py-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="ori, i in origenes" :key="ori.id">
                            <td class="border border-black px-4 py-4">{{(i+1)}}</td>
                            <td class="border border-black px-4 py-4">{{ori.origen}}</td>
                            <td class="border border-black px-4 py-4">
                                <Link :href="route('origenes.edit', ori.id)"
                                :class="'px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs'">
                                <i class="fa-solid fa-edit"></i>
                                </Link>
                            </td>
                            <td class="border border-black px-4 py-4">
                                <DangerButton @click="deleteOrigen(ori.id,ori.origen)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>


</template>
