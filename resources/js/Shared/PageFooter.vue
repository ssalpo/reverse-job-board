<template>
    <div class="w-full p-8 bg-white">
        <div class="max-w-6xl mx-auto text-center">
            <p class="text-base text-center text-gray-600 hover:text-black">
                © {{ currentYear }} All rights reserved.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        currentYear: (new Date).getUTCFullYear()
    })
}
</script>
