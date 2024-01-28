<template>
    <!-- 評価を登録するときの星コンポーネント -->
    <div>
        <star-rating @rating-selected="setRating" v-bind:increment="1" v-bind:max-rating="5" inactive-color="#000"
            active-color="rgb(211, 247, 10)" v-bind:star-size="50" :show-rating="false" :rating="this.score"></star-rating>

        //このinputに評価の値を入れる
        <input type="hidden" name="score" :value="this.rating" />
    </div>
</template>

<script>
export default {
    props: [],
    data: function () {
        return {
            rating: 0,
        };
    },
    //星を押すとそのスコアがscoreinputに入る
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },

    },


};
</script>
