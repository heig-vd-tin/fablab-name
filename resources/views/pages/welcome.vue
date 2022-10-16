

<template layout>
    <section class="md:container mx-auto max-w-7xl px-20 pb-20 mt-20">
        <h1>Notre "FabLab" se cherche une nouvelle identité.</h1>

        <p>Aides-nous à lui trouver un nouveau nom.</p>
    </section>
    <section class="md:container mx-auto px-20 pb-20 mt-20">
        <p>
            Né en 2016 à la HEIG-VD, le "fablab" est un espace ouvert aux
            étudiant-e-es et aux collaborateurs-trices de l'école pour réaliser
            leurs projets académiques et privé en mettant à disposition des
            outils de fabrication et d'assemblage dans une atmosphère
            industrielle et professionnelle.
        </p>
        <p>
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
    </section>
    <section class="md:container mx-auto px-20 bg-sky-200">
        <p>
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
        Voici les règles du jeu :
        <ul>
            <li>
                Tu peux venir ici aussi souvent que tu le souhaites jusqu'à la
                fin de la campagne
            </li>
            <li>
                Tu possèdes trois votes que tu peux en tout temps modifier (un
                vote peut-être positif ou négatif)
            </li>
            <li>Tu à la possibilité de proposer un nouveau nom</li>
            <li>
                Un nom qui franchirait le seul des -5 votes sera automatiquement
                retiré de la liste
            </li>
        </ul>
    </section>
    <section class="md:container mx-auto px-20 bg-sky-200">
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
                class="block rounded-lg px-2 border-gray-500 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Décrit ta proposition en quelques mots"
                v-model="form.description"
            />

            <input
                type="checkbox"
                name="anonymous"
                id="anonymous"
                v-model="form.anonymous"
            />
            <div v-if="form.errors.description">{{ form.errors.description }}</div>
            <button
                @click="submitName()"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                :disabled="form.processing"
            >
                Proposer
            </button>
        </form>
    </section>

    <section class="md:container mx-auto px-20 mt-20 bg-indigo-200">
        <Votes :data="names" :votes="votes" />
    </section>
</template>

<script setup lang="ts">
import Votes from "../pages/Votes.vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
defineProps({ names: Array, auth: Object, votes: Number });

const form = useForm({
    name: null,
    description: null,
    anonymous: false,
});

const submit = () => {
    form.post('/add', { preserveScroll: true, onSuccess: () => form.reset() });
};

const submitName = () => {
    console.log("submit");
};
</script>
