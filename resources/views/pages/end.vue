<template layout>
    <main
        id="particles-js"
        class="w-screen bg-gradient-to-r from-sky-300 to-blue-600"
    >
        <img
            src="@/assets/heig-logo.svg"
            class="sm:w-30 md:w-25 absolute left-5 top-5 w-20 sm:left-10 sm:top-10 lg:w-32"
        />

        <section
            class="auto pointer-events-none absolute top-0 left-0 w-full pt-20 text-center sm:pt-32"
        >
            <h1
                class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 md:text-7xl"
            >
                <span class="text-white">Merci !</span> La campagne
                collaborative est terminée.
            </h1>
            <p
                class="mx-auto mt-10 max-w-2xl px-3 text-justify text-lg font-normal text-slate-200"
            >
                Les noms qui ont reçus des votes sont les suivants. Merci de ta
                participation.
            </p>
        </section>
    </main>
    <section class="mx-auto mt-5 px-20 md:container">
        <Votes :data="names" :votes="votes" />
    </section>
</template>
<script setup>
import { onMounted } from 'vue'
import '@/scripts/particles.js'

defineProps({
    names: Object,
    auth: Object,
    votes: Number,
})

onMounted(() => {
    particlesJS('particles-js', {
        particles: {
            number: {
                value: 100,
            },
            color: {
                value: '#ffffff',
            },
            shape: {
                type: 'circle',
                stroke: {
                    width: 0,
                    color: '#000000',
                },
                polygon: {
                    nb_sides: 5,
                },
            },
            opacity: {
                value: 0.8,
                random: false,
                anim: {
                    enable: false,
                    speed: 0.2,
                    opacity_min: 0.1,
                    sync: false,
                },
            },
            size: {
                value: 3,
                random: true,
                anim: {
                    enable: false,
                    speed: 10,
                    size_min: 0.1,
                    sync: false,
                },
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#ffffff',
                opacity: 0.4,
                width: 1,
            },
            move: {
                enable: true,
                speed: 2,
                direction: 'none',
                random: false,
                straight: false,
                out_mode: 'out',
                bounce: true,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200,
                },
            },
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: {
                    enable: true,
                    mode: 'grab',
                },
                onclick: {
                    enable: true,
                    mode: 'push',
                },
                resize: true,
            },
            modes: {
                grab: {
                    distance: 140,
                    line_linked: {
                        opacity: 1,
                    },
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3,
                },
                repulse: {
                    distance: 200,
                    duration: 0.4,
                },
                push: {
                    particles_nb: 4,
                },
                remove: {
                    particles_nb: 2,
                },
            },
        },
        retina_detect: true,
    })
})
</script>
