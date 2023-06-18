<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import WarningButton from '@/Components/WarningButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import FileInput from 'vue-simple-file-input';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Modal from '@/Components/Modal.vue';
import {nextTick, ref} from 'vue';
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination';
import {router} from "@inertiajs/vue3";
import FileUpload from 'vue-file-upload';

export default {
    props: ["origenes","especies", "errors"],
    data() {
        return{
            form: {
                gen: '',
                epit: '',
                fam: '',
                id_origen: '',
                id: '',
            },
            form1: {
                file: '',
            },
            modal: false,
            modal1: false,
            title: '',
            operation: 1,
            especy: '',
            formPage: useForm({}),


        };


    },
    components: {
        AppLayout,
        DangerButton,
        Swal,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        WarningButton,
        SelectInput,
        SecondaryButton,
        Modal,
        VueTailwindPagination,
        FileUpload,



    },

    methods: {
        onPageClick(event){
            this.formPage.get(route('especies.index',{page:event}));
        },

        ok(msj) {
            this.clearForm();
            this.closeModal();
            Swal.fire({
                title:msj,
                icon:'success',
            });
        },
        save() {
            if(this.operation==1){
                router.post(route('especies.store'),this.form,{

                    onSuccess: () => {this.ok('Especie creada')}
                });
            }
            else{
                router.put(route('especies.update', this.especy),this.form,{
                onSuccess: () => {this.ok('Especie actualizada')}
                });
            }
        },

        openModal(op,gen,epit,fam,origen,especie) {
            this.modal=true;
            this.operation = op;
            this.especy = especie;
            if(op==1){
                this.title='Nueva especie';
            }
            else{
                this.title='Editar especie';
                this.form.gen = gen;
                this.form.epit = epit;
                this.form.fam = fam;
                this.form.id_origen = origen;
            }
        },
        openModal1() {
            this.modal1=true;

        },

        closeModal() {
            this.clearForm();
            this.modal=false;

        },
        closeModal1() {
            this.clearForm1();
            this.modal1=false;

        },

        clearForm() {
                this.form.gen = '';
                this.form.epit = '';
                this.form.fam = '';
                this.form.id_origen = '';
        },
        clearForm1() {
                this.form1.file = '';

        },

        deleteEspecie(id,gen) {
            const alerta = Swal.mixin({
            buttonsStyling:true
            })
            alerta.fire({
                title:'Estas seguro de eliminar '+gen,
                icon:'question',showCancelButton:true,
                confirmButtonText:'<i class="fa-solid fa-check"></i>Si, borrar',
                cancelButtonText:'<i class="fa-solid fa-ban"></i>Cancelar'
            }).then((result)=>{
                if (result.isConfirmed) {
                    router.delete(route('especies.destroy',id),{
                        onSuccess: () => {this.ok('Especie eliminada')}
                    });
                }
            });
        },


        uploadFile() {
            router.post(route('especies.import'), {
                _method: 'put',
                file: this.form1.file,


            },
            );
            /*const formData = new FormData();
            formData.append('file', this.file);
            router.put(route('especies.import'), formData, {
            forceFormData: true,
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            },
            {

            onSuccess: () => {this.ok('Archivo cargado')}
            }
            );*/
        },




        handleFileUpload(event) {
            this.file = event.target.files[0];
        },



    }
} ;



</script>

