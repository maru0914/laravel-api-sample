<template>
    <div class="p-3 min-h-screen bg-gray-100">
        <nav class="flex gap-3 text-indigo-500 font-bold justify-center">
            <RouterLink to="/">Home</RouterLink>
            <RouterLink to="/form">Form</RouterLink>
        </nav>
        <main>
            <RouterView/>
        </main>
    </div>
</template>


<script setup lang="ts">
</script>
