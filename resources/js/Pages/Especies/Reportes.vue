<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {ref} from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import SelectInput from '@/Components/SelectInput.vue';
import DataTable from 'datatables.net-vue3';
import 'datatables.net-dt/css/jquery.dataTables.css';
import ButtonsHtml5 from 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-responsive-dt';
import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css';
import JsZip from 'jszip';
import pdfmake from "pdfmake/build/pdfmake";
import * as pdfFonts from "pdfmake/build/vfs_fonts";

pdfmake.vfs =  pdfFonts.pdfMake.vsf ;
window.JSZip = JsZip;
DataTable.use(ButtonsHtml5);


const columns1 = ref([]);
const columns2 = ref([]);
const buttons1 = ref([]);
const buttons2 = ref([]);
const report = ref('1');
const types = ref([{'id':'1','origen':'Especies'},{'id':'2','origen':'Origenes'}]);

columns1.value= [
    {
        data:null,
        render:function(data,type,row,meta){
            return (meta.row +1)
        },
    },
        {data:'gen'},
        {data:'epit'},
        {data:'fam'},
        {data:'origen'},

]
columns2.value= [
    {
        data:null,
        render:function(data,type,row,meta){
            return (meta.row +1)
        },
    },
    { data:'origen'},

]

buttons1.value = [
    {
        title:'Especies',
        extend:'excelHtml5',
        text: '<i class="fa-solid fa-file-excel"></i>Excel',
        className: 'inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-green-300 dark:hover:bg-green-300 focus:bg-green-300 dark:focus:bg-green active:bg-green-300 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'
    },
    {
        title:'Especies',
        extend:'pdfHtml5',
        text: '<i class="fa-solid fa-file-pdf"></i>PDF',
        className: 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'
    },
    {
        title:'Especies',
        extend:'print',
        text: '<i class="fa-solid fa-file-print"></i>Imprimir',
        className: 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'
    },
    {
        title:'Especies',
        extend:'copy',
        text: '<i class="fa-solid fa-file-print"></i>Copiar',
        className: 'inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-200 border border-gray-800 rounded-md font-semibold text-xs  dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'
    }

]
buttons2.value = [
    {
        title:'Origenes',
        extend:'excelHtml5',
        text: '<i class="fa-solid fa-file-excel"></i>Excel',
        className: 'inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-green-300 dark:hover:bg-green-300 focus:bg-green-300 dark:focus:bg-green active:bg-green-300 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'
    },
    {
        title:'Origenes',
        extend:'pdfHtml5',
        text: '<i class="fa-solid fa-file-pdf"></i>PDF',
        className: 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'
    },
    {
        title:'Origenes',
        extend:'print',
        text: '<i class="fa-solid fa-file-print"></i>Imprimir',
        className: 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'
    },
    {
        title:'Origenes',
        extend:'copy',
        text: '<i class="fa-solid fa-file-print"></i>Copiar',
        className: 'inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-200 border border-gray-800 rounded-md font-semibold text-xs  dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'
    }

]

const props = defineProps({
    origenes: {type:Object},
    especies: {type:Object}
});


</script>

<template>
    <AppLayout title="Reportes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Reportes
            </h2>
        </template>

        <div class="py-12 text-gray-200">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="px-6 py-6 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-gray-200">
                    <InputLabel for="rep" value="Reporte: "></InputLabel>
                    <SelectInput id="rep" class="mt-1 block w-3/4 text-gray-200"
                    v-model="report"
                    :options=types></SelectInput>
                </div>
                <div v-if="report=='1'" class="px-6 py-6 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <DataTable :data="especies" :columns="columns1"
                    class="w-full border border-gray-400 text-gray-200"
                    :options="{responsive:true, autoWidth:false, dom:'Bfrtip', buttons:buttons1, language:{
                        search:'Buscar',
                        zeroRecords:'No hay resultados',
                        info:'Mostrando del _START_ al _END_ de _TOTAL_ registros',
                        infoFiltered:'(Filtrados de _MAX_ registros)',
                        paginate:{first:'Primero', previous:'Anterior', next:'Siguiente', last:'Ultimo'}
                    }}">
                    <thead>
                        <tr class="bg-gray-900 text-gray-200">
                            <th class="px-2 py-2">#</th>
                            <th class="px-2 py-2">Genero</th>
                            <th class="px-2 py-2">Epit</th>
                            <th class="px-2 py-2">Familia</th>
                            <th class="px-2 py-2">Origen</th>

                        </tr>
                    </thead>
                    </DataTable>
                </div>
                <div v-else class="px-6 py-6 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <DataTable :data="origenes" :columns="columns2"
                    class="w-full border border-gray-400 text-gray-200"
                    :options="{responsive:true, autoWidth:false, dom:'Bfrtip', buttons:buttons2, language:{
                        search:'Buscar',
                        zeroRecords:'No hay resultados',
                        info:'Mostrando del _START_ al _END_ de _TOTAL_ registros',
                        infoFiltered:'(Filtrados de _MAX_ registros)',
                        paginate:{first:'Primero', previous:'Anterior', next:'Siguiente', last:'Ultimo'}
                    }}">
                    <thead>
                        <tr class="bg-gray-900 text-gray-200">
                            <th class="px-2 py-2">#</th>
                            <th class="px-2 py-2">Origen</th>


                        </tr>
                    </thead>
                    </DataTable>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