<template>
    <AppLayout title="Especies">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Especies
            </h2>
        </template>

        <div class="py-12">
            <div class="bg-gray-800 grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                   <PrimaryButton @click="openModal(1)">
                    <i class="fa-solid fa-plus-circle"></i> Nueva especie
                   </PrimaryButton>
                </div>


                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input id="file" type="file" name="file" @change="handleFileUpload" accept=".XLSX, .CSV, .XLSM">
                    </div>
                    <PrimaryButton @click="openModal1()">
                        <i class="fa-solid fa-plus-circle"></i> Importar datos
                    </PrimaryButton>



            </div>
            <div class="bg-gray-800 grid v-screen place-items-center overflow-x-auto">
               <!--<select v-model="id_origen" class="form-control">
                    <option :selected="true" value="">--Escoge el origen--</option>
                    <option v-for="ori in origenes"
                            :value="ori.id">
                        {{ ori.origen }}
                    </option>

                </select>
                -->
                <table class="table-auto border border-black text-white">
                    <thead>
                        <tr class="bg-gray-900">
                            <th class="px-2 py-2">#</th>
                            <th class="px-2 py-2">Genero</th>
                            <th class="px-2 py-2">Epit</th>
                            <th class="px-2 py-2">Familia</th>
                            <th class="px-2 py-2">Origen</th>
                            <th class="px-2 py-2"></th>
                            <th class="px-2 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="esp, i in especies.data" :key="esp.id">
                            <td class="border border-black px-2 py-2">{{(i+1)}}</td>
                            <td class="border border-black px-2 py-2">{{esp.gen}}</td>
                            <td class="border border-black px-2 py-2">{{esp.epit}}</td>
                            <td class="border border-black px-2 py-2">{{esp.fam}}</td>
                            <td class="border border-black px-2 py-2">{{esp.origen}}</td>
                            <td class="border border-black px-2 py-2">
                                <WarningButton
                                @click="openModal(2,esp.gen,esp.epit,esp.fam,esp.id_origen,esp.id)">
                                    <i class="fa-solid fa-edit"></i>
                                </WarningButton>
                            </td>
                            <td class="border border-black px-2 py-2">
                                <DangerButton @click="deleteEspecie(esp.id,esp.gen)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-800 grid v-screen place-items-center">
                <VueTailwindPagination
                :current="especies.currentPage"
                :total="especies.total"
                :perPage="especies.perPage"
                @page-changed="onPageClick($event)">

                </VueTailwindPagination>
            </div>
        </div>

        <Modal :show="modal" @close="closeModal()">
            <h2 class="p-3 text-lg font-medium text-gray-900">{{title}}</h2>

                <form @submit.prevent="save">
                    <div class="p-3 ">
                        <InputLabel for="gen" value="Genero: "></InputLabel>
                        <TextInput id="gen"
                            v-model="form.gen" type="text" class="mt-1 block w-3/4"
                            placeholder="Genero">
                        </TextInput>
                        <InputError :message="errors.gen" class="mt-2"></InputError>
                    </div>
                    <div class="p-3 ">
                        <InputLabel for="epit" value="Epit: "></InputLabel>
                        <TextInput id="epit"
                        v-model="form.epit" type="text" class="mt-1 block w-3/4"
                        placeholder="Epit"></TextInput>
                        <InputError :message="errors.epit" class="mt-2"></InputError>
                    </div>
                    <div class="p-3 ">
                        <InputLabel for="fam" value="Familia: "></InputLabel>
                        <TextInput id="fam"
                        v-model="form.fam" type="text" class="mt-1 block w-3/4"
                        placeholder="Familia"></TextInput>
                        <InputError :message="errors.fam" class="mt-2"></InputError>
                    </div>

                    <div class="p-3 ">
                        <InputLabel for="id_origen" value="Origen: "></InputLabel>
                        <SelectInput id="id_origen" :options="origenes"
                        v-model="form.id_origen" class="mt-1 block w-3/4"
                        ></SelectInput>
                        <InputError :message="errors.id_origen" class="mt-2"></InputError>
                    </div>
                    <div class="p-3 mt-6">
                        <PrimaryButton :type="submit">
                            <i class="fa-solid fa-save"></i> Guardar
                        </PrimaryButton>
                    </div>
                </form>



            <div class="p-3 mt-6 flex justify-end">
                <SecondaryButton class="ml-3"  @click="closeModal">
                    Cancelar
                </SecondaryButton>
            </div>

            <div class="p-3 flex justify-end">
                <p>{{especy}}</p>
            </div>

        </Modal>
        <Modal :show="modal1" @close="closeModal1()">
            <h2 class="p-3 text-lg font-medium text-gray-900">Importar especies</h2>

                <form @submit.prevent="uploadFile">
                    <div class="p-3 ">
                        <InputLabel for="file" value="Archivo: "></InputLabel>
                        <input type="file" @input="form1.file = $event.target.files[0]" class="mt-1 block w-3/4"/>

                    </div>

                    <div class="p-3 mt-6">
                        <PrimaryButton :type="submit">
                            <i class="fa-solid fa-save"></i> Importar
                        </PrimaryButton>
                    </div>
                </form>



            <div class="p-3 mt-6 flex justify-end">
                <SecondaryButton class="ml-3"  @click="closeModal1">
                    Cancelar
                </SecondaryButton>
            </div>


        </Modal>
    </AppLayout>


</template>
