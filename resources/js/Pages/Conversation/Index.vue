<template>
    <Head>
        <title>Your conversations on DotnetDevs</title>
    </Head>

    <div class="relative flex flex-wrap justify-start items-center py-12 md:py-20 max-w-6xl mx-auto lg:px-8">
        <div class="flex-1">
            <div v-if="$page.props.shared.isAuth && !$page.props.shared.companyProfile?.is_subscribed" class="border-l-4 border-y border-r border-yellow-400 bg-yellow-50 p-4 mb-6 mx-6 md:mx-0">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M8.485 3.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 3.495zM10 6a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 6zm0 9a1 1 0 100-2 1 1 0 000 2z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <div class="ml-3">
                        <p class="text-base text-yellow-700">
                            A business subscription is required to use the hiring features on DotnetDevs.
                            <Link :href="route('hire')"
                               class="font-medium text-yellow-700 underline hover:text-yellow-600">
                                Subscribe
                                <span aria-hidden="true"> →</span>
                            </Link>
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-left">
                <div class="flex flex-col sm:flex-row sm:justify-between items-start py-6 mb-8 px-6 lg:px-0">
                    <div>
                        <h1 class="text-black text-3xl leading-tight font-bold">
                            Conversations
                        </h1>

                        <p v-if="$page.props.shared.isAuth && $page.props.shared.companyProfile?.is_subscribed" class="text-gray-700 line-clamp-3 break-words leading-loose lg:leading-loose">
                            To start a new conversation, got to our
                            <a class="text-indigo-600 underline" href="/developers">developers</a> page.
                        </p>
                    </div>
                    <div v-if="$page.props.shared.isAuth && $page.props.shared.companyProfile?.is_subscribed" class="mt-4 sm:mt-0">
                        <a href="/developers"
                           class="text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-auto max-w-sm md:w-auto">
                            View developers
                        </a>
                    </div>
                </div>
                <div class="flex flex-col space-y-16 py-6 mb-8 px-6 lg:px-0">
                    <!-- For Company  -->
                    <div v-if="companyProfile" class="flex flex-col space-y-2">
                        <div class="inline-flex">
                            <h2 class="text-lg font-semibold text-gray-900 mr-2">{{companyProfile.name}}</h2>
                            <span
                                class="inline-flex items-center rounded-md px-2 py-0.5 text-xs font-medium bg-blue-100 text-blue-800 border border-blue-800">Company profile</span>
                        </div>

                        <Link v-for="conversation in companyConversations" :href="`/conversation/${conversation.developerProfile.id}`"
                           class="border-l-4 border-y border-r border-indigo-400 bg-white p-4 hover:bg-gray-50 flex flex-row justify-between">
                            <p class="font-bold mr-4 text-sm sm:text-base">{{conversation.developerProfile.full_name}}→</p>
                            <p class="text-sm">{{conversation.developerProfile.created_at_formatted}}</p>
                        </Link>

                        <div class="text-center py-12" v-if="!companyConversations">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6 mx-auto h-12 w-12 text-gray-400" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No conversations</h3>
                        </div>
                    </div>

                    <!-- For Developer -->
                    <div v-if="developerProfile" class="flex flex-col space-y-2">
                        <div class="inline-flex">
                            <h2 class="text-lg font-semibold text-gray-900 mr-2">{{developerProfile.full_name}}</h2>
                            <span
                                class="inline-flex items-center rounded-md px-2 py-0.5 text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-800">Developer profile</span>
                        </div>

                        <Link v-for="conversation in developerConversations" :href="route('conversations.show', conversation.id)"
                           class="border-l-4 border-y border-r border-indigo-400 bg-white p-4 hover:bg-gray-50 flex flex-row justify-between">
                            <p class="font-bold mr-4 text-sm sm:text-base">{{conversation.companyProfile.name}}→</p>
                            <p class="text-sm">{{conversation.companyProfile.created_at_formatted}}</p>
                        </Link>

                        <div v-if="!developerConversations" class="text-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto h-12 w-12 text-gray-400"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No conversations</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link, Head} from "@inertiajs/inertia-vue3";

export default {
    components: {Link, Head},
    props: ['companyConversations', 'developerConversations', 'companyProfile', 'developerProfile']
}
</script>
