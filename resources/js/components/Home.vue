<script setup>
import {onMounted, ref} from "vue";

const categories = ref({})
const products = ref({})

const getCategories = async () => {
    await axios.get('/api/categories')
        .then((response) => {
            categories.value = response.data.data
        })
        .catch((error) => console.log(error))
}

const getProducts = async () => {
    await axios.get('/api/products')
        .then((response) => {
            products.value = response.data.data
        })
        .catch((error) => console.log(error))
}

onMounted(() => {
    getCategories()
    getProducts()
})
</script>

<template>
    <h1>Index Page</h1>

    <h2>Categories</h2>
    <ul v-for="category in categories" :key="category.id">
        {{ category.name }}
    </ul>

    <h2>Products</h2>
    <ul v-for="product in products" :key="product.id">
        {{ product.name }}
    </ul>

</template>
