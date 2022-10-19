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
                class="relative inline-flex items-center rounded-l-md border border-gray-500 bg-white px-2 py-2 text-sm font-medium text-gray-500"
                :class="{ 'bg-sky-500': sortBy == 'score' }"
                @click="sortBy = 'score'"
                title="Trier par popularité"
            >
                <StarIcon
                    class="h-5 w-5"
                    :class="{
                        'fill-white': sortBy == 'score',
                        'fill-sky-400': sortBy != 'score',
                    }"
                    aria-hidden="true"
                />
            </button>

            <button
                type="button"
                class="relative -ml-px inline-flex items-center border border-gray-500 bg-white px-2 py-2 text-sm font-medium text-gray-500"
                :class="{ 'bg-sky-500': sortBy == 'date' }"
                @click="sortBy = 'date'"
                title="Trier par date"
            >
                <ClockIcon
                    class="h-5 w-5"
                    :class="{
                        'fill-white': sortBy == 'date',
                        'fill-sky-400': sortBy != 'date',
                    }"
                    aria-hidden="true"
                />
            </button>

            <button
                type="button"
                class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-500 bg-white px-2 py-2 text-sm font-medium text-gray-500"
                :class="{ 'bg-sky-500': sortBy == 'mine' }"
                @click="sortBy = 'mine'"
                title="Voir mes votes et mes noms"
            >
                <FaceSmileIcon
                    class="h-5 w-5"
                    :class="{
                        'fill-white': sortBy == 'mine',
                        'fill-sky-400': sortBy != 'mine',
                    }"
                    aria-hidden="true"
                />
            </button>
        </span>
    </div>
    <ul role="list" class="mt-2 flex flex-wrap">
        <li
            v-for="item in sortedData"
            :key="item.id"
            class="flex shrink-0 grow-0 basis-full break-inside-avoid-column items-center py-1 sm:px-2 lg:basis-1/2 xl:basis-1/3"
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
                <p class="overflow-hidden text-ellipsis text-sm text-gray-500">
                    {{ item.description }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script setup lang="ts">
import { reactive, computed, toRefs } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import {
    StarIcon,
    ClockIcon,
    XMarkIcon,
    FaceSmileIcon,
} from '@heroicons/vue/20/solid'
import VoteBtn from '@/views/pages/updown.vue'

const props = defineProps({ data: Array, votes: Number })

const state = reactive({
    sortBy: 'score',
    sortedData: computed(() => {
        if (state.sortBy == 'mine') {
            return props.data.filter(
                (item) => item.owned || item.upvote || item.downvote
            )
        }
        if (state.sortBy == 'date') {
            return props.data.sort((a, b) => {
                return new Date(b.updated_at) - new Date(a.updated_at)
            })
        }
        if (state.sortBy == 'score') {
            return props.data.sort((a, b) => {
                return b.score - a.score
            })
        }
    }),
})
const { sortBy, sortedData } = toRefs(state)

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
