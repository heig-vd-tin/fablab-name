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
            <Updown
                :vote="item.upvote - item.downvote"
                :count="item.score"
                :disabled="votes <= 0 || item.owned"
                @upvote="upvote(item.id)"
                @downvote="downvote(item.id)"
            ></Updown>
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
    <div
        aria-live="assertive"
        class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-5"
    >
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <!-- Notification panel, dynamically insert this into the live region when it needs to be displayed -->
            <transition
                enter-active-class="transform ease-out duration-300 transition"
                enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
                leave-active-class="transition ease-in duration-100"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    v-if="notification"
                    class="pointer-events-auto w-full max-w-sm rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5"
                >
                    <div class="p-3">
                        <div class="flex items-start">
                            <div class="w-0 flex-1">
                                <p class="text-sm font-medium text-gray-900">
                                    Il y a des nouveaux votes
                                </p>
                                <div class="mt-4 flex">
                                    <button
                                        type="button"
                                        @click="update()"
                                        class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    >
                                        Mettre à jour
                                    </button>
                                </div>
                            </div>
                            <div class="ml-4 flex flex-shrink-0">
                                <button
                                    type="button"
                                    @click="notification = false"
                                    class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                >
                                    <span class="sr-only">Fermer</span>
                                    <XMarkIcon
                                        class="h-5 w-5"
                                        aria-hidden="true"
                                    />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script setup>
import {
    ref,
    inject,
    reactive,
    computed,
    toRefs,
    onMounted,
    onUnmounted,
} from 'vue'
import { Inertia } from '@inertiajs/inertia'
import {
    StarIcon,
    ClockIcon,
    XMarkIcon,
    FaceSmileIcon,
} from '@heroicons/vue/20/solid'

const props = defineProps({ data: Array, votes: Number })
const echo = inject('echo')
const notification = ref(false)

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

const upvote = (id) => {
    Inertia.post('/', { id, upvote: true }, { preserveScroll: true })
}
const downvote = (id) => {
    Inertia.post('/', { id, downvote: true }, { preserveScroll: true })
}

const update = () => {
    notification.value = false
    Inertia.get('/', {}, { preserveScroll: true })
}

onMounted(() => {
    echo.channel('name').listen('VoteUpdated', (e) => {
        notification.value = true
    })
})

onUnmounted(() => {
    echo.leave('name')
})
</script>
