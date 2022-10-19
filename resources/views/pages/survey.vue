<template layout>
    <img
        src="@/assets/heig-logo.svg"
        class="sm:w-30 md:w-25 absolute left-5 top-5 w-20 sm:left-10 sm:top-10 lg:w-32"
    />

    <section
        id="particles-js"
        class="mx-auto max-w-full bg-gradient-to-r from-sky-300 to-blue-600 text-center"
        style="height: 33rem"
    ></section>
    <section
        class="auto pointer-events-none absolute top-0 left-0 w-full pt-20 text-center sm:pt-32"
    >
        <h1
            class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 md:text-7xl"
        >
            Le
            <span class="text-white">FabLab</span>
            se cherche une nouvelle identité.
        </h1>
        <p
            class="mx-auto mt-10 max-w-2xl px-3 text-justify text-lg font-normal text-slate-200"
        >
            Né en 2016 à la
            <a href="http://heig-vd.ch" target="_blank">HEIG-VD</a>, le
            <span class="font-bold">FabLab</span> est un espace ouvert aux
            étudiant·e·es et aux collaborateurs·trices de l'école pour réaliser
            leurs projets académiques et privés en mettant à disposition des
            outils de fabrication et d'assemblage dans une atmosphère
            industrielle et professionnelle.
        </p>
    </section>

    <section class="mx-auto mt-16 max-w-3xl px-4 pb-10 sm:px-6 lg:px-8">
        <h1
            class="mb-8 text-center font-display font-bold tracking-tight text-slate-900 sm:text-4xl"
        >
            Pourquoi avons-nous besoin de toi ?
        </h1>
        <p class="pb-4 text-justify text-slate-800">
            La surface de l'atelier s'agrandit en offrant davantage de machines
            et d'outils pour nourrir la créativité et donner naissance aux idées
            innovantes de nos futur·es ingénieur·es.
        </p>
        <p class="pb-4 text-justify text-slate-800">
            Pourquoi changer de nom ? La terminologie FabLab (fabrication
            laboratory) est une franchise née au Media Lab du MIT en 2001. Ce
            nom impose certaines obligations auxquelles la
            <a href="http://heig-vd.ch">HEIG-VD</a> ne correspond pas. C'est
            pourquoi notre espace de fabrication se cherche un nouveau nom.
        </p>
        <p class="pb-4 text-justify text-slate-800">
            Nous cherchons un nom qui reflète notre identité, un nom facile à
            prononcer.
        </p>

        <h1
            class="mb-8 text-center font-display font-bold tracking-tight text-slate-900 sm:text-4xl"
        >
            Comment participer ?
        </h1>
        <p class="mt-10 mb-5 text-justify">
            Nous lançons une campagne
            <strong>interactive</strong> et collaborative pour trouver un
            nouveau nom.

            <vue-countdown
                :time="timeLeft"
                :interval="100"
                v-slot="{ days, hours, minutes, seconds, milliseconds }"
            >
                Alors, dépêche-toi de te rendre
                <a href="#votes">au bas de la page</a> pour saisir tes votes,
                car il ne reste que
                <strong
                    >{{ days }} jours,
                    <span v-if="hours > 0">
                        {{ hours }} heure{{ hours > 1 ? 's' : '' }}, </span
                    >{{ minutes }} minute{{ minutes > 1 ? 's' : '' }} et
                    {{ seconds }} seconde{{ seconds > 1 ? 's' : '' }}
                </strong>
                minutes pour tenter de remporter la récompense.
            </vue-countdown>
        </p>

        <p class="pb-4 text-justify text-slate-800">
            La première place du classement sera récompensée par un bon d'une
            valeur de <strong>150 francs</strong> à la
            <a href="https://www.fr.fnac.ch/" target="_blank">FNAC</a>, la
            seconde place de <strong>100 francs</strong> et la troisième de
            <strong>50 francs</strong>.
        </p>
    </section>
    <img
        src="@/assets/laser.jpg"
        class="parallax-up mt-10 hidden w-full object-cover md:block"
        style="height: 35rem"
    />
    <section class="mx-auto mt-10 max-w-3xl px-4 pb-10 sm:px-6 lg:px-8">
        <h1
            class="mb-8 text-center font-display font-bold tracking-tight text-slate-900 sm:text-4xl"
        >
            Un atelier créatif à l'école ?
        </h1>

        <p class="pb-4 text-justify text-slate-800">
            L'actuel espace est accessible sur le site de Cheseaux dans le local
            C08. L'accès est réservé à celles et ceux qui ont signé les règles
            d'utilisation. Certaines machines ne sont accessibles qu'après une
            formation. Pour plus d'informations, n'hésite pas à te rendre sur le
            <a
                href="https://intra.heig-vd.ch/campus/fablab/Pages/default.aspx"
                target="_blank"
                >site du FabLab</a
            >.
        </p>
        <p class="pb-4 text-justify text-slate-800">
            Cet espace est utilisé pour l'enseignement, notamment dans le cadre
            des projets multidisciplinaires, mais également pour les
            étudiant·e·s qui désirent de créer et collaborer. Au FabLab, vous
            pouvez disposer d'outillages, d'imprimantes 3D, de nombreuses
            machines telles que graveuse et découpeuse laser ainsi que d'un
            certain nombre de consommables en libre-service.
        </p>

        <p class="pb-4 text-justify text-slate-800">
            En 2022, une extension a été prévue pour accueillir plus de monde et
            plus d'équipement. Voici le plan de l'extension :
        </p>

        <img
            class="cursor-pointer"
            @click="blueprint = true"
            src="@/assets/blueprint.png"
        />

        <Map
            ref="modal"
            z-index="500"
            v-if="blueprint"
            @close="blueprint = false"
        />
    </section>

    <img
        src="@/assets/projmulti.jpg"
        class="parallax-right hidden w-full object-cover sm:block"
        style="height: 35rem"
    />
    <!-- mx-auto max-w-7xl px-4 pt-20 pb-16 text-center sm:px-6 lg:px-8 lg:pt-32" -->

    <section class="mx-auto mt-16 max-w-3xl px-4 pb-10 sm:px-6 lg:px-8">
        <h1
            class="mb-8 text-center font-display font-bold tracking-tight text-slate-900 sm:text-4xl"
        >
            Tu as une idée de nom ?
        </h1>
        <div v-if="next_suggestion_in > 0">
            <p class="mt-10 mb-5 text-justify">
                <vue-countdown
                    :time="next_suggestion_in * 1000"
                    :interval="100"
                    v-slot="{ days, hours, minutes, seconds, milliseconds }"
                >
                    Merci pour ta proposition de nom ! Il n'est possible de
                    proposer un nom que toutes les <strong>24 heures</strong>.
                    Patience donc, car tu pourras à nouveau proposer un nom dans
                    <strong>{{ hours }} heures et {{ minutes }} minutes</strong
                    >.
                </vue-countdown>
            </p>
        </div>
        <div v-else>
            <p class="mb-5 text-justify">
                À toi de jouer ! Nous cherchons un nom court, moderne,
                percutant, simple à prononcer et à retenir et à la symbolique
                compatible avec les mots-clés : laboratoire, atelier, étudiants,
                ingénieurs, projets, réalisation, technologie, création,
                prototypage, hackerspace, open design, hacker culture,
                fabrication, innovation, créativité et bien entendu l'esprit
                maker...
            </p>
            <p class="mb-5 text-justify">
                <strong>Attention</strong>, une fois la proposition validée, tu
                ne pourras plus la modifier ou la supprimer. Tu peux prendre
                connaissance des noms déjà existants plus bas.
            </p>
            <form @submit.prevent="submit">
                <input
                    type="text"
                    name="name"
                    id="name"
                    maxlength="42"
                    class="mb-2 block w-full rounded-lg border-gray-500 px-2 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Quel nom souhaites-tu proposer ?"
                    v-model="form.name"
                />
                <div
                    v-if="form.errors.name"
                    class="mb-3 -mt-2 font-bold text-blue-700"
                >
                    {{ form.errors.name }}
                </div>
                <input
                    type="text"
                    name="description"
                    id="description"
                    maxlength="80"
                    class="mb-2 block w-full rounded-lg border-gray-500 px-2 pl-7 pr-20 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Décrit ta proposition en quelques mots"
                    v-model="form.description"
                />
                <div
                    v-if="form.errors.description"
                    class="mb-3 -mt-2 font-bold text-rose-700"
                >
                    {{ form.errors.description }}
                </div>
                <div class="flex content-center items-center justify-end">
                    <input
                        type="checkbox"
                        name="anonymous"
                        id="anonymous"
                        class="h-5 w-5 rounded border-gray-300 text-indigo-600 outline-none"
                        v-model="form.anonymous"
                    />
                    <label
                        for="anonymous"
                        class="pl-2 font-medium text-gray-700"
                        >Ne pas divulguer mon nom</label
                    >

                    <button
                        @click="submitName()"
                        class="ml-4 rounded bg-purple-500 py-2 px-4 text-center text-white hover:bg-purple-700"
                        :disabled="form.processing"
                    >
                        Proposer
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section
        class="mx-auto max-w-full bg-gradient-to-l from-sky-300 to-blue-600 p-2 pt-10 font-display tracking-tight text-white"
    >
        <h1
            id="votes"
            class="text-center font-display font-bold tracking-tight sm:text-4xl"
        >
            Prêt pour voter ?
        </h1>
        <div class="mx-auto max-w-3xl pb-10 pt-5">
            <h3 class="pb-5 pt-2 text-lg font-medium leading-6">
                Règles du jeu
            </h3>

            <ul class="mb-10 list-inside list-decimal pl-2">
                <li class="mb-2">
                    Tu peux venir ici aussi
                    <span class="font-bold">souvent</span> que tu le souhaites
                    jusqu'à la fin de la campagne.
                </li>
                <li class="mb-2">
                    Tu possèdes <span class="font-bold">trois</span> votes que
                    tu peux en tout temps modifier (un vote peut-être positif ou
                    négatif).
                </li>
                <li class="mb-2">
                    Tu as la possibilité de proposer un nouveau nom
                    <span class="font-bold">une fois toutes les 24 heures</span
                    >.
                </li>
                <li class="mb-2">
                    Un nom en dessous de
                    <span class="font-bold">-5 votes</span> sera automatiquement
                    retiré de la liste.
                </li>
            </ul>

            <h3 class="text-lg font-medium leading-6">Statistiques</h3>
            <dl class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-3">
                <div class="m-2 rounded-lg bg-white px-2 py-3 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">
                        Noms proposés
                    </dt>
                    <dd
                        class="mt-1 text-center text-3xl font-semibold tracking-tight text-gray-900"
                    >
                        {{ Object.keys(names).length }}
                    </dd>
                </div>
                <div class="m-2 rounded-lg bg-white px-2 py-3 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">
                        Participant·e·s
                    </dt>
                    <dd
                        class="mt-1 text-center text-3xl font-semibold tracking-tight text-gray-900"
                    >
                        {{ participants }}
                    </dd>
                </div>
                <div class="m-2 rounded-lg bg-white px-2 py-3 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">
                        Nombre de votes
                    </dt>
                    <dd
                        class="mt-1 text-center text-3xl font-semibold tracking-tight text-gray-900"
                    >
                        {{ all_votes }}
                    </dd>
                </div>
            </dl>
            <p class="pt-10">
                Tu possèdes encore
                <span class="font-bold"
                    >{{ votes }} vote{{ votes > 0 ? 's' : '' }}</span
                >, à toi de jouer.
            </p>
        </div>
    </section>

    <section class="mx-auto mt-5 px-20 md:container">
        <Votes :data="names" :votes="votes" />
    </section>

    <section
        class="mx-auto mt-10 flex max-w-full items-center justify-center bg-gradient-to-r from-sky-300 to-blue-600 py-4 px-4 text-center sm:justify-end"
    >
        <span class="isolate inline-flex shadow-sm"
            >Tu as trouvé un bug ? Informes-nous ici
        </span>
        <a href="https://github.com/heig-vd-tin/fablab-name" target="_blank">
            <img src="@/assets/octocat.svg" class="ml-2 w-8" />
        </a>
    </section>
