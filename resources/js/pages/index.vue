<template>
    <div class="text-center mt-5">
        <h1 class="text-2xl">Shorten your big url</h1>
        <form @submit.prevent="submit">
            
            <input type="text" class="p-2 border rounded-md shadow-md w-64" v-model="original_url" placeholder="Enter your big url">
            <i 
            @click="submit"
            class="fas fa-paper-plane text-blue-400 cursor-pointer">
            </i>
        </form>

        <span class="text-xs text-red-500" v-if="errors.original_url">{{ errors.original_url[0] }}</span>
        
    </div>
</template>

<script>
    export default {
        data(){
            return {
                original_url: "",
                errors: {}
            };
        },
        methods: {
            
            submit(){
                if(this.original_url == "") return;
                console.log(this.original_url);
                axios.post("/api/url", {original_url: this.original_url})
                .then(res => {
                        this.original_url = "";
                    })
                .catch(e => {
                        this.errors = e.response.data.errors;
                    });
                    
            }
        }
    };
</script>
