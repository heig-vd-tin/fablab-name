<template layout>
    <div class="flex justify-end">
        <span class="isolate inline-flex items-end rounded-md pr-2 shadow-sm">
            <button
                type="button"
                data-tooltip-target="tooltip-default"
                class="relative inline-flex items-center rounded-md border border-gray-500 bg-white px-2 py-2 text-sm font-medium text-gray-500"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                title="Rejouer mes votes"
                @click="reset()"
            >
                <span class="sr-only">Rejouer mes votes</span>
                <XMarkIcon class="h-5 w-5 fill-rose-500" aria-hidden="true" />
            </button>
        </span>
        <span class="isolate inline-flex items-end rounded-md shadow-sm">
            <button
                type="button"
                data-tooltip-target="tooltip-default"
                class="relative inline-flex items-center rounded-l-md border border-gray-500 bg-white px-2 py-2 text-sm font-medium text-gray-500"
                :class="{ 'bg-sky-500': sortByScore }"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                title="Trier par popularité"
                @click="sortByScore = true"
            >
                <span class="sr-only">Popularité</span>
                <StarIcon
                    class="h-5 w-5"
                    :class="{
                        'fill-white': sortByScore,
                        'fill-sky-400': !sortByScore,
                    }"
                    aria-hidden="true"
                />
            </button>

            <button
                type="button"
                class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-500 bg-white px-2 py-2 text-sm font-medium text-gray-500"
                data-bs-toggle="tooltip"
                :class="{ 'bg-sky-500': !sortByScore }"
                data-bs-placement="bottom"
                title="Trier par date"
                @click="sortByScore = false"
            >
                <span class="sr-only">Date</span>
                <ClockIcon
                    class="h-5 w-5"
                    :class="{
                        'fill-white': !sortByScore,
                        'fill-sky-400': sortByScore,
                    }"
                    aria-hidden="true"
                />
            </button>
        </span>
    </div>
    <ul role="list" class="divide-y divide-gray-200">
        <li
            v-for="item in sortedData"
            :key="item.id"
            class="flex items-center py-1 sm:px-2"
        >
            <VoteBtn
                :vote="item.upvote - item.downvote"
                :count="item.score"
                :disabled="votes <= 0 || item.owned"
                @upvote="upvote(item.id)"
                @downvote="downvote(item.id)"
            ></VoteBtn>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                    {{ item.name }}
                    <span
                        class="font-light italic text-slate-400"
                        v-if="item.user"
                        >— proposé par {{ item.user }}</span
                    >
                </p>
                <p class="text-sm text-gray-500">{{ item.description }}</p>
            </div>
        </li>
    </ul>
</template>

<script setup lang="ts">
import { reactive, computed, toRefs } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { StarIcon, ClockIcon, XMarkIcon } from '@heroicons/vue/20/solid'
import VoteBtn from '@/views/pages/updown.vue'

const props = defineProps({ data: Array, votes: Number })

const state = reactive({
    sortByScore: true,
    sortBy: computed(() => (state.sortByScore ? 'score' : 'updated_at')),
    sortedData: computed(() => {
        return Object(props.data).sort((a, b) => {
            return a[state.sortBy] < b[state.sortBy] ? 1 : -1
        })
    }),
})
const { sortByScore, sortBy, sortedData } = toRefs(state)

const reset = () => {
    Inertia.post('/reset', {}, { preserveScroll: true })
}

const upvote = (id: number) => {
    Inertia.post('/', { id, upvote: true }, { preserveScroll: true })
}
const downvote = (id: number) => {
    Inertia.post('/', { id, downvote: true }, { preserveScroll: true })
}
</script>