</template>

<script setup lang="ts">
import Votes from '@/views/pages/votes.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import simpleParallax from 'simple-parallax-js'
import { defineAsyncComponent, onMounted, ref } from 'vue'
import '@/scripts/particles.js'

const Map = defineAsyncComponent(() => import('@/views/pages/map.vue'))

defineProps({
    names: Object,
    auth: Object,
    votes: Number,
    participants: Number,
    all_votes: Number,
    next_suggestion_in: Number,
    errors: Object,
})

const blueprint = ref(false)

const form = useForm({
    name: null,
    description: null,
    anonymous: false,
})

const submit = () => {
    form.post('/add', { preserveScroll: true, onSuccess: () => form.reset() })
}

const submitName = () => {
    console.log('submit')
}

const timeLeft =
    new Date(import.meta.env.VITE_DEADLINE + 'T23:59:59') - new Date()

onMounted(() => {
    new simpleParallax(document.getElementsByClassName('parallax-up'), {
        orientation: 'up',
        delay: 0.6,
    })

    new simpleParallax(document.getElementsByClassName('parallax-right'), {
        orientation: 'right',
        delay: 0.6,
        maxTransition: 80,
    })
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    )
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new Tooltip(tooltipTriggerEl)
    })

    particlesJS('particles-js', {
        particles: {
            number: {
                value: 100,
                // density: {
                //     enable: true,
                //     value_area: 200,
                // },
            },
            color: {
                value: '#ffffff',
            },
            shape: {
                type: 'circle',
                stroke: {
                    width: 0,
                    color: '#000000',
                },
                polygon: {
                    nb_sides: 5,
                },
            },
            opacity: {
                value: 0.8,
                random: false,
                anim: {
                    enable: false,
                    speed: 0.2,
                    opacity_min: 0.1,
                    sync: false,
                },
            },
            size: {
                value: 3,
                random: true,
                anim: {
                    enable: false,
                    speed: 10,
                    size_min: 0.1,
                    sync: false,
                },
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#ffffff',
                opacity: 0.4,
                width: 1,
            },
            move: {
                enable: true,
                speed: 2,
                direction: 'none',
                random: false,
                straight: false,
                out_mode: 'out',
                bounce: true,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200,
                },
            },
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: {
                    enable: true,
                    mode: 'grab',
                },
                onclick: {
                    enable: true,
                    mode: 'push',
                },
                resize: true,
            },
            modes: {
                grab: {
                    distance: 140,
                    line_linked: {
                        opacity: 1,
                    },
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3,
                },
                repulse: {
                    distance: 200,
                    duration: 0.4,
                },
                push: {
                    particles_nb: 4,
                },
                remove: {
                    particles_nb: 2,
                },
            },
        },
        retina_detect: true,
    })
})
</script>
