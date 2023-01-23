<template>
    <Head>
        <title>{{company.name}}</title>
    </Head>

    <div class="relative flex flex-wrap justify-center items-center py-12 md:py-20 max-w-6xl mx-auto sm:px-8">
        <div class="flex-1">
            <subscribe-alert
                v-if="$page.props.shared.isAuth && $page.props.shared.userId === company.user_id && company.is_subscribed"
            />

            <div v-if="$page.props.shared.isAuth" class="mb-2 flex flex-row space-x-4 items-center">
                <p class="font-medium">Actions: </p>

                <Link
                    class="text-base font-semibold hover:bg-gray-300 bg-gray-200 text-gray-700 py-1 px-4 leading-loose relative"
                    :href="route('developers.profile.index')">
                    Hire devs
                </Link>

                <Link
                    class="text-base font-semibold hover:bg-gray-300 bg-gray-200 text-gray-700 py-1 px-4 leading-loose relative"
                    :href="route('conversations.index')">
                    Conversations
                </Link>
            </div>

            <div class="bg-white border-y sm:border">
                <div class="relative">
                    <div class="px-6 py-6 sm:p-6 flex sm:space-x-8 flex-col sm:flex-row">
                        <div class="shrink-0">
                            <img :alt="company.name"
                                 class="h-20 w-20 sm:h-32 sm:w-32 object-cover bg-transparent border border-gray-100"
                                 :src="`/storage/` + company.avatar" />
                        </div>
                        <div class="self-start flex-1 min-w-0 space-y-3 mt-4 sm:mt-0">
                            <div class="flex flex-col xl:flex-row gap-x-6 xl:space-y-0">
                                <div class="w-full space-y-6">
                                    <div class="flex items-start justify-between space-x-2">
                                        <div>
                                            <a :href="company.website ? `https://${company.website}` : ''" target="_blank">
                                                <h1 class="text-xl sm:text-2xl font-medium text-black hover:underline">
                                                    {{company.name}} →
                                                </h1>
                                            </a>
                                            <h2 class="text-gray-500 mt-1 font-medium">
                                                {{company.job_title}}
                                            </h2>
                                        </div>
                                        <div v-if="$page.props.shared.isAuth" class="inline-flex ml-auto flex-row-reverse shrink-0 items-center">
                                            <div class="flex items-center">
                                                <Link
                                                    class="text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-auto max-w-sm md:w-auto"
                                                    :href="route('companies.profile.edit', company.id)">Edit</Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block w-full mt-8">
                                        <p class="leading-loose lg:leading-loose text-sm sm:text-base text-gray-900">
                                            {{company.bio}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Head, Link} from "@inertiajs/inertia-vue3";
import SubscribeAlert from "../../../Shared/SubscribeAlert.vue";

export default {
    components: {SubscribeAlert, Link, Head},
    props: ['company']
}
</script>
