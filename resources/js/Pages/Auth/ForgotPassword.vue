<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/ComponentsRiot/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/ComponentsRiot/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-stone-800">
            Olvidaste tu contraseña? No te preocupes. Solo déjanos saber tu dirección de correo electrónico y te enviaremos un correo con un enlace de reinicio de contraseña que te permitirá elegir una nueva.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Correo electrónico" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full border-stone-800 hover:border-red-600 focus:border-red-600 focus:ring-red-600"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" class="ms-4 bg-stone-800 hover:border-red-600 hover:bg-red-600 active:bg-red-700 focus:ring-red-600" :disabled="form.processing">
                    Obtener enlace
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
