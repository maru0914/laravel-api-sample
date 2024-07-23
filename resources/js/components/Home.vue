<script setup>
import {onMounted, ref} from "vue";
import { TailwindPagination } from 'laravel-vue-pagination';

const categories = ref({})
const products = ref({})

const getCategories = async () => {
    await axios.get('/api/categories')
        .then((response) => {
            categories.value = response.data.data
        })
        .catch((error) => console.log(error))
}

const getProducts = async (page = 1) => {
    await axios.get(`/api/products?page=${page}`)
        .then((response) => {
            products.value = response.data
        })
        .catch((error) => console.log(error))
}

onMounted(() => {
    getCategories()
    getProducts()
})
</script>

<template>
    <h1 class="text-3xl font-bold">Index Page</h1>

    <h2 class="text-xl font-bold">Categories</h2>
    <ul v-for="category in categories" :key="category.id">
        {{ category.name }}
    </ul>

    <h2 class="text-xl font-bold">Products</h2>
    <div class="grid grid-cols-4 gap-4">
        <div class="space-y-2" v-for="product in products.data" :key="product.id">
            <a href="#">
                <img src="http://placehold.it/300x400" :alt="product.name" />
            </a>
            <a class="text-slate-500 text-xl font-semibold hover:underline">
                {{ product.name}}
            </a>
            <p>${{ product.price}}</p>
            <p class="prose-slate">{{ product.description }}</p>
        </div>
    </div>

    <TailwindPagination :data="products" @pagination-change-page="getProducts" class="mt-4" />
</template>
