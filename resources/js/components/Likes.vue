<template>
  <div>
    <a href="#" v-if="isLiked" @click.prevent="unLike(post)">
      <i class="fas fa-leaf" aria-hidden="true" style="color: green; font-size: 2em;"></i>
      </a>
    <a href="#" v-else @click.prevent="like(post)">
      <i class="fas fa-leaf" aria-hidden="false" style="color: brown; font-size: 2em;"></i>
    </a>
  </div>
</template>

<script>
export default {
  name: "Likes",
  props: ["post", "liked"],
  data() {
    return {
      isLiked: ""
    };
  },
  mounted() {
    this.isLiked = this.isLike ? true : false;
  },
  computed: {
    isLike() {
      return this.liked;
    }
  },
  methods: {
    like(post) {
      axios
        .post("/FreeOutdoors/public/like/" + post)
        .then(response => (this.isLiked = true))
    },
    unLike(post) {
      axios
        .post("/FreeOutdoors/public/unlike/" + post)
        .then(response => (this.isLiked = false))
    }
  }
};
</script>

<style scoped>

</style>

