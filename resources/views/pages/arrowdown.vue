<template>
    <aside
        class="fixed right-0 bottom-10 z-50 mr-10 mb-10 flex h-20 w-10 cursor-pointer"
    >
        <!-- <div class="text">Voter Maintenant</div> -->
        <div class="chevron"></div>
        <div class="chevron"></div>
        <div class="chevron"></div>
    </aside>
</template>

<script setup></script>
<style lang="scss">
$base: 0.6rem;

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
}

.text {
    @auto text-right;
    position: absolute;
    width: $base * 3.5;
    height: $base * 0.8;
    text-align: right;
}
.chevron {
    @auto pointer-events-none;
    position: absolute;
    width: $base * 3.5;
    height: $base * 0.8;
    opacity: 0;
    transform: scale(0.3);
    animation: move-chevron 3s ease-out infinite;
}

.chevron:first-child {
    animation: move-chevron 3s ease-out 1s infinite;
}

.chevron:nth-child(2) {
    animation: move-chevron 3s ease-out 2s infinite;
}

.chevron:before,
.chevron:after {
    content: '';
    position: absolute;
    top: 0;
    height: 100%;
    width: 50%;
    background: #2c3e50;
}

.chevron:before {
    left: 0;
    transform: skewY(30deg);
}

.chevron:after {
    right: 0;
    width: 50%;
    transform: skewY(-30deg);
}

@keyframes move-chevron {
    25% {
        opacity: 1;
    }
    33.3% {
        opacity: 1;
        transform: translateY($base * 3.8);
    }
    66.6% {
        opacity: 1;
        transform: translateY($base * 5.2);
    }
    100% {
        opacity: 0;
        transform: translateY($base * 8) scale(0.5);
    }
}
</style>
