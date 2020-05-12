<template>
<div>
    <form action="posts/Like" method="post">
        <label for="Likes">
            <button type="submit" value="Like" onclick="toggleLike( event )">Like</button>
        </label>
    </form>             
</div>
</template>

<script>
    export default {
        name: "Likes",
        methods: {
             toggleLike: function( event )
        {
            let postId = event.target.dataset.postId;
            let action = event.target.textContent;
            toggleButtonText[action](event.target);
            updatePostStats[action](postId);
            axios.patch('/posts/' + postId + '/act',
            { action: like });
        },
            like(postId) {
                 this.text = 'Unlike';
                 document.querySelector('#likes-count-' + postId).textContent++;
                axios.patch('/posts/postId/like')
                   
            },
            unLike(postId) {
                 this.text = 'Like';
                  document.querySelector('#likes-count-' + postId).textContent--;
                axios.patch('/posts/postId/unLike')
            
            }
        }
    }
</script>

<style scoped>

</style>