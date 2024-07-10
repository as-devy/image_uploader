<template lang="">
    <div class="container">
        <div v-if="!uploadState && !uploadedState">
            <form action="#" @submit.prevent="handleImgInput">
                <h2>Upload your image</h2>
                <p>File should be Jpeg, Png,...</p>
                <div class="upload-img" @click="handleImgInput">
                    <input type="file" accept=".jpeg, .jpg, .png" ref="imgInput" @change="sendImg" style="display: none">
                    <img :src="`${imgsFolder}/image_placeholder.png`" />
                    <p>Drag & Drop your image here</p>
                </div>
                <span>or</span>
                <button class="btn" @click="handleImgInput">Choose a file</button>
            </form>
        </div>
        <Upload v-if="uploadState" />
        <Uploaded v-if="uploadedState" :img-url="imgUrl" />
    </div>
</template>
<script>
import { onMounted, ref } from 'vue';
import axios from 'axios';
import Upload from './Upload.vue';
import Uploaded from './Uploaded.vue';

export default {
    props: ['data', 'imgsFolder'],
    components: { Upload, Uploaded },
    setup(props) {
        const uploadState = ref(false)
        const uploadedState = ref(false)
        const imgInput = ref(null)
        const imgUrl = ref(null);

        const handleImgInput = () => {
            imgInput.value.click();
        }

        const sendImg = async (e) => {
            uploadState.value = true;
            const file = e.target.files[0];
            if (file) {
                const data = new FormData();

                data.append("image", file)


                for (let [key, value] of data.entries()) {
                    console.log(`${key}:`, value);
                }

                try {
                    const url = `https://api.imgbb.com/1/upload?expiration=600&key=2750377068f6e1a5530b8e8e9a5d522b`
                    const response = await axios.post(url, data);
                    console.log('Success:', response.data);

                    imgUrl.value = response.data.data.url;
                    // imageUploaded.value = true;
                    const imageData = new FormData();

                    console.log(imgUrl.value)
                    imageData.append("img", imgUrl.value)
                    try {
                        const response = await axios.post('/upload', imageData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        });
                        console.log('Success:', response.data);
                        uploadState.value = false;
                        uploadedState.value = true;
                    } catch (error) {
                        console.error('Error uploading image:', error);
                    }
                } catch (error) {
                    console.error('Error uploading image:', error);
                }
            }
        };

        onMounted(() => {
            console.log(props.data)
            console.log(props.imgsFolder)
        })

        return { uploadState, uploadedState, imgInput, imgUrl, handleImgInput, sendImg };
    }
}
</script>
