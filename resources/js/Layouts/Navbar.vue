<template>
    <nav id="navbar"
    class="px-4 py-4 sm:py-6 bg-white shadow sm:fixed w-full z-10 transition-colors duration-500"
    :class="{'sm:bg-transparent sm:shadow-none': !showWhiteBackground}">
        <div class="container mx-auto flex flex-col sm:flex-row items-center justify-between">
            <div class="w-full flex flex-row items-center justify-between">
                <div class="text-3xl font-bold">
                    <span :class="{'sm:text-white': !showWhiteBackground}">Flora</span>
                    <span class="text-primary">Cubana</span>
                </div>
                <div>
                    <button v-show="!isVisible" class="sm:hidden" @click="toggle">
                        <svg class="h-20 w-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </button>
                    <button v-show="isVisible" class="sm:hidden" @click="toggle">
                        <svg class="h-20 w-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mt-4 sm:mt-8 w-full sm:space-x-4 sm:text-right sm:block"
            :class="{'hidden':!isVisible, 'sm:text-white': !showWhiteBackground}">
                <NavbarLink to="/especies" label="Especies"/>
                <NavbarLink to="/login" label="Login"/>


            </div>
        </div>
    </nav>
</template>

<script>
import NavbarLink from './NavbarLink.vue';
import { useToggle } from "../Composables/userToggle";
import { ref } from 'vue';

export default {
    props: {},
    components: { NavbarLink },
    setup(){
        let {isVisible, toggle} = useToggle();
        let showWhiteBackground = ref(false);

        document.addEventListener("scroll", function(){
            let bodyTopPosition = document.body.getBoundingClientRect().top;

            if(bodyTopPosition<-150){
                showWhiteBackground.value = true;
            } else {
                showWhiteBackground.value = false;
            }
        })

        return {
            isVisible,
            toggle,
            showWhiteBackground
        }
    }
}
</script>



