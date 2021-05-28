<template>

<strong>{{ updatedCount }}</strong>

</template>

<script>
export default {
    props:["data"],

    computed: {
            updatedCount: function() {
                return this.data.length;
            }
        }
}
</script>