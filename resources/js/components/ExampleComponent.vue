<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" v-text="name">My Updated Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return { name: 'Laracasts' };
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .card {
        background: gray;
    }
</style>
