<template layout>
    <p>
        Tu peux maintenant participer aux votes. Reviens aussi souvent que tu le
        souhaites sur cette plateforme avant le 31 octobre 2022, date de la fin
        de la campagne. Tu possèdes encore 3 votes, à toi de jouer :
    </p>
    <ul>
        <li v-for="{ id, name } in data" :key="id">
            {{ id }} {{ name }}
            <button
                @click="vote(id, 1)"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
            >
                +
            </button>
            <button
                @click="vote(id, -1)"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
            >
                -
            </button>
        </li>
    </ul>
</template>

<script setup lang="ts">
defineProps({ data: Array, votes: Number });

const vote = (id: number, value: number) => {
    page.data.votes += value;
    console.log(id, value);
};
</script>
