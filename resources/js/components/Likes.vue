<template>
<div>

<button class="btn" type="submit">
   Like
</button>
                    
</div>
    
</template>

<script>
export default {
name: "Likes",
  computed: {
    likes: {
      get: function() {
        return this.now + this.liked;
      }
    }
  },
  data() {
    return {
      liked: 0

    };
  },
  methods: {
    addLike() {

    },
    toggleLike: function()
    {
    if(this.liked) {
        this.unlike()
    } else {
        this.like()
    } 
  },
  like: function() {
    this.submitted = true;

    this.$http.post('/likes', {'post': this.post}, function(resp) {
        this.liked = true;
        this.submitted = false;
        this.text = 'Unlike';
    });
  },
  unlike: function() {
    this.submitted = true;

    this.$http.delete('/likes/' + this.post, function(resp) {
        this.liked = false;
        this.submitted = false;
        this.text = 'Like';
    });
}
} 
}
</script>

<style scoped>

</style>