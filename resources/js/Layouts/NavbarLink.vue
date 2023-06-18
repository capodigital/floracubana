<template>
    <Link class="block sm:inline-block sm:px-4 py-2 hover:text-primary transition-colors duration-300"
    :href=to>
        {{label}}
    </Link>
</template>

<script setup>

import NavLink from '../Components/NavLink.vue';
import {Link} from '@inertiajs/vue3';

defineProps({
    to: String,
    label: String,
});



</script>

