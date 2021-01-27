<template>

    <div class="admin-question" v-if="visible">
        <div class="row">
            <a :href="url"  class="col-6">
                <div class="admin-link">{{ topic.title.toUpperCase() }}</div>                        
            </a>
            <a :href="url" class="col-5">
                <div class="admin-link">{{ topic.created_at.slice(0, 10) }}</div>
            </a>

            <form method="post" class="col-1">
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="category" :value="topic.id">
                <button @click="deleteTopic(topic.id)"  class="btn btn-secondary">Delete</button>
            </form>
        </div>
    </div>
  
</template>

<script>
    export default{
        props: {
            topic: {
                required: true
            }
        },

        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                visible: true,
                url: `/admin/question/${ this.topic.id }`,
            }
        },

        methods:{
            deleteTopic(id){
                event.preventDefault();
                this.visible = false;
                axios.delete(`/admin/topic/${id}`)
                .then(() => {
                    console.log('Topic was deleted.');
                })
                .catch(() => {
                    console.log('Delete request is made twice. Dont pay attention ;)');
                });
            }
        }
    }
</script>

<style>
.admin-link{
    color: black;
}

</style>
