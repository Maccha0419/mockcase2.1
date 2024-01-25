<template>
    <div>
        <button v-if="!liked" type="button" class="liked" @click="like(shopId)"></button>
        <button v-else type="button" class="unliked" @click="unlike(shopId)"></button>
    </div>
</template>

<script>
    export default {
        props: ['shopId', 'userId', 'defaultLiked'],
        data() {
            return {
                liked: false,
            };
        },
        created() {
            this.liked = this.defaultLiked
        },
        methods: {
            like(shopId) {
                let url = `/api/shops/${shopId}/like`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                    this.liked = true
                })
                .catch(error => {
                    alert(error)
                });
            },
            unlike(shopId) {
                let url = `/api/shops/${shopId}/unlike`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                    this.liked = false
                })
                .catch(error => {
                    alert(error)
                });
            }
        }
    }
</script>
