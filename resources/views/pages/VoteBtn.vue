<template>
    <div class="center m-2 w-6">
        <svg
            class="arrow vote-up"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 21.75 18.97"
        >
            <polygon
                @click="doVote(1)"
                class="vote-btn vote-arrow"
                :class="{
                    'vote-selected': vote > 0,
                    disabled: disabled && vote == 0,
                }"
                points="10.88 18.47 0.5 18.47 5.69 9.49 10.88 0.5 16.07 9.49 21.25
            18.47 10.88 18.47"
            />
        </svg>

        <div class="text-center">{{ count }}</div>
        <svg
            class="arrow vote-down"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 21.75 18.97"
        >
            <polygon
                @click="doVote(-1)"
                class="vote-arrow"
                :class="{
                    'vote-selected': vote < 0,
                    disabled: disabled && vote == 0,
                }"
                points="10.88 0.5 21.25 0.5 16.07 9.49 10.88 18.47 5.69 9.49 0.5 0.5
            10.88 0.5"
            />
        </svg>
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
const vote = ref(props.vote)

const doVote = (value) => {
    let event = value > 0 ? 'upvote' : 'downvote'
    vote.value = vote.value === value ? 0 : value
    console.log(event)
    emit(event)
    //emit('vote', vote.value)
}
</script>
<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;

.arrow {
    filter: drop-shadow(3px 5px 2px rgb(0 0 0 / 0.3));
    stroke-linecap: round;
    stroke-linejoin: round;
}

.vote-arrow {
    fill: #fff;
    stroke: black;
}

.vote-selected {
    fill: rgb(62, 216, 69);
    stroke: #000;
}

.vote-arrow:hover {
    @apply cursor-pointer;
    fill: rgb(165, 196, 221);
}

.vote-up:hover {
    @apply transition  duration-100 ease-in-out hover:-translate-y-1;
}

.vote-down:hover {
    @apply transition  duration-100 ease-in-out hover:translate-y-1;
}

.disabled {
    fill: #ccc;
}

.disabled:hover {
    @apply pointer-events-none;
}
</style>
