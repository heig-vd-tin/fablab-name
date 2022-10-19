<template>
    <div class="center w-7 sm:w-5">
        <div class="group pt-2">
            <svg
                class="arrow"
                :class="{ 'vote-up': !(disabled && vote == 0) }"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 21.75 18.97"
            >
                <polygon
                    @click="doVote(1)"
                    class="vote-btn vote-arrow"
                    :class="{
                        'vote-selected-up': vote > 0,
                        disabled: disabled && vote == 0,
                    }"
                    points="10.88 18.47 0.5 18.47 5.69 9.49 10.88 0.5 16.07 9.49 21.25
            18.47 10.88 18.47"
                />
            </svg>
        </div>
        <div class="text-center font-bold">{{ count }}</div>
        <div class="group pb-2">
            <svg
                class="arrow"
                :class="{ 'vote-down': !(disabled && vote == 0) }"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 21.75 18.97"
            >
                <polygon
                    @click="doVote(-1)"
                    class="vote-arrow"
                    :class="{
                        'vote-selected-down': vote < 0,
                        disabled: disabled && vote == 0,
                    }"
                    points="10.88 0.5 21.25 0.5 16.07 9.49 10.88 18.47 5.69 9.49 0.5 0.5
            10.88 0.5"
                />
            </svg>
        </div>
    </div>
</template>
<script setup lang="ts">
import { ref } from 'vue'

export interface Props {
    vote?: Number
    count?: Number
    disabled?: Boolean
}

const props = withDefaults(defineProps<Props>(), {
    vote: 0,
    count: 0,
    disabled: 0,
})

const emit = defineEmits(['upvote', 'downvote'])

const doVote = (value: Number) => {
    if (props.disabled && props.vote == 0) return
    if (value == -1 && props.vote == 1) {
        emit('upvote') // Cancel
    } else if (value == 1 && props.vote == -1) {
        emit('downvote') // Cancel
    } else if (value == 1 && props.vote == 0) {
        emit('upvote')
    } else if (value == -1 && props.vote == 0) {
        emit('downvote')
    }

    //emit(value > 0 ? 'upvote' : 'downvote')
}
</script>
<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;

.arrow {
    @apply drop-shadow;

    stroke-linecap: round;
    stroke-linejoin: round;
}

.vote-arrow {
    @apply fill-white stroke-slate-400;
}

.vote-selected-up {
    @apply fill-lime-300 stroke-lime-600;
}

.vote-selected-down {
    @apply fill-rose-200 stroke-rose-700;
}

.vote-up {
    @apply group-hover:-translate-y-1 group-hover:cursor-pointer group-hover:transition group-hover:duration-100 group-hover:ease-in-out;
}

.vote-down {
    @apply group-hover:translate-y-1 group-hover:cursor-pointer group-hover:transition group-hover:duration-100 group-hover:ease-in-out;
}

.disabled {
    @apply cursor-default fill-slate-100 stroke-slate-300 filter-none;
}
</style>
