<template>
    <div class="relative flex flex-wrap justify-center items-center py-12 md:py-20 max-w-4xl mx-auto sm:px-8">
        <div class="flex-1">
            <h1 class="mb-4 text-black text-3xl leading-tight font-bold pl-6 lg:pl-0">
                Message {{ developerProfile.full_name }}
            </h1>
            <form @submit.prevent="submit">
                <div class="bg-white border-y sm:border text-left">
                    <div class="flex flex-col p-6">
                        <div class="w-full space-y-6">
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Message *
                                </label>
                                <p class="text-sm text-gray-500">
                                    This is your chance to show off your company and
                                    connect with the developer!
                                </p>
                                <div class="mt-2">
                                    <textarea v-model="form.body" rows="8"
                                              class="block w-full py-2 px-3 outline-none text-gray-700 bg-white border-gray-300 shadow-sm hover:border-indigo-600 focus:border-indigo-600">
                                    </textarea>
                                </div>

                                <div v-if="errors.body" class="mt-1 text-red-500 text-sm">
                                    {{ errors.body }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full end justify-start mt-6 pr-6 lg:pr-0">
                    <button type="submit"
                            :disabled="form.processing"
                            :class="[form.processing ? 'bg-indigo-300 hover:bg-indigo-300' : 'bg-indigo-600 hover:bg-indigo-700']"
                            class="ml-auto text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-2 px-12 w-auto max-w-sm md:w-auto">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    props: ['errors', 'developerProfile'],
    data() {
        return {
            form: useForm({
                receiver_id: this.developerProfile.user_id,
                body: ''
            })
        }
    },
    methods: {
        submit() {
            this.form.post('/conversations');
        }
    }
}
</script>
