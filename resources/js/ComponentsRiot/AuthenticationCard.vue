<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-stone-800">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-stone-50 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center">
                <slot name="logo" />
            </div>
            <slot />
        </div>
        <slot name="register" />
    </div>
</template>
