<template>
    <div class="text-center mt-5">
        <h1 class="text-2xl">Shorten your big url</h1>

        <form @submit.prevent="submit">

            <input type="text" placeholder="Past your big url" class="p-2 border rounded-md shadow-md w-64">
            
            <i @click="submit" class="fas fa-paper-plane text-orange-600 cursor-pointer"></i>

        </form>

        <span class="text-xs text-red-500" v-if="errors.original_url">{{ errors.original_url[0] }}</span>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                original_url : "",
                errors : {}
            }
        },
        methods:{
            submit(){
                axios.post('/api/url', {original_url: this.original_url}).then(res =>{
                    console.log(res);
                }).catch(e => {
                    this.errors = e.response.data.errors;
                });
            }
        }
    };
</script>
