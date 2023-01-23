<template>
    <Head>
        <title>Your a conversation with</title>
    </Head>

    <div class="relative flex flex-wrap justify-center items-center py-12 md:py-20 max-w-4xl mx-auto lg:px-8">
        <div class="flex-1">
            <div class="flex-1">
                <div class="flex items-center text-gray-500">
                    <Link :href="route('home')">Home</Link>
                    <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                    <Link :href="route('conversations.index')">Conversations</Link>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:justify-between items-start py-6 px-6 lg:px-0">
                <div class="inline-flex items-center">
                    <div class="shrink-0 mr-2">
                        <img alt="" class="h-12 w-12 object-cover border border-gray-100"
                             :src="`/storage/${profile.avatar}`">
                    </div>
                    <h1 class="text-black text-3xl leading-tight font-bold">
                        {{ profile?.full_name || profile.name }}
                    </h1>
                </div>
            </div>

            <div class="flex flex-col space-y-4 mb-8 px-6 lg:px-0 overflow-y-scroll max-h-96" id="messages-list">
                <div v-for="message in messages">
                    <div v-if="$page.props.shared.userId === message.sender_id"
                         class="flex flex-col w-full items-end justify-end">
                        <div class="p-4 max-w-lg border text-white bg-indigo-600 mb-2">
                            {{ message.body }}
                        </div>
                        <div class="inline-flex">
                            <p class="text-xs text-gray-600">{{ message.created_at_formatted }} ·
                                <span v-if="message.is_read" class="font-bold text-green-500">Read</span>
                                <span v-else class="font-bold text-yellow-500">Delivered</span>
                            </p>
                        </div>
                    </div>

                    <div v-else class="flex flex-col w-full justify-start items-start">
                        <div class="p-4 bg-white max-w-lg border mb-2">
                            <p>{{ message.body }}</p>
                        </div>
                        <p class="text-xs text-gray-600">{{ message.created_at_formatted }}</p>
                    </div>
                </div>
            </div>

            <form @submit.prevent="sendMessage">
                <div class="text-left">
                    <div class="flex flex-col p-6 lg:px-0">
                        <div class="w-full space-y-6">
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    New message *
                                </label>
                                <div class="mt-2">
                                    <textarea v-model="form.body" rows="4"
                                              class="block w-full py-2 px-3 outline-none text-gray-700 bg-white border-gray-300 shadow-sm hover:border-indigo-600 focus:border-indigo-600"></textarea>
                                </div>

                                <div v-if="errors.body" class="mt-1 text-red-500 text-sm">
                                    {{ errors.body }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full end justify-start pr-6 lg:pr-0">
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
import {Head, Link, useForm} from "@inertiajs/inertia-vue3";

export default {
    components: {Link, Head},
    props: ['id', 'messages', 'errors', 'profile'],
    data() {
        return {
            form: useForm({
                conversation_id: this.id,
                body: ''
            })
        }
    },
    methods: {
        sendMessage() {
            this.form.post(`/conversations/send-message`, {preserveScroll: true, preserveState: true})
            this.form.reset();
        },
        scrollMessagesToEnd() {
            const element = document.getElementById('messages-list');
            element.scrollTop = element.scrollHeight;
        }
    },
    mounted() {
        this.$nextTick(() => {
            this.scrollMessagesToEnd();
        })
    }
}
</script>
