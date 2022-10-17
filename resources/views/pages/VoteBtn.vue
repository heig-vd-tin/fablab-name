<template>
    <div class="center m-2 w-6">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            strokeWidth="{1.5}"
            stroke="green"
            v-if="style === 'hand'"
            class="arrow vote-up h-8 w-8"
            @click="doVote(1)"
        >
            <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z"
            />
        </svg>
        <svg
            class="arrow vote-up"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 21.75 18.97"
            v-if="style !== 'hand'"
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

        <div class="text-center font-bold">{{ count }}</div>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            v-if="style === 'hand'"
            fill="none"
            viewBox="0 0 24 24"
            strokeWidth="{1.5}"
            stroke="red"
            class="arrow vote-down h-8 w-8"
        >
            <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M7.5 15h2.25m8.024-9.75c.011.05.028.1.052.148.591 1.2.924 2.55.924 3.977a8.96 8.96 0 01-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398C20.613 14.547 19.833 15 19 15h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 00.303-.54m.023-8.25H16.48a4.5 4.5 0 01-1.423-.23l-3.114-1.04a4.5 4.5 0 00-1.423-.23H6.504c-.618 0-1.217.247-1.605.729A11.95 11.95 0 002.25 12c0 .434.023.863.068 1.285C2.427 14.306 3.346 15 4.372 15h3.126c.618 0 .991.724.725 1.282A7.471 7.471 0 007.5 19.5a2.25 2.25 0 002.25 2.25.75.75 0 00.75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 002.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384"
            />
        </svg>
        <svg
            class="arrow vote-down"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 21.75 18.97"
            v-if="style !== 'hand'"
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
    style?: String
}

const props = withDefaults(defineProps<Props>(), {
    vote: 0,
    count: 0,
    disabled: 0,
    style: 'arrow',
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
