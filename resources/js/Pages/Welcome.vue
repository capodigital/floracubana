<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '../Layouts/Navbar.vue';
import Hero from './Hero.vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <div class="h-full">
        <Navbar/>

        <Hero />

        <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, nesciunt. Reiciendis iste qui necessitatibus sunt quos! Error, iure. Perspiciatis, in! Rerum nulla necessitatibus veritatis id voluptatem ab soluta et architecto.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, nesciunt. Reiciendis iste qui necessitatibus sunt quos! Error, iure. Perspiciatis, in! Rerum nulla necessitatibus veritatis id voluptatem ab soluta et architecto.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, nesciunt. Reiciendis iste qui necessitatibus sunt quos! Error, iure. Perspiciatis, in! Rerum nulla necessitatibus veritatis id voluptatem ab soluta et architecto.</p>

            <br>
            <br>
            <br>
            <br>
            <br>

            <br>
            <br>
            <br>
            <br>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, nesciunt. Reiciendis iste qui necessitatibus sunt quos! Error, iure. Perspiciatis, in! Rerum nulla necessitatibus veritatis id voluptatem ab soluta et architecto.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, nesciunt. Reiciendis iste qui necessitatibus sunt quos! Error, iure. Perspiciatis, in! Rerum nulla necessitatibus veritatis id voluptatem ab soluta et architecto.</p>

        </div>


        <footer>
            footer
        </footer>

    </div>



</template>
