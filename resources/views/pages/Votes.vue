<template layout>
    <p>
        Tu peux maintenant participer aux votes. Reviens aussi souvent que tu le
        souhaites sur cette plateforme avant le 31 octobre 2022, date de la fin
        de la campagne. Tu possèdes encore {{votes}} votes, à toi de jouer :
    </p>
    <ul>
        <li v-for="item in data" :key="item.id">
            {{ item.id }} <strong>{{item.votes}}</strong> {{ item.name }} > {{votes}}
            <button
                @click="vote(item.id, 1)"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                v-if="votes > 0"
            >
                +
            </button>
            <button
                @click="vote(item.id, -1)"
                v-if="votes > 0"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
            >
                -
            </button>
        </li>
    </ul>
</template>

<script setup lang="ts">
const props = defineProps({ data: Array, votes: Number });
import {Inertia} from '@inertiajs/inertia';

const vote = (id: number, vote: number) => {
    // if (props.votes > 0) {
        Inertia.post('/', { id, vote },{ preserveScroll: true });
        console.log(id, value);
    // }
};
</script>
