<script setup>
import {ref} from "vue";

const name = ref('')

const submit = async () => {
    await axios.post('/api/categories', {
        name: name.value
    })
        .then((response) => {
            console.log('New Category ID: ' + response.data.data.id)
        })
        .catch((error) => console.log(error))
}
</script>

<template>
    <h1 class="text-3xl font-bold">Form</h1>

    <div class="mt-3 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form @submit.prevent="submit" class="mt-6 space-y-6">
                <div>
                    <label
                        for="name"
                        class="block font-medium text-sm text-gray-700"
                    >Name</label>
                    <input
                        id="name"
                        v-model="name"
                        placeholder="Name"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    />
                </div>
                <div class="flex items-center gap-4">
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Submit</button>
                </div>
            </form>
        </div>
    </div>

</template>
