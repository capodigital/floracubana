<template>
    <div class="relative z-0 h-screen hero-height">
        <img :src="'../storage/fondo3.jpg'" alt="Hero"
        class="block w-full h-full object-cover">

        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="px-4 sm:px-0 absolute inset-0 text-white">
            <div class="container mx-auto h-full flex flex-col justify-center">
                <div class="mt-1 text-6xl font-bold">Buscar especie</div>
                <div class="mt-2 sm:w-1/2">Escribe el nombre cientifico o el nombre comun de la especie que buscas</div>
                <div class="mt-8 text-primary">
                    <svg class="h-10 animate-bounce"
                    fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"></path>
                    </svg>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    props: {},

    setup(){

    }
}
</script>

