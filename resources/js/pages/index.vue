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
                            <th>Visits</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="item in items" :key="item.id">
                            <td class="p-2 rounded border text-sm">
                                {{ item.original_url }}
                            </td>

                            <td class="p-2 rounded border text-sm">
                                <a :href="item.shorten_url" target="_blank">
                                    {{ item.shorten_url }}
                                    <i class="fas fa-external-link-alt ml-2">         
                                    </i>
                                </a>
                            </td>

                            <td class="p-2 rounded border text-sm">
                                {{ item.visits }}
                            </td>
                            <td class="p-2 rounded border text-sm">
                                {{ item.created_at }}
                            </td>

                            <td class="p-2 rounded border text-sm">
                                <i @click="destroy(item)" class="fas fa-times text-red-300 hover:text-red-800 cursor-pointer"></i>
                            </td>
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
                    this.items.unshift(res.data);
                    this.$notify({message : "Created Successfully"});
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
            },
            destroy(item){
                if(confirm("Are you sure?")){
                    axios.delete(`/api/url/${item.shorten_url}`).then(() => {
                        this.items = this.items.filter(i => i.id != item.id);
                        this.$notify({message : "Deleted Successfully", type : "warning"});
                    });

                }
            }
        }
        
    };
</script>
