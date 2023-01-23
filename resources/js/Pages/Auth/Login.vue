<template>
    <Head>
        <title>Login</title>
    </Head>

    <div class="mb-5 text-center">
        <Link :href="route('home')" class="uppercase font-extrabold text-xl py-4 text-indigo-600">
            <span class="font-light">Dotnet</span>Devs
        </Link>
    </div>
    <h1 class="text-center mt-6 text-center text-3xl font-bold tracking-tight text-black">
        Sign in to your account
    </h1>
    <p class="mt-2 text-center text-sm text-gray-600">
        Or
        <Link :href="route('register')" class="font-medium text-indigo-600 hover:text-indigo-500">Create an account →</Link>
    </p>
    <form
        @submit.prevent="submit"
        class="mt-8 flex flex-col py-8 px-4 sm:px-10 bg-white sm:mx-auto sm:w-full sm:max-w-md border-y sm:border"
    >
        <div>
            <label class="block text-sm font-medium text-gray-700" for="Email">Email address</label>
            <div class="mt-1">
                <input
                    v-model="form.email"
                    type="email"
                    class="block w-full appearance-none border border-gray-300 px-3 py-2 placeholder-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                />
            </div>
            <div v-if="form.errors.email" class="mt-1 text-red-500 text-sm">
                {{ form.errors.email }}
            </div>
        </div>

        <div class="mt-8">
            <label class="block text-sm font-medium text-gray-700" for="Password">Password</label>
            <div class="mt-1">
                <input
                    v-model="form.password"
                    type="password"
                    class="block w-full appearance-none border border-gray-300 px-3 py-2 placeholder-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                />
            </div>
            <div v-if="form.errors.password" class="mt-1 text-red-500 text-sm">
                {{ form.errors.password }}
            </div>
        </div>
        <div class="mt-8">
            <button type="submit"
                    :disabled="form.processing"
                    class="ml-auto text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-2 px-4 w-full">
                Sign in
            </button>
        </div>
    </form>
</template>

<script>
import AuthLayout from '../../Layouts/AuthLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3'

export default {
    components: {Link, Head},
    layout: AuthLayout,
    data() {
        return {
            form: useForm({
                email: null,
                password: null
            }),
        }
    },
    methods: {
        submit() {
            this.form.post('/login');
        }
    }
}
</script>
