<template>
    <div
        class="modal fixed top-0 left-0 flex h-full w-full items-center justify-center"
    >
        <div
            class="modal-overlay absolute h-full w-full bg-gray-900 opacity-80"
        ></div>

        <div
            class="modal-container z-50 grid h-full cursor-pointer shadow-lg"
            @click="$emit('close')"
        >
            <div
                class="modal-close absolute top-0 right-0 z-50 mt-4 mr-4 flex cursor-pointer flex-col items-center text-sm text-white"
            >
                <XMarkIcon class="h-5 w-5 fill-white" aria-hidden="true" />
                <span class="text-sm">(Fermer)</span>
            </div>
            <img
                class="modal-content m-auto max-h-screen max-w-full"
                src="@/assets/blueprint-big.webp"
                alt="blueprint"
            />
        </div>
    </div>
</template>
<script setup>
import { XMarkIcon } from '@heroicons/vue/20/solid'
const emit = defineEmits(['close'])
</script>
