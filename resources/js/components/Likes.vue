<template>
<div>

<a href="#" v-if="isLiked" @click.prevent="unLike(postId)">
            <button type="submit" >UnLike</button>
</a>

<a href="#" v-else @click.prevent="like(postId)">
            <button type="submit">Like</button>
</a>
                    
</div>
</template>

<script>
    export default {
        name: "Likes",
        props: [
        'post-id',
        'liked'
         ],
     data ()
    {
      return {
          postId: '',
          liked: false
      }
        },
        mounted() {
            this.isLiked = this.isLike ? true : false;
        },
        computed: {
            isLike() {
                return this.liked;
            },
        },
        methods: {
             toggleLike: function()
        {
            if(this.liked) {
            this.unlike()
            } else {
            this.like()
            } 
        },
            like(post) {
                 this.text = 'Unlike';
                axios.post('/posts/like/'+postId)
                    .then(response => this.isLiked = true)
                    .catch(response => console.log(response.data));
            },
            unLike(post) {
                 this.text = 'Like';
                axios.post('/posts/unlike/'+postId)
                    .then(response => this.isLiked = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>

<style scoped>

</style>