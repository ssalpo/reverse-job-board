<template>
    <Head>
        <title>Hire .NET developers</title>
    </Head>

    <div class="relative flex flex-wrap justify-center items-center py-12 md:py-20 max-w-6xl mx-auto sm:px-8">
        <div class="flex-1">
            <div class="text-left">
                <div class="flex flex-col lg:flex-row lg:justify-between items-start py-6 px-4">
                    <div>
                        <h1 class="mb-4 text-black text-3xl leading-tight font-bold">
                            Hire .NET developers
                        </h1>
                        <p class="text-gray-700 line-clamp-3 break-words leading-loose lg:leading-loose">
                            Find .NET developers looking for their next gig. From juniors to seniors and everyone in
                            between.
                        </p>
                    </div>
                    <div class="mt-4 lg:mt-0" v-if="$page.props.shared.isAuth">
                        <Link v-if="$page.props.shared.developerProfile?.id === undefined"
                              class="text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-auto max-w-sm md:w-auto"
                              :href="route('developers.profile.create')">
                            Add profile
                        </Link>

                        <Link v-else
                              class="text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-auto max-w-sm md:w-auto"
                              :href="route('developers.profile.edit', $page.props.shared.developerProfile.id)">
                            Update my profile
                        </Link>
                    </div>
                </div>
                <div class="flex flex-col mt-8">
                    <h2 class="text-lg lg:text-xl leading-loose lg:leading-loose text-left text-black font-semibold px-4 md:px-0">
                        Search developers
                    </h2>

                    <form
                        @submit.prevent="submit"
                        class="flex flex-col md:flex-row w-full md:space-x-4 items-start md:items-end pl-4 md:pl-0 space-y-2"
                    >
                        <div class="max-w-xs">
                            <label class="block text-sm font-medium text-gray-700">
                                Experience Level
                            </label>

                            <select
                                v-model="filter.experience_level"
                                class="mt-1 block w-full border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option value="">Search...</option>
                                <option :value="key" v-for="(label, key) in $page.props.shared.config.experience_levels">
                                    {{ label }}
                                </option>
                            </select>
                        </div>

                        <div class="max-w-xs flex">
                            <button type="submit"
                                    class="text-base font-semibold text-white bg-gray-900 hover:bg-black leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-auto max-w-sm md:w-auto mr-2">
                                Apply
                            </button>
                            <button type="button"
                                    @click="reset"
                                    v-if="isFilterApply"
                                    class="text-base font-semibold text-white bg-red-600 hover:bg-red-500 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-auto max-w-sm md:w-auto">
                                Reset
                            </button>
                        </div>
                    </form>

                    <div class="flex flex-col space-y-8 mt-5">
                        <developer-teaser :developers="developers" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Head, Link} from "@inertiajs/inertia-vue3";
import DeveloperTeaser from "../../../Shared/DeveloperTeaser.vue";

export default {
    props: ['developers'],
    components: {DeveloperTeaser, Head, Link},
    data() {
        return {
            isFilterApply: false,
            filter: {
                experience_level: ""
            }
        }
    },
    methods: {
        submit() {
            this.isFilterApply = true;

            this.$inertia.get('/developers', this.filter, {preserveState: true})
        },
        reset() {
            this.isFilterApply = false;
            this.filter = {experience_level: ""}

            this.$inertia.get('/developers', {}, {preserveState: true})
        }
    }
}
</script>
