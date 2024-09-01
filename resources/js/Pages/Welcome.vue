<template>
    <div class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl w-full">
        <button @click="changeStateShowCreatePost" class=" w-full font-bold px-5 mb-2 rounded-lg border-solid border-2 hover:border-red-600 text-stone-50 bg-stone-800 border-red-700 hover:bg-red-700 focus:bg-red-800 ">Añadir publicación</button>
        <post-component></post-component>

        <modal :show="showModal" @close="changeStateShowCreatePost">
            <div class=" p-5 bg-stone-800 ">
                <div class=" rounded border rounded-b-none border-red-600 p-5 bg-stone-50 ">
                    <input v-model="text" type="text" class=" w-full focus:ring-red-600 outline-none focus:outline-none p-2 rounded appearance-none border-none bg-stone-50 " placeholder="Comparte tu build">
                    <div class=" my-5 ">
                        <img v-if="url" :src="url" style="max-width: 100%; max-height: 400px; margin: 0 auto;">
                    </div>
                    <div class=" flex justify-end ">
                        <button @click="selectImage" class=" outline-none focus:outline-none inline-flex items-center rounded-full cursor-pointer bg-red-700 p-2 ">
                            <svg class=" text-stone-50 h-7 w-7 size-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </button>
                        <input id="image" @change="filechange" type="file" name="image" accept="image/gif,image/jpeg,image/png,image/jpg" style="display:none">
                    </div>
                    <div class=" text-stone-800 p-2 mt-5 ">
                        Error
                    </div>

                </div>
                <button @click="createPost" v-if="text.length > 0 && image != null" class=" w-full font-bold px-5 mb-2 rounded rounded-t-none border-solid border-2 hover:border-red-600 text-stone-50 bg-red-700 border-red-700 hover:bg-stone-800 focus:bg-red-800 ">Publicar</button>
            </div>
        </modal>
    </div>
</template>

<script>
import PostComponent from '../ComponentsRiot/PostComponent.vue';
import Modal from '@/Components/Modal.vue';

    export default {
        data(){
            return{
                showModal: false,
                url: null,
                image: null,
                text: '',
                posts: []
            }
        },
        components:{
            PostComponent,
            Modal
        },
        methods: {
            changeStateShowCreatePost(){
                this.showModal = !this.showModal
            },
            filechange(e){
                let file = e.target.files[0]
                this.image = file
                this.url = URL.createObjectURL(file)
            },
            selectImage(){
                document.getElementById('image').click()
            },
            async createPost(){
                const formData = new FormData()
                formData.append('image',this.image)
                formData.append('text',this.text)

                await axios.post('/create-post',formdata,{
                    headers:{
                        'Content-Type':'multipart/form-data'
                    }
                }).then((response)=>{
                    this.posts.unshift(response.data)

                    this.resetData()
                }).catch(error => {
                    if(error.response.status === 422){
                        this.error = error.response.data.errors.image[0]

                        setTimeout(()=>{
                            this.error = null
                        },5000)
                    }
                })
            },
            resetData(){
                this.showModal = false
                this.url = null
                this.image = null
                this.text = ''
            }
        }
    }
</script>