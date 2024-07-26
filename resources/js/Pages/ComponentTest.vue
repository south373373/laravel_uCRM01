<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue'
    import Label from '@/Components/ApplicationLogo.vue'
    import Input from '@/Components/TextInput.vue'

    const emitTest = e => {
        console.log(e)
    }

</script>

<template>
    <GuestLayout>
        件名<br>
        <Input 
            modelValue="初期値が入ります"
            @update:modelValue="emitTest"
        ></Input>
    </GuestLayout>
</template>