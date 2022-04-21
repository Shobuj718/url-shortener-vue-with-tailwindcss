<template>
    <div class="text-center mt-5">
        <h1 class="text-2xl">Shorten your big url</h1>

        <form @submit.prevent="submit">

            <input type="text" placeholder="Past your big url" class="p-2 border rounded-md shadow-md w-64" v-model="original_url">
            
            <i @click="submit" class="fas fa-paper-plane text-orange-600 cursor-pointer"></i>

        </form>
        <div>
            <span class="text-xs text-red-500" v-if="errors.original_url">{{ errors.original_url[0] }}</span>            
        </div>

        <section class="mt-5 text-center flex justify-center">
            <div class="border rounded-md p-4">
                
                <table>
                    <thead>
                        <tr>
                            <th>Original URL</th>
                            <th>Shorten URL</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="item in items" :key="item.id">
                            <td class="p-2 rounded border">{{ item.original_url }}</td>
                            <td class="p-2 rounded border">{{ item.shorten_url }}</td>
                            <td class="p-2 rounded border">{{ item.created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                original_url : "",
                errors : {},
                items : []
            }
        },

        mounted(){
            this.fetchData();
        },
        methods:{
            submit(){
                if(this.original_url == '') return;
                axios.post('/api/url', {original_url: this.original_url}).then(res =>{
                    console.log(res);
                    this.original_url = "";
                    this.items.push(res.data);
                }).catch(e => {
                    this.errors = e.response.data.errors;
                });
            },
            fetchData(){
            axios.get('/api/url').then(res => {
                console.log(res.data);
                this.items = res.data;
            }).catch(e => {
                this.errors = e.response.data;
            });
        }
        }
        
    };
</script>
