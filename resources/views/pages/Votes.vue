<template layout>
    <p>
        Tu peux maintenant participer aux votes. Reviens aussi souvent que tu le
        souhaites sur cette plateforme avant le 31 octobre 2022, date de la fin
        de la campagne. Tu possèdes encore {{votes}} votes, à toi de jouer :
    </p>
    <ul>
        <li v-for="item in data" :key="item.id">
            {{ item.id }} <strong>{{item.score}}</strong> {{ item.name }} > {{votes}}
            <button
                @click="upvote(item.id)"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                v-bind:class="{ 'bg-green-400': item.upvote}"
                :disabled="votes <= 0 && !item.upvote"
            >
                +
            </button>
            <button
                @click="downvote(item.id)"
                class=" hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                v-bind:class="{ 'bg-green-400': item.downvote}"
                :disabled="votes <= 0 && !item.downvote"
            >
                -
            </button>
            <div v-if="item.user">{{ item.user }}</div>
        </li>
    </ul>
</template>

<script setup lang="ts">
const props = defineProps({ data: Array, votes: Number });
import {Inertia} from '@inertiajs/inertia';

const upvote = (id: number) => {
    Inertia.post('/', { id, upvote: true },{ preserveScroll: true });
}
const downvote = (id: number) => {
    Inertia.post('/', { id, downvote: true },{ preserveScroll: true });
}

</script>
