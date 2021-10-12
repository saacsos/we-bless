<template>
    <div>
        <h1 class="text-4xl">
            {{ message }} {{ counter }}
        </h1>
        <button @click="up()">Up</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: "Hello Vue",
            counter: 0
        }
    },
    methods: {
        up() {
            this.counter++;
        }
    }
}
</script>
