<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Comment a Picture</div>
    
                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                          {{success}}
                        </div>
                        <form @submit="formSubmitComment" enctype="multipart/form-data" method="POST">
                        <strong>Caption:</strong>
                        <input type="text" class="form-control" v-model="caption">
                        <strong>File:</strong>
                        <input type="file" class="form-control" v-on:change="onFileChange">
    
                        <button class="btn btn-success" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
   
<script>
    export default {
        name: "image-comment",
        props: [ "postId"],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
              caption: '',
              file: '',
              success: '',
              user_id: '',
            };
        },
        methods: {
            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            formSubmitComment(e) {
                e.preventDefault();
                let currentObj = this;
                let postId = this.postId;
   
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
    
                let formData = new FormData();
                formData.append('file', this.file);
   
                axios.post('/FreeOutdoors/public/formSubmitComment', formData, postId, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            }
        }
    }
</script>