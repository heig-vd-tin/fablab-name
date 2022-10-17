<template layout>
    <section
        class="mx-auto max-w-full bg-gradient-to-r from-sky-300 to-blue-600 pb-16 text-center sm:px-6 lg:px-4 lg:pt-32"
    >
        <img
            src="@/assets/heig-logo.svg"
            class="absolute left-5 top-5 w-20 sm:left-10 sm:top-10 sm:w-32"
        />
        <h1
            class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl"
        >
            Le
            <span class="text-white">FabLab</span>
            se cherche une nouvelle identité.
        </h1>
        <p
            class="mx-auto mt-10 max-w-2xl text-justify text-lg font-normal text-slate-200"
        >
            Né en 2016 à la <a href="http://heig-vd.ch">HEIG-VD</a>, le
            <span class="font-bold">FabLab</span> est un espace ouvert aux
            étudiant·e·es et aux collaborateurs·trices de l'école pour réaliser
            leurs projets académiques et privé en mettant à disposition des
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
            et d'outils pour nourrir la créativité et donner naissances aux
            idées innovantes de nos futur·es ingénieur·es.
        </p>
        <p class="pb-4 text-justify text-slate-800">
            Pourquoi changer de nom ? La terminologie FabLab (fabrication
            laboratory) est une franchise née au Media Lab du MIT en 2001. Ce
            nom impose certaines obligations auxquelle la
            <a href="http://heig-vd.ch">HEIG-VD</a> ne peut pas accéder. C'est
            pourquoi notre espace Maker se cherche un nouveau nom.
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
            Nous lançons auprès de toutes et tous une campagne
            <strong>interactive</strong> et collaborative pour trouver un
            nouveau nom.

            <vue-countdown
                :time="timeLeft"
                :interval="100"
                v-slot="{ days, hours, minutes, seconds, milliseconds }"
            >
                Alors dépèches-toi de te rendre au bas de la page pour saisir
                tes votes car il ne reste que {{ days }} jours,
                {{ hours }} heures et {{ minutes }} minutes pour tenter de
                remporter la récompense.
            </vue-countdown>
        </p>

        <p class="pb-4 text-justify text-slate-800">
            La première place du classement sera récompensée par un bon d'une
            valeur de <strong>150</strong> francs à la
            <a href="https://www.fr.fnac.ch/">FNAC</a>, la seconde place de
            <strong>100</strong> francs et la troisième de
            <strong>50</strong> francs.
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
            C08. L'accès est réservé à ceux qui ont signé les règles
            d'utilisation. Certaines machines ne sont accessibles qu'après une
            formation. Pour plus d'informations, n'hésitez pas à te rendre sur
            le
            <a href="https://intra.heig-vd.ch/campus/fablab/Pages/default.aspx"
                >site du FabLab</a
            >.
        </p>
        <p class="pb-4 text-justify text-slate-800">
            Cet espace est utilisé pour l'enseignement, notamment dans le cadre
            des projets multidisciplinaires, mais également pour les
            étudiant·e·s désireu·x·ses de créer et de collaborer. Au FabLab,
            vous pouvez disposer d'outillages, d'imprimantes 3D, de nombreuses
            machines telles que graveuse et découpeuse laser ainsi que d'un
            certain nombre de consommables en libre-service.
        </p>

        <p class="pb-4 text-justify text-slate-800">
            En 2022, une extension a été prévue pour accueillir plus de monde et
            plus d'équipement. Voici le plan de l'extension :
        </p>
        <a href="#" @click="toggleModal()">
            <img src="@/assets/blueprint.png" />
        </a>
    </section>

    <img
        src="@/assets/projmulti.jpg"
        class="parallax-right w-full object-cover"
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
                    Patience donc car tu pourras à nouveau proposer un nom dans
                    <strong>{{ hours }} heures et {{ minutes }} minutes</strong
                    >.
                </vue-countdown>
            </p>
        </div>
        <div v-else>
            <p class="mt-10 mb-5 text-justify">
                À toi de jouer ! Nous cherchons un nom court, moderne,
                percutant, simple à prononcer et à retenir à la symbolique
                compatible avec les mots-clés : laboratoire, atelier, étudiants,
                ingénieurs, projets, réalisation, technologie, création,
                prototypage, hackerspace, open design, hacker culture,
                fabrication, innovation, créativité et bien entendu l'esprit
                maker...
            </p>

            <form @submit.prevent="submit">
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="mb-2 block w-full rounded-lg border-gray-500 px-2 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Quel nom souhaites-tu proposer ?"
                    v-model="form.name"
                />
                <div v-if="form.errors.name">{{ form.errors.name }}</div>
                <input
                    type="text"
                    name="description"
                    id="description"
                    class="mb-2 block w-full rounded-lg border-gray-500 px-2 pl-7 pr-20 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Décrit ta proposition en quelques mots"
                    v-model="form.description"
                />
                <div v-if="form.errors.description">
                    {{ form.errors.description }}
                </div>
                <div class="flex content-center justify-end">
                    <input
                        type="checkbox"
                        name="anonymous"
                        id="anonymous"
                        class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
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
        class="mx-auto max-w-full bg-gradient-to-l from-sky-300 to-blue-600 p-2 pt-10 font-display tracking-tight text-slate-900"
    >
        <h1
            class="text-center font-display font-bold tracking-tight text-slate-900 sm:text-4xl"
        >
            Prêt pour voter ?
        </h1>
        <div class="mx-auto max-w-3xl pb-10 pt-5">
            <h3 class="pb-5 pt-2 text-lg font-medium leading-6 text-gray-900">
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
                    Tu à la possibilité de proposer un nouveau nom
                    <span class="font-bold">une fois par jour</span>.
                </li>
                <li class="mb-2">
                    Un nom en dessous de
                    <span class="font-bold">-5 votes</span> sera automatiquement
                    retiré de la liste.
                </li>
            </ul>

            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Statistiques
            </h3>
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
                        Participants
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
                À toi, tu possèdes encore
                <span class="font-bold"
                    >{{ votes }} vote{{ votes > 0 ? 's' : '' }}</span
                >, à toi de jouer.
            </p>
        </div>
    </section>
    <div class="mx-auto mt-6 max-w-4xl"></div>

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

    <section
        class="mx-auto mt-10 flex max-w-full items-center justify-end bg-gradient-to-r from-cyan-500 to-blue-500 py-4 px-4 text-center"
    >
        <span class="isolate inline-flex shadow-sm"
            >Tu as trouvé un bug ? Informes-nous ici
        </span>
        <a href="https://github.com/heig-vd-tin/fablab-name">
            <img src="@/assets/octocat.svg" target="_blank" class="ml-2 w-10" />
        </a>
    </section>
</template>

<script setup lang="ts">
import Votes from '../pages/Votes.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import simpleParallax from 'simple-parallax-js'
import { onMounted } from 'vue'

defineProps({
    names: Object,
    auth: Object,
    votes: Number,
    participants: Number,
    all_votes: Number,
    next_suggestion_in: Number,
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
    new simpleParallax(document.getElementsByClassName('parallax-up'), {
        orientation: 'up',
        speed: 1.0,
        delay: 0.6,
    })

    new simpleParallax(document.getElementsByClassName('parallax-right'), {
        orientation: 'right',
        delay: 0.6,
    })
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    )
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new Tooltip(tooltipTriggerEl)
    })
})
</script>
