<template layout>
    <section
        class="mx-auto max-w-full bg-gradient-to-r from-cyan-500 to-blue-500 px-4 pt-20 pb-16 text-center sm:px-6 lg:px-8 lg:pt-32"
    >
        <img src="@/assets/heig-logo.svg" class="logo" />
        <h1
            class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl"
        >
            Le
            <span
                class="text-transparent"
                style="-webkit-text-stroke: 1px black"
                >FabLab</span
            >
            se cherche une nouvelle identité.
        </h1>
        <p class="mx-auto mt-10 max-w-2xl text-lg font-thin text-slate-200">
            Né en 2016 à la <a href="http://heig-vd.ch">HEIG-VD</a>, le
            <span class="font-bold">fablab</span> est un espace ouvert aux
            étudiant·e·es et aux collaborateurs·trices de l'école pour réaliser
            leurs projets académiques et privé en mettant à disposition des
            outils de fabrication et d'assemblage dans une atmosphère
            industrielle et professionnelle.
        </p>
    </section>

    <section class="mx-auto mt-16 max-w-3xl px-4 sm:px-6 lg:px-8">
        <h2 class="mt-10 mb-5 text-center">
            Nous lançons auprès de toutes et tous, et ce jusqu'au 31 octobre
            2022, une campagne interactive et collaborative pour trouver un
            nouveau nom.
        </h2>

        <vue-countdown
            :time="timeLeft"
            :interval="100"
            v-slot="{ days, hours, minutes, seconds, milliseconds }"
        >
            Dépèche toi il ne reste que {{ days }} jours, {{ hours }} heures,
            {{ minutes }} minutes et {{ seconds }}.{{
                Math.floor(milliseconds / 100)
            }}
            secondes.
        </vue-countdown>
        <h2 class="text-center font-light text-slate-600">Aides-nous !</h2>
        <p class="font-light text-slate-800">
            Notre direction a validé l'agrandissement de la surface de l'atelier
            en offrant davantage de machines et d'outils pour nourrir la
            créativité et donner naissances aux idées innovantes de nos futur-es
            ingénieur-es.
        </p>

        <p>
            La première place du classement sera récompensée par un bon d'une
            valeur de <strong>150</strong> francs à la FNAC, la seconde place de
            <strong>100</strong> francs et la troisième de
            <strong>50</strong> francs.
        </p>
        <p>
            Notre direction a validé l'agrandissement de la surface de l'atelier
            en offrant davantage de machines et d'outils pour nourrir la
            créativité et donner naissances aux idées innovantes de nos futur-es
            ingénieur-es.
        </p>
        <a href="#" @click="toggleModal()">
            <img src="@/assets/blueprint.png" />
        </a>
    </section>
    <section class="mx-auto mt-20 max-w-7xl px-20 pb-20 md:container">
        <h1>Notre "FabLab" se cherche une nouvelle identité.</h1>

        <p>Aides-nous à lui trouver un nouveau nom.</p>
    </section>
    <img
        class="lazy loaded parallax-image"
        src="https://simpleparallax.b-cdn.net/images/paint_1.jpg"
        height="535"
    />

    <img
        src="@/assets/projmulti.jpg"
        class="parallax-image mx-auto max-w-7xl px-4 pt-20 pb-16 text-center sm:px-6 lg:px-8 lg:pt-32"
    />
    <!-- mx-auto max-w-7xl px-4 pt-20 pb-16 text-center sm:px-6 lg:px-8 lg:pt-32" -->

    <section
        class="mx-auto mx-auto max-w-full max-w-full bg-gradient-to-r from-cyan-500 to-blue-500 px-20"
    >
        <p class="mx-auto mt-10 max-w-2xl text-lg font-thin text-slate-200">
            À toi de jouer. Nous cherchons un nom court, moderne, percutant,
            simple à prononcer et à retenir à la symbolique compatible avec les
            mots-clés : laboratoire, atelier, étudiants, ingénieurs, projets,
            réalisation, technologie, création, prototypage, hackerspace, open
            design, hacker culture, fabrication, innovation, créativité et bien
            entendu l'esprit maker.
        </p>
        <p>
            Pourquoi changer de nom ? La terminologie FabLab (fabrication
            laboratory) est une franchise née au Media Lab du MIT en 2001. Ce
            nom impose certaines obligations auquelle la HEIG-VD ne peut pas
            accéder. C'est pourquoi notre "FabLab" se cherche un nouveau nom.
        </p>

    </section>
    <section class="mx-auto bg-sky-200 px-20 md:container">
        <h1>Aurais-tu un (autre) nom à proposer ?</h1>
        NOM DESCRIPTION ou explication de l'acronyme Je valide ma sélection
        <form @submit.prevent="submit">
            <input
                type="text"
                name="name"
                id="name"
                class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Quel nom souhaites-tu proposer ?"
                v-model="form.name"
            />
            <div v-if="form.errors.name">{{ form.errors.name }}</div>
            <input
                type="text"
                name="description"
                id="description"
                class="block rounded-lg border-gray-500 px-2 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Décrit ta proposition en quelques mots"
                v-model="form.description"
            />
            <div v-if="form.errors.description">
                {{ form.errors.description }}
            </div>
            <input
                type="checkbox"
                name="anonymous"
                id="anonymous"
                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                v-model="form.anonymous"
            />
            <label for="anonymous" class="font-medium text-gray-700"
                >Ne pas divulguer mon nom</label
            >

            <button
                @click="submitName()"
                class="rounded bg-purple-500 py-2 px-4 text-center text-white hover:bg-purple-700"
                :disabled="form.processing"
            >
                Proposer
            </button>
        </form>
    </section>

    <h1
        class="text-center font-display font-bold tracking-tight text-slate-900 sm:text-4xl"
    >
        Deuxième étape : les votes
    </h1>
    <p class="mx-auto font-display max-w-4xl tracking-tight text-slate-900">
        <h3 class="text-lg font-medium leading-6 text-gray-900 pb-5 pt-2">
            Règles du jeu
        </h3>

        <ul class="list-decimal">
            <li>
                Tu peux venir ici aussi <span class="font-bold">souvent</span> que tu le souhaites jusqu'à la
                fin de la campagne
            </li>
            <li>
                Tu possèdes <span class="font-bold">trois</span> votes que tu peux en tout temps modifier (un
                vote peut-être positif ou négatif)
            </li>
            <li>Tu à la possibilité de proposer un nouveau nom</li>
            <li>
                Un nom qui franchirait le seul des -5 votes sera automatiquement
                retiré de la liste
            </li>
        </ul>
    </p>
    <div class="mx-auto mt-6 max-w-4xl">
        <h3 class="text-lg font-medium leading-6 text-gray-900">
            Statistiques
        </h3>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">
                    Noms proposés
                </dt>
                <dd
                    class="mt-1 text-3xl font-semibold tracking-tight text-gray-900"
                >
                    {{ names.length }}
                </dd>
            </div>
            <div class="rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">
                    Participants
                </dt>
                <dd
                    class="mt-1 text-3xl font-semibold tracking-tight text-gray-900"
                >
                    {{ participants }}
                </dd>
            </div>
            <div class="rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">
                    Nombre de votes
                </dt>
                <dd
                    class="mt-1 text-3xl font-semibold tracking-tight text-gray-900"
                >
                    {{ all_votes }}
                </dd>
            </div>
        </dl>
    </div>

    <section class="mx-auto mt-20 px-20 md:container">
        <Votes :data="names" :votes="votes" />
    </section>

    <!-- Main modal -->
    <!--Modal-->
    <div
        class="modal pointer-events-none fixed top-0 left-0 flex h-full w-full items-center justify-center opacity-0"
    >
        <div
            class="modal-overlay absolute h-full w-full bg-gray-900 opacity-50"
        ></div>

        <div
            class="modal-container z-50 mx-auto w-10/12 max-w-full overflow-y-auto rounded bg-white shadow-lg"
        >
            <div
                class="modal-close absolute top-0 right-0 z-50 mt-4 mr-4 flex cursor-pointer flex-col items-center text-sm text-white"
            >
                <svg
                    class="fill-current text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    viewBox="0 0 18 18"
                >
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                    ></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 px-6 text-left">
                <img src="@/assets/blueprint-big.png" alt="blueprint" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Votes from '../pages/Votes.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import simpleParallax from 'simple-parallax-js'
import { onMounted } from 'vue'

defineProps({
    names: Array,
    auth: Object,
    votes: Number,
    participants: Number,
    all_votes: Number,
    errors: Object,
})

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

const timeLeft = new Date('2022-11-15T23:59:59') - new Date()

const toggleModal = () => {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
}

var openmodal = document.querySelectorAll('.modal-open')
for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function (event) {
        event.preventDefault()
        toggleModal()
    })
}

var closemodal = document.querySelectorAll('.modal-close')
for (var i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
}

document.onkeydown = function (evt) {
    evt = evt || window.event
    var isEscape = false
    if ('key' in evt) {
        isEscape = evt.key === 'Escape' || evt.key === 'Esc'
    } else {
        isEscape = evt.keyCode === 27
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal()
    }
}

onMounted(() => {
    console.log('mounted in the composition api!')
    var image = document.getElementsByClassName('parallax-image')
    new simpleParallax(image, {
        // orientation: 'right',
    })
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    )
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new Tooltip(tooltipTriggerEl)
    })
})
</script>

<style scoped>
.logo {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    position: absolute;
    top: 10px;
    left: 30px;
}
</style>
