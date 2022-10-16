<template layout>
    <div class="flex justify-end">
        <span class="isolate inline-flex items-end rounded-md shadow-sm">
            <button
                type="button"
                data-tooltip-target="tooltip-default"
                class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                title="Trier par popularité"
            >
                <span class="sr-only">Previous</span>
                <StarIcon class="h-5 w-5" aria-hidden="true" />
            </button>

            <button
                type="button"
                class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                title="Trier par date"
            >
                <span class="sr-only">Next</span>
                <ClockIcon class="h-5 w-5" aria-hidden="true" />
            </button>
        </span>
    </div>
    <ul role="list" class="divide-y divide-gray-200">
        <li
            v-for="item in data"
            :key="item.id"
            class="flex items-center py-1 sm:px-2"
        >
            <VoteBtn
                :vote="item.upvote - item.downvote"
                :count="item.score"
                :disabled="votes <= 0"
                @upvote="upvote(item.id)"
                @downvote="downvote(item.id)"
            ></VoteBtn>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                    {{ item.name }}
                    <span v-if="item.user">{{ item.user }}</span>
                </p>
                <p class="text-sm text-gray-500">{{ item.description }}</p>
            </div>
        </li>
    </ul>
</template>

<script setup lang="ts">
const props = defineProps({ data: Array, votes: Number })
import { Inertia } from '@inertiajs/inertia'
import VoteBtn from '../pages/VoteBtn.vue'
import {
    ChevronLeftIcon,
    ChevronRightIcon,
    HandThumbDownIcon,
    StarIcon,
    ClockIcon,
} from '@heroicons/vue/20/solid'
const upvote = (id: number) => {
    Inertia.post('/', { id, upvote: true }, { preserveScroll: true })
}
const downvote = (id: number) => {
    Inertia.post('/', { id, downvote: true }, { preserveScroll: true })
}
</script>
